<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
class AdminusersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
      $users= User::all();
      return view ('admin.users.index',compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view ('admin.users.show',compact('user'));
    }

    public function block($id)
    {
        $user=User::find($id);
        $select = DB::table('users')->where('id','=',$id);
        if($select)
        {
           $select = DB::table('users')->where('id','=',$id)
           ->update(['block' => 1]);
           return "'block': '1'";
        }
    }

    public function unblock($id)
    {
        $user=User::find($id);
        $select = DB::table('users')->where('id','=',$id);
        if($select){
           $select = DB::table('users')->where('id','=',$id)
           ->update(['block' => 0]);
           return "'unblock': '1'";
        }

    }
}
