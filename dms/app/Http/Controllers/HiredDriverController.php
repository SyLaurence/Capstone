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
        $drivers = \App\Applicant::all();
        $arrDriv = array();
        $arrID = array();
        $arrStat = array();
        $arrBus = array();
        $arrDate = array();
        $ctr = 0;
        foreach($drivers as $driver){
            $hireddriver = \App\HiredDriver::where('applicant_id',$driver->id)->orderBy('created_at','DESC')->get()->first();
            if($hireddriver != ''){
                if($hireddriver->status != 3){
                        array_push($arrID,$hireddriver->id);
                        array_push($arrDate,date('M. j, Y',strtotime($hireddriver->created_at)));

                        array_push($arrDriv,$driver->personalinfo->first()->first_name . ' ' . $driver->personalinfo->first()->middle_name . ' ' .$driver->personalinfo->first()->last_name. ' ' .$driver->personalinfo->first()->extension_name);
                        if($hireddriver->status == 0){
                            array_push($arrStat,'1st Contract');
                        } else if($hireddriver->status == 2){
                            array_push($arrStat,'Regular');    
                        } else {
                            array_push($arrStat,'2nd Contract');
                        }
                        
                        $busid = \App\DesignationRecord::where('applicant_id',$driver->id)->orderBy('id', 'desc')->get()->first()->company_brand_id;
                        $busname = \App\CompanyBrand::find($busid)->name;
                        array_push($arrBus,$busname);
                    }
                }
            }
        $buses = \App\CompanyBrand::all();
        return view('Driver.hireddriver',compact('drivers','arrBus','ctr','arrStat','arrDriv','arrID','buses','arrDate'));
    }

    public function all(){
        $drivers = \App\Applicant::all();
        $arrDriv = array();
        $arrID = array();
        $arrStat = array();
        $arrBus = array();
        $arrDate = array();
        $arrHold = array();
        $ctr = 0;
        foreach($drivers as $driver){
            $hireddriver = \App\HiredDriver::where('applicant_id',$driver->id)->orderBy('created_at','DESC')->get()->first();
            $hold = \App\Hold::where('applicant_id',$driver->id)->orderBy('created_at','DESC')->get()->first();
            if($hireddriver != ''){
                //array_push($arrID,$hireddriver->id);
                array_push($arrDate,date('M. j, Y',strtotime($hireddriver->created_at)));

                array_push($arrDriv,$driver->personalinfo->first()->first_name . ' ' . $driver->personalinfo->first()->middle_name . ' ' .$driver->personalinfo->first()->last_name. ' ' .$driver->personalinfo->first()->extension_name);
                if($hireddriver->status == 0){
                    array_push($arrStat,'1st Contract');
                } else if($hireddriver->status == 2){
                    array_push($arrStat,'Regular');    
                } else if($hireddriver->status == 1){
                    array_push($arrStat,'2nd Contract');
                } else {
                    array_push($arrStat,'Unhired/Resigned');
                }
                
                $busid = \App\DesignationRecord::where('applicant_id',$driver->id)->orderBy('id', 'desc')->get()->first()->company_brand_id;
                $busname = \App\CompanyBrand::find($busid)->name;
                array_push($arrBus,$busname);
                array_push($arrHold,'');
            } else if($hold != ''){
                //array_push($arrID,$hold->id);
                array_push($arrDate,date('M. j, Y',strtotime($hold->created_at)));

                array_push($arrDriv,$driver->personalinfo->first()->first_name . ' ' . $driver->personalinfo->first()->middle_name . ' ' .$driver->personalinfo->first()->last_name. ' ' .$driver->personalinfo->first()->extension_name);
                if($hold->status == 0){
                    array_push($arrStat,'On Hold for 1st Contract');
                    array_push($arrHold,'1st');
                } else if($hold->status == 2){
                    array_push($arrStat,'On Hold for Regular');    
                    array_push($arrHold,'Reg');
                } else if($hold->status == 1){
                    array_push($arrStat,'On Hold for 2nd Contract');
                    array_push($arrHold,'2nd');
                }
                $busid = \App\DesignationRecord::where('applicant_id',$driver->id)->orderBy('id', 'desc')->get()->first()->company_brand_id;
                $busname = \App\CompanyBrand::find($busid)->name;
                array_push($arrBus,$busname);
            }
        }
        $buses = \App\CompanyBrand::all();
        $count = 0;
        return view('Driver.alldriver',compact('drivers','arrBus','ctr','arrStat','arrDriv','arrID','buses','arrDate','count','arrHold'));
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
        if($request->type == 'Con') {
            $appraisal = \App\Appraisal::find($request->aprID);
            if($request->rec == 'Dismiss'){
                $appraisal->recommendation = 3;
            }else if($request->rec == 'Regular'){
                $appraisal->recommendation = 2;
            } else if($request->rec == '2nd Contract'){
                $appraisal->recommendation = 1;
            }
            $appraisal->save();

            $hire = new \App\HiredDriver;
            $hire->applicant_id = $request->appID;
            date_default_timezone_set('Asia/Hong_Kong');
            $hire->created_at = date("Y-m-d H:i:s",strtotime('now'));
            $hire->updated_at = date("Y-m-d H:i:s",strtotime('now'));
            if($request->rec == 'Dismiss'){
                $hire->status = 3;
            }else if($request->rec == 'Regular'){
                $hire->status = 2;
            } else if($request->rec == '2nd Contract'){
                $hire->status = 1;
            }
            $hire->save();

            $con = new \App\ContractRecord;
            date_default_timezone_set('Asia/Hong_Kong');
            $con->created_at = date("Y-m-d H:i:s",strtotime('now'));
            $con->updated_at = date("Y-m-d H:i:s",strtotime('now'));
            $con->hired_driver_id = $hire->id;
            $con->save();

            return redirect('/HiredDriver');
        } else if($request->type == 'hold') {
            $in = new \App\Hold;
            $in->applicant_id = $id;
            $in->user_id = session()->get('user_id');
            if($request->rec == 'Dismiss'){
                $in->for = 3;
            }else if($request->rec == 'Regular'){
                $in->for = 2;
            } else if($request->rec == '2nd Contract'){
                $in->for = 1;
            }
            $in->save();
            return redirect('/DriverPool');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = new \App\HiredDriver;
        $delete->applicant_id = $id;
        $delete->status = 3;
        $delete->save();

        // $con = \App\ContractRecord::find($delete->contractrecord)->first();
        // $con->end_date = date("Y-m-d",strtotime("now"));
        // $con->save();
        
        return redirect('/HiredDriver');
    }
}
