<?php

namespace App;

use App\model\Award;
use App\model\Archive;
use Illuminate\Support\Facades\Cache;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id','name', 'email', 'password','OTP','confirmed','google_id','ph_no','client_entity_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function OTP()
    {
        return Cache::get('OTP');
    }
    public function awards()
    {
        return $this->hasMany(Award::class);
    }
    public function archives()
    {
        return $this->hasMany(Archive::class);
    }
}
