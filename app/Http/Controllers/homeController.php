<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Mail;
use Session;

/**
 *
 */
class homeController extends Controller
{

  function show($id)
  {
    return 'home page '.$id;
  }

  public function home()
  {
      $categories = Category::all();
      return view('welcome',['categories'=>$categories]);
  }

  public function getcontact(){

  	return view('welcome');
  }
  public function postcontact(Request $request){
   	$this->validate($request,[
  		'email'=> 'required|email',
  		'comments'=>'required|min:10',
  		'name'=>'required']);
   		// dd($request);
  		$data=array(
  			'email'=>$request->email,
  			'comments'=>$request->comments,
  			'name'=>$request->name
  			);
  		Mail::send('emails.contact',$data,function($message)use($data){
  				$message->from($data['email']);
  				$message->to('gam3naiti@gmail.com');
  				$message->subject($data['comments']);
  		});

  		Session::flash('success','Your Email was sent');
  		return view('welcome');
  }
}
