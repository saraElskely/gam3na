<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Event;
use Carbon\Carbon;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $today = Carbon::today();   
        $user_subscribe =  User::find(Auth::id())->subscribed_categories;
        $user_attendance = User::find(Auth::id())->events_attend_by_user
        ->where('event_date','<',$today) ;
        $select=DB::table('subcategories')->whereIn('category_id',$user_subscribe)
        ->get(array('id'));


         $event =DB::table('events')
          ->whereIn('subcategory_id',function($query){
            $query->select('id')
            ->from('subcategories')
            ->whereIn('category_id',function($query){
                $query->select('category_id')
                ->from('category_user')
                ->where('user_id',Auth::id())
                ->where('status',1);
                });
          })
          ->whereNotIn('id',function($query){
            $query->select('event_id')
            ->from('event_user')
            ->where('user_id',Auth::id());
          })
          ->get();      
        return view('home',['user_subscribed_categories'=> $user_subscribe,'events_attended_by_user'=>$user_attendance,'events'=>$event]);
    }


 //    public function suggested(){
 //     $user_subscribe =  User::find(Auth::id())->subscribed_categories;
 //     $select=DB::table('categories')->whereIn('id',$user_subscribe)
 //     ->get(array('category_id));
                    
 // }

}
