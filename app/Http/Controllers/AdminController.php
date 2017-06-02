<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin');
    }

    
}





// to create new admin
// open terminal :
// php artisan tinker
// $admin = new App\Admin
// $admin->name ="admin"
// $admin->email = "admin@gam3na.com"
// $admin->password = Hash::make('password')
// $admin->save()