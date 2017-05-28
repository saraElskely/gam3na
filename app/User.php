<?php

namespace App;
use Eloquent;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
 // use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Eloquent implements Authenticatable
{
    use AuthenticableTrait, HasApiTokens, Notifiable ;
   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email', 'password','user_photo','gender','date_of_birth','job',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','block',
    ];

    public function events()
    {
        return $this->hasMany('App\Event');
    }
}

