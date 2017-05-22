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
        return $this->attributes['event_description'] = ucfirst($value);
    }
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_name', 'event_description', 'event_date','event_address',
    ];

    protected $hidden = ['user_id','subcategory_id'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // public function addComment($comment_content)
    // {
    //     $this->comments()->create(compact('comment_content'),$user_id);
    // }


    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function addReview($review_content)
    {
        $this->reviews()->create(compact('review_content'));
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function addReport($report_content)
    {
        $this->reports()->create(compact('report_content'));
    }



}
