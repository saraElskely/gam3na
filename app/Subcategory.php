<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Subcategory extends Model
{
    protected $fillable = ['subcategory_name','subcategory_description','subcategory_photo',];

    protected $hidden = [ 'category_id', ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}

