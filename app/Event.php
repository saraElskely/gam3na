<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

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
        return $this->attributes['description'] = ucfirst($value);
    }
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'event_date','address',
    ];

    protected $hidden = ['user_id','subcategory_id'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment($commentbody)
    {
        $this->comments()->create(compact('commentbody'));
    }


    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function addReview($reviewBody)
    {
        $this->reviews()->create(compact('reviewBody'));
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function addReport($reportBody)
    {
        $this->reports()->create(compact('reportBody'));
    }



}


