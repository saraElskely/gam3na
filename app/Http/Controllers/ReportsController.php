<?php

namespace App\Http\Controllers;
use App\Event;
use App\Report;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function store (Event $event)
    {
        $this->validate(request(),[
            'reportBody'=>'required'
        ]);
        $event->addReport(request('reportBody'));

        return back();
    }
}
