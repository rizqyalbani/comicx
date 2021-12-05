<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitorDetail extends Model
{
    use HasFactory;

    public function competitor()
    {
        return $this->belongsTo('App\Models\Competitor');
    }

    public function getFile($type = 'image')
    {
        $path   = 'dokumen/competitor/'.$type.'/';

        $data = $this->image;
        if($type == 'identity') {
            $data = $this->student_identity;    
        }

        return url($path . $data);
    }

    public function uploadFile($image, $name, $type = 'image')
    {
        $des    = 'dokumen/competitor/'.$type.'/';
        $image->move($des, $name);
    }

    public function lockStatus()
    {

        $msg = "Bisa";

        if($this->identity_lock == 1) {
            $msg = "Tidak Bisa";
        }

        return $msg;
    }

}


