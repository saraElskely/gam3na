<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;

class adminPlacesController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function index()
  {
    $places= Place::all();
    return view ('admin.places.index',compact('places'));

  }

  public function create()
  {
      return view ('admin.places.create');
  }


  public function store(Request $request)
  {
    $place= new Place;
    $this->validate($request,[
        'place_name' =>'required|min:10',
        'place_description' => 'required|max:255',
        'place_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'place_address' => 'required'
    ]);

    $fileName = 'null';
    if ($request->hasFile('place_photo')) {
        if($request->file('place_photo')->isValid()) {
        $destinationPath = public_path('upload/image');
       $extension =$request->file('place_photo')->getClientOriginalExtension();
       $fileName = uniqid().'.'.$extension;
       $request->file('place_photo')->move($destinationPath, $fileName);
        }
    }
    $place->place_name=$request->place_name;
    $place->place_description=$request->place_description;
    $place->place_photo=$fileName;
    $place->place_address = $request->place_address;
    $place->place_longitude = $request->place_longitude;
    $place->place_latitude = $request->place_latitude;
    $place->place_details_address = $request->place_details_address;

    $place->save();
    return redirect('admin/places');

  }


  public function show($id)
  {
    $place = Place::findOrFail($id);
    return view ('admin.places.show',compact('place'));
  }


  public function edit($id)
  {
    $place = Place::find($id);
    return view ('admin.places.edit',compact('place'));
  }


  public function update(Request $request, $id)
  {
    $place = Place::find($id);
    $this->validate($request,[
        'place_name' =>'required|min:10',
        'place_description' => 'required|max:255',
        'place_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'place_address' => 'required'
    ]);

    $fileName = 'null';
    if ($request->hasFile('place_photo')) {
        if($request->file('place_photo')->isValid()) {
           $destinationPath = public_path('upload/image');
           $extension =$request->file('place_photo')->getClientOriginalExtension();
           $fileName = uniqid().'.'.$extension;
           $request->file('place_photo')->move($destinationPath, $fileName);
           $place->place_photo=$fileName;
        }
    }
    $place->place_name=$request->place_name;
    $place->place_description=$request->place_description;
    $place->place_address = $request->place_address;
    $place->place_longitude = $request->place_longitude;
    $place->place_latitude = $request->place_latitude;
    $place->place_details_address = $request->place_details_address;

    $place->save();
    return redirect('admin/places');
  }


  public function destroy($id)
  {
    $place = Place::find($id);
    $place->delete();
    session()->flash('message','Deleted successfully');
    return redirect('admin/places');
  }
}
