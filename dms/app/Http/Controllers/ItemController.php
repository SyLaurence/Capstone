<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemSetup;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function indexCrit($id)
    {
        $item = ItemSetup::find($id);
        return View('Stage.criteria',compact('item'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function createCrit($id)
    {
        $item = ItemSetup::find($id);
        return View('Appraisal.criteria-add',compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new ItemSetup;
        $activityID = request('hdID');
        if(request('txtSeverity') == "High") {
            $severity = 2;
        } else if(request('txtSeverity') == "Medium") {
            $severity = 1;
        } else {
            $severity = 0;
        }
        $item->activity_setup_id = $activityID;
        $item->name = request('txtItemName');
        $item->severity = $severity;
        $item->used_in = 0;
        $item->save();
        return redirect('/Stage/Activity/'.$activityID);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = ItemSetup::find($id);
        $actID = $item->activity_setup_id;
        return View('Stage.item-edit',compact('item','actID'));
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
        $item = ItemSetup::find($id);

        $item->name = $request->txtItemName;
        if($request->txtSeverity == "Low"){
            $item->severity = 0;
        } else if($request->txtSeverity == "Medium"){
            $item->severity = 1;
        } else if($request->txtSeverity == "High") {
            $item->severity = 2;
        }
        $item->save();

        return redirect ('/Stage/Activity/'.$request->actID);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $item = ItemSetup::find($id);
        $item->delete(); 
        if($item->used_in == 0){
            return redirect('/Stage/Activity/'.request('actID'));
        } else if ($item->used_in == 1){
            return redirect('/Appraisal');
        }
    }
}
