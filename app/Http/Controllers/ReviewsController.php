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
            'reviewBody'=>'required'
        ]);
        $event->addReview(request('reviewBody'));

        return back();
    }
}
