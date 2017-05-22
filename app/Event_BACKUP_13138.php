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
<<<<<<< HEAD
        return $this->attributes['description'] = ucfirst($value);
=======
        return $this->attributes['event_description'] = ucfirst($value);
>>>>>>> 3e68a4af874c2ee34a1997efa9b20d2e0e157708
    }
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
<<<<<<< HEAD
        'name', 'description', 'event_date','address',
=======
        'event_name', 'event_description', 'event_date','event_address',
>>>>>>> 3e68a4af874c2ee34a1997efa9b20d2e0e157708
    ];

    protected $hidden = ['user_id','subcategory_id'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

<<<<<<< HEAD
    public function addComment($commentbody)
    {
        $this->comments()->create(compact('commentbody'));
=======
    public function addComment($comment_content)
    {
        $this->comments()->create(compact('comment_content'));
>>>>>>> 3e68a4af874c2ee34a1997efa9b20d2e0e157708
    }


    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

<<<<<<< HEAD
    public function addReview($reviewBody)
    {
        $this->reviews()->create(compact('reviewBody'));
=======
    public function addReview($review_content)
    {
        $this->reviews()->create(compact('review_content'));
>>>>>>> 3e68a4af874c2ee34a1997efa9b20d2e0e157708
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

<<<<<<< HEAD
    public function addReport($reportBody)
    {
        $this->reports()->create(compact('reportBody'));
=======
    public function addReport($report_content)
    {
        $this->reports()->create(compact('report_content'));
>>>>>>> 3e68a4af874c2ee34a1997efa9b20d2e0e157708
    }



}


