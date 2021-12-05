<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\Time;

class Invoice extends Model
{
    use HasFactory;
    use Time;

    public function invoice()
    {
        $msg = "INV".date('dm', strtotime($this->created_at)).$this->id;

        return $msg;
    }

    public function getStatus()
    {
        $msg = "<span class='badge badge-info'>Pending</span>";
        if($this->status == 1) {
            $msg = "<span class='badge badge-success'>Lunas</span>";
        } else if($this->status == -1){
            $msg = "<span class='badge badge-danger'>Ditolak</span>";
        }

        return $msg;
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function approve()
    {
        return $this->belongsTo('App\Models\User', 'approved_by', 'id');
    }

    public function detail()
    {
        return $this->hasMany('App\Models\InvoiceDetail');
    }

    public function payment()
    {
        return $this->belongsTo('App\Models\PaymentMethod','payment_method_id','id');
    }

    public function approvedTime()
    {
        $msg = "";

        if($this->approved_time != null) {
            $msg = date('d-m-Y H:i:s', strtotime($this->approved_time));
        }
        return $msg;
    }

    public function dueDate()
    {
        return date('d-m-Y H:i:s', strtotime($this->due_time));
    }

    public function getFile()
    {
        $path   = 'dokumen/competitor/transfer/';
        return url($path . $this->proof_of_transfer);
    }

    public function uploadFile($image, $name)
    {
        $des    = 'dokumen/competitor/transfer/';
        $image->move($des, $name);
    }
}
