<?php

namespace App\Http\Controllers;
use App\Event;
use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportsController extends Controller
{
    public function store (Event $event)
    {
        $this->validate(request(),[
            'report_content'=>'required'
        ]);
        $event->addReport(request('report_content'));
        $event->user_id=Auth::id();

        return back();
    }
}
