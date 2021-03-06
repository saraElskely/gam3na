<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\AddEvent;
use App\User;
use willvincent\Rateable\Rateable;
//use Notifiable;


class Event extends Model
{
        use Rateable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_name', 'event_description', 'event_date','event_address','event_photo','event_latitude','event_longitude'
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getBodyAttribute($value)
    {
        return ucfirst($value);
    }

    public function setBodyAttribute($value)
    {
        return $this->attributes['event_description'] = ucfirst($value);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function user_attend_by_event()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function user_attend_event()
    {
        return $this->belongsToMany('App\User')->wherePivot('status', true);
    }
}
