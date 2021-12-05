<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\Time;
use App\Models\Kwitansi;

class Competitor extends Model
{
    use HasFactory;
    use Time;

    public function scopeIsLunas($query)
    {
        return $query->where('competitor_status', '>', 0);
    }

    public function scopeIsBelumLunas($query)
    {
        return $query->where('competitor_status', '=', 0);
    }

    public function scopeIsNotDeleted($query)
    {
        return $query->where('competitor_status', '!=', -1);
    }

    public function competitionCategory()
    {
        return $this->belongsTo('App\Models\CompetitionCategory');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function invoice()
    {
        return $this->belongsTo('App\Models\Invoice');
    }

    public function invoice_detail()
    {
        return $this->hasMany('App\Models\InvoiceDetail')->orderBy('id', 'desc');
    }

    public function kwitansi()
    {
        $kwitansi = Kwitansi::where('competitor_id', $this->id)->orderBy('id','desc')->first();
        return $kwitansi->number();
    }

    public function approved()
    {
        return $this->belongsTo('App\Models\User', 'submission_approved_by', 'id');
    }

    public function approvedTime()
    {
        return date('d M Y H:i:s', strtotime($this->submission_approved_time));
    }

    public function competitorDetail()
    {
        return $this->hasMany('App\Models\CompetitorDetail');
    }

    public function competitorAuth(){
        return $this->hasOne('App\Models\CompetitorAuth');
    }

    public function submissionLog()
    {
        return $this->hasMany('App\Models\SubmissionLog')->orderBy('id', 'desc');
    }

    public function submissionLogLatest()
    {
        return $this->hasOne('App\Models\SubmissionLog')->orderBy('id', 'desc');
    }

    public function scopeSubmissionLogLatest($query)
    {
        // \Log::info($this->hasOne('App\Models\SubmissionLog')->orderBy('id','desc')->first());
        // return $this->hasOne('App\Models\SubmissionLog')->orderBy('id','desc');

        return $query->whereHas('submissionLogLatest', function($q){
            $q->where('type', 'danger');
        });
    }

    public function statusPembayaran()
    {
        $msg = "<span class='badge badge-danger'>Belum bayar</span>";
        if($this->competitor_status > 0) {
            $msg = "<span class='badge badge-success'>Sudah bayar</span>";
        }

        return $msg;
    }

    public function statusKarya()
    {
        $msg = "<span class='badge badge-danger'>Belum upload karya</span>";
        if($this->submission_url != '' && $this->submission_status == 0) {
            $msg = "<span class='badge badge-primary'>Karya sudah diupload</span>";
        } else if($this->submission_url != '' && $this->submission_status == 1) {
            $msg = "<span class='badge badge-success'>Karya sudah diterima</span>";
        }

        return $msg;
    }


    public function number()
    {
        if($this->competition_number == null) {
            return '-';
        }

        return $this->competitionCategory->code().'-'.$this->competition_number;
    }
    
    public function caNumber()
    {
        return 'CA-'.$this->id;
    }


    public function isPopReligi()
    {
        if($this->competitionCategory->competition_type_id == 3) {
            return true;
        } return false;
    }

    public function isTilawah()
    {
        if($this->competitionCategory->competition_type_id == 4) {
            return true;
        } return false;
    }

    public function song()
    {
        return $this->belongsTo('App\Models\Songs','songs_id','id');
    }

    public function surah()
    {
        return $this->belongsTo('App\Models\Surah');
    }


}
