<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\User;
use Notification;
use App\Notifications\AddEvent;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use StreamLab\StreamLabProvider\Facades\StreamLabFacades;

class Events extends Controller
{
    use  Notifiable;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $events = Event::all();
        return view('event.home', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event;
        $this->validate($request,[
            'event_name'=>'required|unique:events',
            'event_description'=>'required',
        ]);


        $fileName = 'null';
        if ($request->hasFile('event_photo')) {
          if($request->file('event_photo')->isValid()) {
            $destinationPath = public_path('upload/image');
            $extension =$request->file('event_photo')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;
            $request->file('event_photo')->move($destinationPath, $fileName);
          }
        }

        $event->event_name = $request->event_name;
        $event->event_description = $request->event_description;
        $event->event_date = $request->event_date;
        $event->event_address = $request->event_address;
        $event->event_photo =$fileName;
        $event->user_id=Auth::id();
        $event->subcategory_id =2;
        $event->event_longitude =$request->event_longitude;
        $event->event_latitude =$request->event_latitude;
      if($event->save()){
         $user = User::all();
        Notification::send($user ,new AddEvent($event));
        $data = 'we Have New Event '.$event->event_name.'<br>Added By'.auth()->user()->name;
      StreamLabFacades::pushMessage('gam3na','AddEvent',$data); 
           
      }
       return redirect('event');
  
    }
  
    public function show($id)
    {
        $item = Event::find($id);


        return view('event.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Event::find($id);
        return view('event.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $this->validate($request,[
            'event_description'=>'required',
            'event_name'=>'required'
        ]);
        $fileName = 'null';
        if ($request->hasFile('event_photo')) {
          if($request->file('event_photo')->isValid()) {
            $destinationPath = public_path('upload/image');
            $extension =$request->file('event_photo')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;
            $request->file('event_photo')->move($destinationPath, $fileName);
          }

        }

        $event->event_name = $request->event_name;
        $event->event_description = $request->event_description;
        $event->event_date = $request->event_date;
        $event->event_photo = $fileName;
        $event->event_address = $request->event_address;
        $event->event_longitude =$request->event_longitude;
        $event->event_latitude =$request->event_latitude;
        $event->save();
        session()->flash('message','updated successfully');
        return redirect('event');
    }

    public function destroy($id)
    {
        $item = Event::find($id);
        $item->delete();
        session()->flash('message','Deleted successfully');
        return redirect('/event');
    }
    public function AllSeen(){
      foreach(auth()->user()->unreadNotifications as $note){
       $note->markAsRead(); 
      }
    }
}

