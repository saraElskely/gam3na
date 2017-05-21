<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Comment;

class Commentscontroller extends Controller
{
    public function store(Event $event)
    {
        $this->validate(request(),[
            'comment_content'=>'required'
        ]);
        $event->addComment(request('comment_content'));

        return back();
    }
}
