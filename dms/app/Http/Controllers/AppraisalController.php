<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemSetup;
class AppraisalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = ItemSetup::where('used_in','1')->get();
        if(session()->get('level') == 0)
        {
            return view('Appraisal.item',compact('items'));
        }
        else if(session()->get('level') == 1)
        {
            return view('Appraisal.itemStaff',compact('items'));
        }
    }
    public function indexCrit($id)
    {
        $item = ItemSetup::find($id);
        if(session()->get('level') == 0)
        {
            return View('Appraisal.criteria',compact('item'));
        }
        else if(session()->get('level') == 1)
        {
            return View('Appraisal.criteriaStaff',compact('item'));
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Appraisal.item-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if($request->Tran == "Perf"){
            $insertApp = new \App\Appraisal; // Appraisal
            $insertApp->user_id = session()->get('user_id');
            $insertApp->comment = $request->Comment;
            if($request->Recommendation == '2nd contract'){
                $insertApp->Recommendation = 1;
            } else if($request->Recommendation == 'Regular'){
                $insertApp->Recommendation = 2;
            } else if($request->Recommendation == 'Dismiss') {
                $insertApp->Recommendation = 3;
            }
            $insertApp->save();
            $AppID = $insertApp->id;

            // Contract Up
            $hiredID = \App\HiredDriver::where('applicant_id',$request->appID)->orderBy('created_at','DESC')->get()->first()->id;
            $cont = \App\ContractRecord::where('hired_driver_id',$hiredID)->orderBy('created_at','DESC')->get()->first();
            $cont->appraisal_id = $AppID;
            $cont->save();

            $insertHired = new \App\HiredDriver; // Hired Driver
            $insertHired->applicant_id = $request->appID;
            if($request->Recommendation == '2nd contract'){
                $insertHired->status = 1;
            } else if($request->Recommendation == 'Regular'){
                $insertHired->status = 2;
            } else if($request->Recommendation == 'Dismiss') {
                $insertHired->status = 3;
            } 
            $insertHired->save();
            $hiredID = $insertHired->id;
            
            // Contract In
            $insertCont = new \App\ContractRecord; 
            $insertCont->appraisal_id = 0;
            $insertCont->hired_driver_id = $hiredID;
            $insertCont->save();

            return redirect('/HiredDriver');
        } else {
            $item = new ItemSetup;
            if(request('txtSeverity') == "High") {
                $severity = 2;
            } else if(request('txtSeverity') == "Medium") {
                $severity = 1;
            } else {
                $severity = 0;
            }
            $item->activity_setup_id = 0;
            $item->name = request('txtItemName');
            $item->severity = $severity;
            $item->used_in = 1;
            $item->save();
            return redirect('/Appraisal');
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
        $Factors = \App\ItemSetup::where('used_in',1)->get();
        $applicant = \App\PersonalInfo::where('id',$id)->get()->first();
        $busid = \App\DesignationRecord::where('applicant_id',$applicant->applicant_id)->orderBy('id', 'desc')->get()->first()->company_brand_id;
        $busname = \App\CompanyBrand::find($busid)->name;
        return view('Appraisal.performance-evaluation',compact('Factors','applicant','busname'));
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
        return View('Appraisal.item-edit',compact('item'));
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

        return redirect ('/Appraisal');
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
    }
}
