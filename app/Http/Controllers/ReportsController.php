<?php

namespace App\Http\Controllers;
use App\Event;
use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store (Event $event)
    {
        $this->validate(request(),[
            'report_content'=>'required'
        ]);

        $data = [
	        'report_content' => request('report_content'),
	        'user_id' => Auth::id(),
	        'event_id' => $event->id,
	        ] ;
        Report::create($data);

        return back();
    }
}
