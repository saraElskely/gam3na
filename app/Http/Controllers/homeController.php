<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

/**
 *
 */
class homeController extends Controller
{

  function show($id)
  {
    return 'home page '.$id;
  }
}
