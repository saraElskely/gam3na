<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AdminusersController extends Controller
{
    //
    public function index(){

      $users= User::all();
     return view ('admin.users.index',compact('users'));
  }

   public function create(){

      return view ('admin.users.create');
  }

   public function edit($id){

    $user = User::find($id);
     return view ('admin.users.edit',compact('user'));

 }

  public function store(Request $request){
       $user= new User;
       $this->validate($request,[
        'email'=>'required|unique:users',
       ]);
      //  $data=$request->all();
           


      $fileName = 'null';
      if ($request->hasFile('photo')) {
          if($request->file('photo')->isValid()) {
          $destinationPath = public_path('upload/image');
         $extension =$request->file('photo')->getClientOriginalExtension();
         $fileName = uniqid().'.'.$extension;
         $request->file('photo')->move($destinationPath, $fileName);
          }
      }


      $user->name=$request->name;
      $user->email=$request->email;
      $user->gender=$request->gender;
      $user->date_of_birth=$request->date_of_birth;
      $user->job=$request->job;
      $user->photo=$fileName;
      $user->block=$request->block;
      $user->password=$request->password;
      $user->save();
      return redirect('admin/users');
      // return $request->all();
}

   public function show($id){
     $user = User::findOrFail($id);
     return view ('admin.users.show',compact('user'));

 }

 public function update(Request $request , $id){
      $user= User::find($id) ;
       $this->validate($request,[
        'email'=>'required',
       ]);
      //  $data=$request->all();
      $fileName = 'null';
      if ($request->hasFile('image')) {
          if($request->file('image')->isValid()) {
          $destinationPath = public_path('img');
         $extension =$request->file('image')->getClientOriginalExtension();
         $fileName = uniqid().'.'.$extension;
         $request->file('image')->move($destinationPath, $fileName);
          }
      }

      $user->name=$request->name;
      $user->email=$request->email;
      $user->gender=$request->gender;
      $user->date_of_birth=$request->date_of_birth;
      $user->job=$request->job;
      $user->photo=$request->$fileName;
      $user->block=$request->block;
      $user->password=$request->password;
      $user->save();
      session()->flash('message','updated successfully');
      return redirect('admin/users');
      // return $request->all();
 }

  public function destroy($id){
      $user= User::find($id) ;
      $user->delete();
      session()->flash('message','Deleted successfully');
      return redirect('admin/users');

  }
}
