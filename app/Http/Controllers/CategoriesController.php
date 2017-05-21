<?php

namespace App\Http\Controllers;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class CategoriesController extends Controller
{

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
            'name' => 'required',
            'description' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $data = $request->all();
            $photo = $request->file('photo');
            $data['photo'] = time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('images'), $data['photo'] );
            Category::create($data);
            Session::flash('success_msg','category created successfuly');
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
