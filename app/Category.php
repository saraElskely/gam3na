<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subcategory;
use App\User;
class Category extends Model
{
    protected $fillable = ['category_name','category_description','category_photo',];

    public function Subcategories()
    {
        return $this->hasMany('App\Subcategory');
    }
    public function subscribed_users()
    {
      return $this->belongsToMany('App\User');//->wherePivot('status', true);//->withTimestamps();
    }
}
