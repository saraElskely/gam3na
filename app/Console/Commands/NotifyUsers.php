<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use DB;
use App\Event;
use App\User;


use Notification;
use App\Notifications\AddEvent;
use Illuminate\Notifications\Notifiable;
use StreamLab\StreamLabProvider\Facades\StreamLabFacades;

class NotifyUsers extends Command
{
  use  Notifiable;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Gam3na:NotifyUsers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify Users with tommorow events';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tomorrow = Carbon::tomorrow();
        $today = Carbon::today();
        $select_event = DB::table('events')->where('event_date','<',$tomorrow)
        ->where('event_date','>',$today)
        ->get();

        if(! $select_event->isEmpty()){

          foreach ($select_event as $event ) {

            $event = Event::find($event->id);
            $users =$event->user_attend_event ;
            $user = User::all();
            Notification::send($user ,new AddEvent($event));
            dd($users);
            $data = 'You Have New Event '.$event->event_name.'<br>Added By'.auth()->user()->name;
            StreamLabFacades::pushMessage('gam3na','AddEvent',$data);

          }
            // dd( $select_event);
        }

        // $tomorrow = Carbon::tomorrow();
        // $select_event = DB::table('events')->where('event_date','=',$tomorrow);
        // if(! is_null($select_event)){
        //   $
        //
        // }


    }
}
