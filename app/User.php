<?php

namespace App;
use Eloquent;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
<<<<<<< HEAD
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AddEvent;
||||||| merged common ancestors
use Illuminate\Foundation\Auth\User as Authenticatable;
=======
 // use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
>>>>>>> 6a5195727d5caf380699b0d5d0a18b08ebef4ae4

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

