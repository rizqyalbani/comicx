<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panduan extends Model
{
    use HasFactory;

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

    public function competitionType()
    {
        return $this->belongsTo('App\Models\CompetitionType');
    }
}
