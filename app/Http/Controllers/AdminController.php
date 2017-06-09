<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class AdminController extends Controller
{

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
   

    public function listALlAdmins()
    {   $admins = Admin::all();
        return view('admin.admins.allAdmins',compact('admins'));
    }

    public function create()
    {
      
        $admins= Admin::all();

        return view ('admin.admins.create');
    }

    public function store(Request $request)
    {
       $admins = new Admin;

       $this->validate($request,[
       'email' =>'required|unique:admins',
       'password' => 'required|min:6',
       'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

       ]);
       
       $fileName = 'null';
      if ($request->hasFile('photo')) {
          if($request->file('photo')->isValid()) {
             $destinationPath = public_path('upload/image');
             $extension =$request->file('photo')->getClientOriginalExtension();
             $fileName = uniqid().'.'.$extension;
             $request->file('photo')->move($destinationPath, $fileName);
             $admin['photo'] = $fileName;
          }
      }
       Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'photo' =>$admin['photo'],
            'password' => bcrypt($request->password)]);
      return redirect('admin/admins');

    }
    public function destroy($id)
    {
       $admin= Admin::find($id) ;
       $admin->delete();
       session()->flash('message','Deleted successfully');
       return redirect('admin/admins');
    }

}
