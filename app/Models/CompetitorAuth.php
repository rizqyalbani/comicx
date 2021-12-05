<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompetitorAuth extends Model
{
    use HasFactory;

    public function competitor(){
        return $this->belongsTo('App\Models\Comptetior');
    }
}
