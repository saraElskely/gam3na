<?php

namespace App\Http\Controllers;
use App\Event;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store (Event $event)
    {
        $this->validate(request(),[
            'review_content'=>'required'
        ]);

        $data = [
	        'review_content' => request('review_content'),
	        'user_id' => Auth::id(),
	        'event_id' => $event->id,
	        ] ;
        Review::create($data);

        return back();
    }
}
