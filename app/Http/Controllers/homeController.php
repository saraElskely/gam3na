<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Category;

/**
 *
 */
class homeController extends Controller
{

  function show($id)
  {
    return 'home page '.$id;
  }

  public function home()
  {
      $categories = Category::all();
      return view('welcome',['categories'=>$categories]);
  }
}
