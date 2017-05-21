<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subcategory;

class Category extends Model
{
    protected $fillable = ['category_name','category_description','category_photo',];

    public function Subcategories()
    {
        return $this->hasMany('App\Subcategory');
    }
}
