<?php

namespace App\Http\Controllers;
use App\Event;
use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

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
          $count= DB::table('reports')
          ->where('event_id','=', $event->id)
          ->count('*');
          $select = DB::table('event_user')->where('user_id','=',Auth::id())
            ->where('event_id','=',$event->id)
            ->first();
        if( !is_null($select) ){
            $status=0;
            $event->user_attend_by_event()->updateExistingPivot(Auth::id(),['status'=>false]);
        }
          if($count > 5){
           DB::table('events')->where('id','=',$event->id)->delete();
          }  

         return redirect('event');

    }
}
