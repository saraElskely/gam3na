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
class Events extends Controller
{
    use  Notifiable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $events = Event::all();
        $user_attend =  User::find(Auth::id())->events_attend_by_user;
        return view('event.home', ['events'=>$events,'user_attend'=>$user_attend]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = Subcategory::all();
        // dd($subcategories);
        return view('event.create',['subcategories'=>$subcategories]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event;
        $this->validate($request,[
            'event_name'=>'required|unique:events',
            'event_description'=>'required',
        ]);
        $fileName = 'null';
        if ($request->hasFile('event_photo')) {
            if($request->file('event_photo')->isValid()) {
                $destinationPath = public_path('upload/image');
                $extension =$request->file('event_photo')->getClientOriginalExtension();
                $fileName = uniqid().'.'.$extension;
                $request->file('event_photo')->move($destinationPath, $fileName);
            }
        }
        $event->event_name = $request->event_name;
        $event->event_description = $request->event_description;
        $event->event_date = $request->event_date;
        $event->event_address = $request->event_address;
        $event->event_photo =$fileName;
        $event->user_id=Auth::id();
        $event->subcategory_id =$request->subcategory_id;
        $event->event_longitude =$request->event_longitude;
        $event->event_latitude =$request->event_latitude;

        if($event->save()){
            $user = User::all();
            Notification::send($user ,new AddEvent($event));
            $data = 'we Have New Event '.$event->event_name;
            StreamLabFacades::pushMessage('gam3na','AddEvent',$data);
        }
        return redirect('event');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Event::find($id);
        $subcategories = Subcategory::all();
        return view('event.edit', compact('item','subcategories'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $this->validate($request,[
            'event_description'=>'required',
            'event_name'=>'required'
        ]);
        $fileName = 'null';
        if ($request->hasFile('event_photo')) {
            if($request->file('event_photo')->isValid()) {
                $destinationPath = public_path('upload/image');
                $extension =$request->file('event_photo')->getClientOriginalExtension();
                $fileName = uniqid().'.'.$extension;
                $request->file('event_photo')->move($destinationPath, $fileName);
                $event->event_photo = $fileName;
            }
        }
        $event->event_name = $request->event_name;
        $event->event_description = $request->event_description;
        $event->event_date = $request->event_date;
        $event->event_address = $request->event_address;
        $event->event_longitude =$request->event_longitude;
        $event->event_latitude =$request->event_latitude;
        $event->save();
        session()->flash('message','updated successfully');
        return redirect('event');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Event::find($id);
        $item->delete();
        session()->flash('message','Deleted successfully');
        return redirect('/event');
    }
    public function user_attend($id){
        $event = Event::find($id);
        // var_dump($event);
        $select = DB::table('event_user')->where('user_id','=',Auth::id())
            ->where('event_id','=',$id)
            ->first();
        if(is_null($select) ){
            // return ($event->);
            $event->user_attend_by_event()->attach(Auth::id());
            // var_dump($event->users_attend_event);
            return "'attend_status': 1";
        }else{
            $status= (! $select->status);
            $event->user_attend_by_event()->updateExistingPivot(Auth::id(),['status'=>$status]);
            return "'attend_status':$status" ;
        }
    }
    public function AllSeen(){
        foreach(auth()->user()->unreadNotifications as $note){
            $note->markAsRead();
        }
    }

        public function Check_event($id){
         $today = Carbon::today();
         $event = Event::find($id);
         $select = DB::table('events')->where('id','=',$id)
                    ->where('event_date','<',$today)->get();
                    
                 if($select->isEmpty()){
                    return view('event.before_event', compact('event'));
                    
                 }else{
                     return view('event.after_event', compact('event'));

                 }
      }


      public function calendar(){
        $events = Event::all();
        $user = User::find(Auth::id());
        $user_attendance = $user->events_attend_by_user->sortByDesc('event_date');
        // dd($user_attendance);

        // $event =DB::table('event_user')
        // ->where('user_id','=',$user)
        // ->where('status','=',true);
       
        // dd($event);
        return view('event.calendar', compact('user_attendance'));

      }
}
