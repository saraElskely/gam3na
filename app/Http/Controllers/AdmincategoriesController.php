<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use DB;

class AdmincategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
     $categories= Category::all();
      return view ('admin.categories.index',compact('categories'));


      // $category = DB::table('categories')
      //       ->join('subcategories', 'subcategories.category_id', '=', 'categories.id')
      //       ->select('subcategories.*', 'categories.*')
      //       ->get();

      //   return view('admin.categories.index',['categories'=>$category]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
            $category= new Category;
       $this->validate($request,[

       ]);
      //  $data=$request->all();
      $fileName = 'null';
      if ($request->hasFile('category_photo')) {
          if($request->file('category_photo')->isValid()) {
          $destinationPath = public_path('upload/image');
         $extension =$request->file('category_photo')->getClientOriginalExtension();
         $fileName = uniqid().'.'.$extension;
         $request->file('category_photo')->move($destinationPath, $fileName);
          }
      }


      $category->category_name=$request->category_name;
      $category->category_description=$request->category_description;

      $category->category_photo=$fileName;

      $category->save();
      return redirect('admin/categories');

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
     $category = Category::findOrFail($id);
     return view ('admin.categories.show',compact('category'));

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
          $category = Category::find($id);
         return view ('admin.categories.edit',compact('category'));
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
              $category= Category::find($id) ;
            $this->validate($request,[

            ]);
      //  $data=$request->all();
     $fileName = 'null';
      if ($request->hasFile('category_photo')) {
          if($request->file('category_photo')->isValid()) {
          $destinationPath = public_path('upload/image');
         $extension =$request->file('category_photo')->getClientOriginalExtension();
         $fileName = uniqid().'.'.$extension;
         $request->file('category_photo')->move($destinationPath, $fileName);
         $category->category_photo=$fileName;
          }
      }

      $category->category_name=$request->category_name;
      $category->category_description=$request->category_description;



      $category->save();
      return redirect('admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category= Category::find($id) ;
        $category->delete();
        session()->flash('message','Deleted successfully');
        return redirect('admin/categories');
    }
}
