<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Helpers\Time;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use Time;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const STATUS_ACTIVE     = 1;
    const STATUS_DRAFT      = 0;
    const STATUS_DELETE     = -1;

    public function scopeIsNotDeleted($query)
    {
        return $query->where('status', '!=', static::STATUS_DELETE);
    }

    public function getFirstChar(){
        return substr($this->name, 0, 1);
    }

    public function getType()
    {
        $msg = "";

        if($this->isAdmin == 1) {
            $msg = "Admin";
        } else {
            $msg = "User";
        }

        return $msg;
    }

    public function competitor()
    {
        return $this->hasMany('App\Models\Competitor');
    }

    public function competitors()
    {
        return $this->hasMany('App\Models\Competitor')->where('competitor_status','>',0);
    }
}
