<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    public function getImage()
    {
        $path   = 'dokumen/competitor/bank/';
        return url($path . $this->bank_logo);
    }
}
