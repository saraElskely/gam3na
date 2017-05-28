<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Event;
use App\Category;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

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
        'password', 'remember_token','block'
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
