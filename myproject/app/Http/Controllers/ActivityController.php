<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
    //
    public function create($id)
    {
    	$stgID = $id;
    	return View('/pages/Stage/activity-add',compact('stgID'));

    }
    public function store(Request $request)
    {
    	
    }
}
