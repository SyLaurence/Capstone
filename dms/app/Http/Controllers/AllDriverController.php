<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AllDriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = \App\Applicant::all();
        $arrDriv = array();
        $arrID = array();
        $arrStat = array();
        $arrBus = array();
        $ctr = 0;
        foreach($drivers as $driver){
            $hireddriver = \App\HiredDriver::where('applicant_id',$driver->id)->orderBy('created_at','DESC')->get()->first();
            if($hireddriver != ''){
                    array_push($arrID,$hireddriver->id);
                    array_push($arrDriv,$driver->personalinfo->first()->first_name . ' ' . $driver->personalinfo->first()->middle_name . ' ' .$driver->personalinfo->first()->last_name. ' ' .$driver->personalinfo->first()->extension_name);
                    if($hireddriver->status == 0){
                        array_push($arrStat,'1st Contract');
                    } else if($hireddriver->status == 2){
                        array_push($arrStat,'Regular');    
                    } else if($hireddriver->status == 1) {
                        array_push($arrStat,'2nd Contract');
                    } else {
                        array_push($arrStat,'Dismissed/Resigned');
                    }
                    
                    $busid = \App\DesignationRecord::where('applicant_id',$driver->id)->orderBy('id', 'desc')->get()->first()->company_brand_id;
                    $busname = \App\CompanyBrand::find($busid)->name;
                    array_push($arrBus,$busname);
            }
        }
        return view('Driver.alldriver',compact('drivers','arrBus','ctr','arrStat','arrDriv','arrID'));
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
        //
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
        //
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
