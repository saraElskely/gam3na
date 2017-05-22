<?php

namespace App\Http\Controllers;
use App\Event;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    public function store (Event $event)
    {
        $this->validate(request(),[
            'review_content'=>'required'
        ]);
        $event->addReview(request('review_content'));
        $event->user_id=Auth::id();

        return back();
    }
}
