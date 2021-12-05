<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surah extends Model
{
    use HasFactory;

    public function competitor()
    {
        return $this->belongsTo('App\Models\Competitor', 'id', 'surah_id');
    }
}
