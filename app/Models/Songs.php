<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Songs extends Model
{
    use HasFactory;

    public function competitor_count($id)
    {
        return $this->hasMany('App\Models\Competitor')->where('competition_category_id', $id)->orderBy('id', 'desc');
    }
}
