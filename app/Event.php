<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  protected $fillable = ['name','description','event_date',];

  protected $hidden = ['user_id','subcategory_id'];

  public function user()
  {
      return $this->belongsTo('App\User');
  }

}
