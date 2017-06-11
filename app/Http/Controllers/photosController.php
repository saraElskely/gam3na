<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Event;
use App\Photo;
use Session;

class photosController extends Controller
{
    public function store(Event $event, Request $request )
    {
        $this->validate(request(),[
        'user_event_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();
	        $data['user_id'] = Auth::id();
            $data['event_id']= $event->id;  
            $userEvent_photo = $request->file('user_event_photo');
            $data['user_event_photo'] = time().'.'.$userEvent_photo->getClientOriginalExtension();
            $userEvent_photo->move(public_path('upload/image'), $data['user_event_photo'] );

        Photo::create($data);
        return back();
    }
}
