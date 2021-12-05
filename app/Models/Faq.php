<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\Time;

class Faq extends Model
{
    use HasFactory;
    use Time;

    const STATUS_ACTIVE     = 1;
    const STATUS_DRAFT      = 0;
    const STATUS_DELETE     = -1;

    public function scopeIsNotDeleted($query)
    {
        return $query->where('status', '!=', static::STATUS_DELETE);
    }

    public function scopeIsActive($query)
    {
        return $query->where('status', static::STATUS_ACTIVE);
    }

    public function scopeIsAnswer($query)
    {
        return $query->where('answer_id', '!=', NULL);
    }

    public function scopeIsGeneral($query)
    {
        return $query->where('competition_type_id', NULL);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getStatus()
    {
        $msg = "";

        if($this->status == static::STATUS_ACTIVE) {
            $msg = "<span class='badge badge-success'>Terjawab</span>";
        } else {
            $msg = "<span class='badge badge-primary'>Belum Terjawab</span>";
        }

        return $msg;
    }

    public function competitionType()
    {
        return $this->belongsTo('App\Models\CompetitionType');
    }
}
