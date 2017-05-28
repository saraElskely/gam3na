<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\AddEvent;

class Event extends Model
{
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
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_name', 'event_description', 'event_date','event_address','event_photo',
    ];

    protected $hidden = ['user_id','subcategory_id'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
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

    public function users_attend_event()
    {
      return $this->belongsToMany('App\User');
    }


}
