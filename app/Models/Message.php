<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Helpers\Time;

class Message extends Model
{
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

    public function scopeIsForYou($query)
    {
        return $query->where(function($q) {
            $q->where('target_id', Auth::user()->id)
                ->orWhere('target_id', NULL);
        });
    }

    public function getDescription()
    {
        $msg = strip_tags(\Illuminate\Support\Str::limit($this->description, 56, $end='...'));

        return $msg;
    }
    
    public function target()
    {
        return $this->belongsTo('App\Models\User', 'target_id', 'id');
    }

    public function log()
    {
        return $this->hasMany('App\Models\MessageLog')->orderBy('id', 'desc');
    }

    public function scopeIsNotRead($query)
    {
        $log = MessageLog::where('message_id', $this->id)->where('user_id', Auth::user()->id)->count();

        if($log < 1) {
            return true;
        } else {
            return false;
        }
    }

    use HasFactory;
}
