<?php

namespace App;
use Eloquent;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Notifications\AddEvent;
use App\Event;
use App\Category;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Eloquent implements Authenticatable ,CanResetPasswordContract
{
    use AuthenticableTrait, HasApiTokens, Notifiable ,CanResetPassword;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email', 'password','user_photo','gender','date_of_birth','job','mobile','user_address','user_longitude','user_latitude'

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

    public function subscribed_categories()
    {
      return $this->belongsToMany('App\Category')->wherePivot('status', true);
      // ->withTimestamps();
    }
    public function events_attend_by_user()
    {
      return $this->belongsToMany('App\Event')->wherePivot('status', true);
    }

    public function routeNotificationForNexmo(){

        return $this->mobile;
    }

}
