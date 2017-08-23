<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CriteriaSetup;

class CriteriaController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $criteria = new CriteriaSetup;
        $itemID = request('hdID');
        if(request('txtSeverity') == "High") {
            $severity = 2;
        } else if(request('txtSeverity') == "Medium") {
            $severity = 1;
        } else {
            $severity = 0;
        }
        $criteria->item_setup_id = $itemID;
        $criteria->name = request('txtCriName');
        $criteria->severity = $severity;
        $criteria->save();
        $item = \App\ItemSetup::find($itemID);
        if($item->used_in == 0){
            return redirect('/Activity/Item/'.$itemID);
        } else if($item->used_in == 1) {
            return redirect('/Appraisal/Item/'.$itemID);
        }
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
        $criteria = CriteriaSetup::find($id);
        $itmID = $criteria->item_setup_id;
        return View('Stage.criteria-edit',compact('criteria','itmID'));
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
        $criteria = CriteriaSetup::find($id);

        $criteria->name = $request->txtCriName;
        if($request->txtSeverity == "Low"){
            $criteria->severity = 0;
        } else if($request->txtSeverity == "Medium"){
            $criteria->severity = 1;
        } else if($request->txtSeverity == "High") {
            $criteria->severity = 2;
        }
        $criteria->save();
        $itemID = $criteria->item_setup_id;
        $item = \App\ItemSetup::find($itemID);
        if($item->used_in == 0){
            return redirect('/Activity/Item/'.$itemID);
        } else if($item->used_in == 1) {
            return redirect('/Appraisal/Item/'.$itemID);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $criteria = CriteriaSetup::find($id);
        $criteria->delete(); 
        $itemID = $criteria->item_setup_id;
        $item = \App\ItemSetup::find($itemID);
        if($item->used_in == 0){
            return redirect('/Activity/Item/'.$itemID);
        } else if($item->used_in == 1) {
            return redirect('/Appraisal/Item/'.$itemID);
        }
    }
}
