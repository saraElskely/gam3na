<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

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
        $user_subscribe =  User::find(Auth::id())->subscribed_categories;
        $user_attendance = User::find(Auth::id())->events_attend_by_user;
        return view('home',['user_subscribed_categories'=> $user_subscribe,'events_attended_by_user'=>$user_attendance]);
    }
}
