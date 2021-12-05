<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;

    const STATUS_ACTIVE     = 1;
    const STATUS_DRAFT      = 0;
    const STATUS_DELETE     = -1;

    const TYPE_MEDIA        = 2;
    const TYPE_SPONSOR      = 1;
    const MAIN_SPONSOR      = 1;

    public function scopeIsNotDeleted($query)
    {
        return $query->where('status', '!=', static::STATUS_DELETE);
    }

    public function scopeIsActive($query)
    {
        return $query->where('status', static::STATUS_ACTIVE);
    }

    public function scopeIsSponsor($query)
    {
        return $query->where('type', static::TYPE_SPONSOR);
    }

    public function scopeIsMedia($query)
    {
        return $query->where('type', static::TYPE_MEDIA);
    }

    public function scopeIsMain($query)
    {
        return $query->where('main', static::MAIN_SPONSOR);
    }

    public function scopeIsNotMain($query)
    {
        return $query->where('main', '!=', static::MAIN_SPONSOR);
    }

    public function uploadImage($image, $name)
    {
        $des    = 'img/sponsor/';
        $image->move($des, $name);
    }

    public function getImage()
    {
        $path   = 'img/sponsor/';
        return url($path . $this->image);
    }

    public function getType()
    {
        $msg = "";

        if($this->type == static::TYPE_MEDIA) {
            $msg = "Media Partner";
        } else {
            $msg = "Sponsor";
        }

        return $msg;
    }

    public function getMain()
    {
        $msg = "";

        if($this->main == static::MAIN_SPONSOR) {
            $msg = "Ya";
        } else {
            $msg = "Tidak";
        }

        return $msg;
    }
}
