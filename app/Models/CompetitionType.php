<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Faq;

class CompetitionType extends Model
{
    use HasFactory;

    const STATUS_ACTIVE     = 1;
    const STATUS_DRAFT      = 0;
    const STATUS_DELETE     = -1;

    public function scopeIsNotDeleted($query)
    {
        return $query->where('status', '!=', static::STATUS_DELETE);
    }

    public function question_shows()
    {
        $data = Faq::where('competition_type_id', $this->id)->isActive()->whereNotNull('answer_id')->get();

        return $data;
        
    }

    public function competitionCategory()
    {
        return $this->belongsTo('App\Models\CompetitionCategory');
    }

    public function uploadImage($image, $name)
    {
        $des    = 'img/competition/';
        $image->move($des, $name);
    }

    public function getImage()
    {
        $path   = 'img/competition/';
        return url($path . $this->image);
    }
}
