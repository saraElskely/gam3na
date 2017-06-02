<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Event;
use DB;
use Illuminate\Support\Facades\Auth;
class Subcategory extends Model
{
    protected $fillable = ['subcategory_name','subcategory_description','subcategory_photo',];

    protected $hidden = [ 'category_id', ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }


    public function events()
    {

      return $this->hasMany('App\Event')
          ->whereNotIn('id',function($query){
            $query->select('event_id')
            ->from('reports')
            ->where('user_id',Auth::id());
          })->get();
    }

    // $c->events->whereNotIn('event_id',function($query){ $query->select(DB::raw('event_id'))->from('reports')->whereRaw('reports.user_id = 1');})->get();
    // ->whereIn('event_id', DB::table('reports')->select('event_id')->where('user_id',1)->get()->toArray())->get();


}
