<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Event;
use App\Subcategory;
use App\User;
use Notification;
use App\Notifications\AddEvent;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use StreamLab\StreamLabProvider\Facades\StreamLabFacades;
use DB;
use Carbon\Carbon;
use willvincent\Rateable\Rating;
use App\Place;

class Events extends Controller
{
    use  Notifiable;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $events = Event::all();
        $user = User::find(Auth::id());
        $user_attend = User::find(Auth::id())->events_attend_by_user;
        return view('event.home', ['events' => $events, 'user_attend' => $user_attend, 'user' => $user]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = Subcategory::all();
        $places = Place::all();
        return view('event.create', ['subcategories' => $subcategories,'places' => $places]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event;
        $this->validate($request, [
            'event_name' => 'required|unique:events',
            'event_description' => 'required|min:5',
            'event_date' => 'required|after:today',
            'event_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'event_address' => 'required',
            'event_longitude' =>'required',
            'event_latitude' => 'required'
         ]);

        $fileName = 'null';
        if ($request->hasFile('event_photo')) {
            if ($request->file('event_photo')->isValid()) {
                $destinationPath = public_path('upload/image');
                $extension = $request->file('event_photo')->getClientOriginalExtension();
                $fileName = uniqid() . '.' . $extension;
                $request->file('event_photo')->move($destinationPath, $fileName);
            }
        }
        $event->event_name = $request->event_name;
        $event->event_description = $request->event_description;
        $event->event_date = $request->event_date;
        $event->event_address = $request->event_address;
        $event->event_photo = $fileName;
        $event->user_id = Auth::id();
        $event->subcategory_id = $request->subcategory_id;
        $event->event_longitude = $request->event_longitude;
        $event->event_latitude = $request->event_latitude;

        if ($event->save()) {
            $user = User::where('id','!=',Auth::id())->get();
            Notification::send($user, new AddEvent($event));
            $data = 'we Have New Event ' . $event->event_name;
            StreamLabFacades::pushMessage('gam3na', 'AddEvent', $data);
        }
        return redirect('/home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Event::find($id);
        return view('event.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Event::find($id);
        $subcategories = Subcategory::all();
        $places = Place::all();
        if ($item->user->id == Auth::id()) {
            return view('event.edit', compact('item', 'subcategories','places'));
        } else {
            return back();
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $this->validate($request, [
            'event_description' => 'required',
            'event_name' => 'required'
        ]);
        $fileName = 'null';
        if ($request->hasFile('event_photo')) {
            if ($request->file('event_photo')->isValid()) {
                $destinationPath = public_path('upload/image');
                $extension = $request->file('event_photo')->getClientOriginalExtension();
                $fileName = uniqid() . '.' . $extension;
                $request->file('event_photo')->move($destinationPath, $fileName);
                $event->event_photo = $fileName;
            }
        }
        $event->event_name = $request->event_name;
        $event->event_description = $request->event_description;
        if($request->event_date){
          $event->event_date = $request->event_date;
        }
        $event->event_address = $request->event_address;
        $event->event_longitude = $request->event_longitude;
        $event->event_latitude = $request->event_latitude;
        $event->save();
        session()->flash('message', 'updated successfully');
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Event::find($id);
        $item->delete();
        session()->flash('message', 'Deleted successfully');
        return redirect('/home');
    }

    public function user_attend($id)
    {
        $event = Event::find($id);
        $select = DB::table('event_user')->where('user_id', '=', Auth::id())
            ->where('event_id', '=', $id)
            ->first();
        if (is_null($select)) {
            $event->user_attend_by_event()->attach(Auth::id());
            return "'attend_status': 1";
        } else {
            $status = (!$select->status);
            $event->user_attend_by_event()->updateExistingPivot(Auth::id(), ['status' => $status]);
            return "'attend_status':$status";
        }
    }

    public function AllSeen()
    {
        foreach(auth()->user()->unreadNotifications as $note){
            $note->markAsRead();
        }
    }

    public function Check_event($id){
       $commentuser = User::find(Auth::id());
       $today = Carbon::today();
       $event = Event::find($id);
       $select = DB::table('events')->where('id','=',$id)
                  ->where('event_date','<',$today)->get();
       if($select->isEmpty()){
          return view('event.before_event', compact('event','commentuser'));

       }else{
           return view('event.after_event', compact('event','commentuser'));

       }
    }


      public function calendar(){
        $today = Carbon::today();
        $events = Event::orderBy('event_date','asc')->where('event_date','>',$today)
        ->whereNotIn('id',function($query){
          $query->select('event_id')
          ->from('reports')
          ->where('user_id',Auth::id());
        })->get();

        return view('event.calendar',['events'=>$events]);

      }
      public function calendarM($month=01){
        $user = User::find(Auth::id());
        $attendance = $user->events_attend_by_user();
        $user_attendance = Event::where('event_date','like','%-'.$month.'-%')
        ->whereNotIn('id',function($query){
          $query->select('event_id')
          ->from('reports')
          ->where('user_id',Auth::id());
        })->get();

        return $user_attendance ;

      }

      public function make_rate($id,Request $request)
      {
          $rate = $request->rate ;
          $event = \App\Event::where('id', '=',$id)->first();
          $select = $event->ratings()->where('user_id','=',Auth::id())->first();
          if(is_null($select) ){
            $rating = new Rating;
            $rating->rating = $rate;
            $rating->user_id = Auth::id();
            $event->ratings()->save($rating);

          }
          else {
            $event->ratings()->where('user_id','=',Auth::id())->first()->update(array('rating' => $rate));
          }
          return $event->ratings;
      }
}
