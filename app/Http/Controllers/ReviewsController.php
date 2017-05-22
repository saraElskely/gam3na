<?php

namespace App\Http\Controllers;
use App\Event;
use App\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function store (Event $event)
    {
        $this->validate(request(),[
            'review_content'=>'required'
        ]);
        $event->addReview(request('review_content'));

        return back();
    }
}
