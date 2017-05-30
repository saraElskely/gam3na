<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
class Profilecontroller extends Controller
{
    //
    public function show($id)
    {
        $user = User::find($id);
        $user_subscribtion =  $user->subscribed_categories;
        $user_attendance = $user->events_attend_by_user;
        return view('profiles.show',['user'=>$user,'user_subscribtion'=>$user_subscribtion,'user_attendance'=>$user_attendance]);
    }

    public function profile()
    {
        $user = User::find(Auth::id());
        $user_subscribtion =  $user->subscribed_categories;
        $user_attendance = $user->events_attend_by_user;
        return view('profiles.profile',['user'=>$user,'user_subscribtion'=>$user_subscribtion,'user_attendance'=>$user_attendance]);
    }


    public function editprofile(){

     $user = User::find(Auth::id());
     return view ('profiles.edit',compact('user'));

 }
  public function updateprofile(Request $request ){
     $user = User::find(Auth::id());
       $this->validate($request,[
        'email'=>'required',
       ]);
      //  $data=$request->all();
     $fileName = 'null';


      if ($request->hasFile('user_photo')) {

        if($request->file('user_photo')->isValid()) {
	        $destinationPath = public_path('upload/image');
	        $extension =$request->file('user_photo')->getClientOriginalExtension();
	        $fileName = uniqid().'.'.$extension;
	        $request->file('user_photo')->move($destinationPath, $fileName);
	        $user->user_photo=$fileName;
        }

      }

      $user->name=$request->name;
      $user->email=$request->email;
      $user->gender=$request->gender;
      $user->date_of_birth=$request->date_of_birth;
      $user->job=$request->job;

      $user->save();
      session()->flash('message','updated successfully');
      return redirect('/profile');
      // return $request->all();
 }
}


 //
