<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Report;
use App\Event;
use App\Review;
use DB;

class AdmineventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
      $event= Event::all();
      return view ('admin.events.index',compact('event'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

         $event= Event::findOrFail($id);
        return view ('admin.events.show',compact('event'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event= Event::find($id) ;
        $event->delete();
        session()->flash('message','Deleted successfully');
        return redirect('admin/events');
    }
}
