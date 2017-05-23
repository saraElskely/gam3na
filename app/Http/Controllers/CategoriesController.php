<?php

namespace App\Http\Controllers;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class CategoriesController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

    public function index()
    {
        $categories = Category::all();
        return view('categories.index',['categories'=>$categories]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
          $this->validate($request , [
            'category_name' => 'required',
            'category_description' => 'required',
            'category_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $data = $request->all();

            $category_photo = $request->file('category_photo');
            $data['category_photo'] = time().'.'.$category_photo->getClientOriginalExtension();
            $category_photo->move(public_path('upload/image'), $data['category_photo'] );
            Category::create($data);
            Session::flash('success_msg','category created successfully');
            return redirect()->route('categories.index');


    }

    public function show($id)
    {
        $category = Category::find($id);
        return view('categories.show',['category'=>$category]);
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        Session::flash('success_msg','category deleted successfuly');
        return redirect()->route('categories.index');
    }
}
