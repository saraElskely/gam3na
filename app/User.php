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

    public function subscribed_categories()
    {
      return $this->belongsToMany('App\Category')->wherePivot('status', true);
      // ->withTimestamps();
    }
    public function events_attend_by_user()
    {
      return $this->belongsToMany('App\Event')->wherePivot('status', true);
    }
}
