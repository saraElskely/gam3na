<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Session;

class Commentscontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Event $event )
    {
        $this->validate(request(),[
            'comment_content'=>'required'
        ]);
        $data = [
	        'comment_content' => request('comment_content'),
	        'user_id' => Auth::id(),
	        'event_id' => $event->id,
	        ] ;
        Comment::create($data);

        return back();
    }
}
