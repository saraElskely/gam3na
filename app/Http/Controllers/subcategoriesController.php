<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Event;
use App\Subcategory;

class subcategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function subcat($id)
    {
        $subcategory = Subcategory::find($id);
        $unreport_events = $subcategory->events();
        return $unreport_events ;
    }

}
