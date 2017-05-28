<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;
use App\Category;
class AdmincsubcategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
      $subcategories= Subcategory::all();
      return view ('admin.subcategories.index',compact('subcategories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view ('admin.subcategories.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $subcategory= new Subcategory;
       $this->validate($request,[
        'category_id'=>'required',
       ]);
      //  $data=$request->all();



      $fileName = 'null';
      if ($request->hasFile('subcategory_photo')) {
          if($request->file('subcategory_photo')->isValid()) {
          $destinationPath = public_path('upload/image');
         $extension =$request->file('subcategory_photo')->getClientOriginalExtension();
         $fileName = uniqid().'.'.$extension;
         $request->file('subcategory_photo')->move($destinationPath, $fileName);
          }
      }


      $subcategory->subcategory_name=$request->subcategory_name;
      $subcategory->subcategory_description=$request->subcategory_description;
      $subcategory->category_id=$request->category_id;
      $subcategory->subcategory_photo=$fileName;

      $subcategory->save();
      return redirect('admin/subcategories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
      $subcategory = Subcategory::findOrFail($id);
     return view ('admin.subcategories.show',compact('subcategory'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $subcategory = Subcategory::find($id);
         return view ('admin.subcategories.edit',compact('subcategory'));
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
        //
         $subcategory= Subcategory::find($id) ;
       $this->validate($request,[
        'category_id'=>'required',
       ]);
      //  $data=$request->all();
      $fileName = 'null';
      if ($request->hasFile('subcategory_photo')) {
          if($request->file('subcategory_photo')->isValid()) {
          $destinationPath = public_path('upload/image');
         $extension =$request->file('subcategory_photo')->getClientOriginalExtension();
         $fileName = uniqid().'.'.$extension;
         $request->file('subcategory_photo')->move($destinationPath, $fileName);
         $subcategory->subcategory_photo=$fileName;
          }
      }

      $subcategory->subcategory_name=$request->subcategory_name;
      $subcategory->subcategory_description=$request->subcategory_description;
      $subcategory->category_id=$request->category_id;


      $subcategory->save();
      return redirect('admin/subcategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory= Subcategory::find($id) ;
        $subcategory->delete();
        session()->flash('message','Deleted successfully');
        return redirect('admin/subcategories');
    }
}
