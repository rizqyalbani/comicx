<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kwitansi extends Model
{
    use HasFactory;

    public function number()
    {
        $msg = "COMICIX-".$this->id;

        return $msg;
    }
}

