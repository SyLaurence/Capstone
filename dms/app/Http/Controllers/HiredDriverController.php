<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HiredDriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = \App\HiredDriver::all();
        
        $arrBus = array();
        $ctr = 0;
        foreach($drivers as $driver){
            if($driver->status != 3){
                $busid = \App\DesignationRecord::where('applicant_id',$driver->applicant->id)->orderBy('id', 'desc')->get()->first()->company_brand_id;
                $busname = \App\CompanyBrand::find($busid)->name;
                array_push($arrBus,$busname);
            }
        }
        return view('Driver.hireddriver',compact('drivers','arrBus','ctr'));
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
        $delete = \App\HiredDriver::find($id);
        $delete->status = 3;
        $delete->save();

        $con = \App\ContractRecord::find($delete->contractrecord)->first();
        $con->end_date = date("Y-m-d",strtotime("now"));
        $con->save();
        
        return redirect('/HiredDriver');
    }
}
