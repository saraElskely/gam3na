<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class AdminLoginControler extends Controller
{
    //
    public function __construct(){
    	$this->middleware('guest:admin');
    }
    public function showLoginForm(){

    	return view('auth.admin-login');
    }

	public function login(Request $request){

		$this->validate($request,[
		]);
		
		// attempt to log the user in
		if (Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)) {
			# code...
			// if successful then redirect to thier intended location
			return redirect()->intended(route('admin.dashboard'));
		}
		

		// if unsuccessful rredirect back to login with the form data 
		return redirect()->back()->withInput($request->only('email','remember'));

	}


}
