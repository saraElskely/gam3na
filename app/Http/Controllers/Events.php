<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\Auth;
class Events extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {   $events = Event::all();
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
        $event = new event;
        $this->validate($request,[
            'event_name'=>'required|unique:events',
            'event_description'=>'required',

        ]);
        $event->event_name = $request->event_name;
        $event->event_description = $request->event_description;
        $event->event_date = $request->event_date;
        $event->event_address = $request->event_address;
        $event->user_id=Auth::id();
        $event->subcategory_id = 1;
        $event->event_longitude ="2";
        $event->event_latitude ="3";
        $event->save();
        return redirect('event');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $this->validate($request,[
            'event_description'=>'required',
            'event_name'=>'required'
        ]);
        $event->event_name = $request->event_name;
        $event->event_description = $request->event_description;
        $event->event_date = $request->event_date;
        $event->event_address = $request->event_address;
        $event->save();
        session()->flash('message','updated successfully');
        return redirect('event');
    }

    /**
     * Remove the specified resource from storage.ss
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Event::find($id);
        $item->delete();
        session()->flash('message','Deleted successfully');
        return redirect('/event');
    }
}
