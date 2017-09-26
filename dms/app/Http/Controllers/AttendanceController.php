<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buses = \App\CompanyBrand::all();
        $applicants = \App\Applicant::all();
        return view('Attendance.attendance',compact('buses','applicants'));
    }

    public function changebus(Request $request){
        $arr = array();
        $applicants = \App\Applicant::all();
        foreach($applicants as $applicant){
            $name = $applicant->personalinfo->first()->first_name.' '.$applicant->personalinfo->first()->middle_name.' '.$applicant->personalinfo->first()->last_name.' '.$applicant->personalinfo->first()->extension_name;
            $buscom = \App\DesignationRecord::where('applicant_id',$applicant->id)->orderBy('created_at','ASC')->get()->first()->company_brand_id;
            if($buscom == $request->busid){
                if($applicant->applicantleave != '[]'){
                    $available = \App\ApplicantLeave::where('applicant_id',$applicant->id)->orderBy('id','DESC')->get()->first()->is_available;
                    if($available == 1){
                        $status = 'Available';
                        $btn = '<input type="button" class="btn btn-primary" onclick="showModalDis'.$applicant->id.'();" value="Dispatch" /> <input type="button" class="btn btn-warning" onclick="showModalLeave'.$applicant->id.'();" value="File Leave" />';
                        if($applicant->attendance != '[]'){
                            $attendance = \App\Attendance::where('applicant_id',$applicant->id)->orderBy('id','DESC')->get()->first()->status;
                            if($attendance == 0){
                                $status = 'Driving';
                                $btn = '<input type="button" class="btn btn-success" onclick="showModalArrive'.$applicant->id.'();" value="Report Arrival" /> <input type="button" class="btn btn-danger" onclick="showModalNo'.$applicant->id.'();" value="No Arrival" />';
                            }
                        }
                    } else {
                        $status = 'On Leave/Not Available';
                        $btn = '<input type="button" class="btn btn-success" onclick="showModalAvail'.$applicant->id.'();" value="Report Availability" />';
                    }
                    array_push($arr,array(
                        'name' => $name,
                        'status' => $status,
                        'btn' => $btn
                        ));
                }
            }
        }
        //$request->busid;
        if($request->ajax()){
            return $arr;
        }
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
        if($request->type == 'FileLeave'){
            // $request->reason $request->days
            $up = \App\ApplicantLeave::where('applicant_id',$request->appID)->orderBy('created_at','DESC')->get()->first();
            $up->days = $request->days;
            $up->is_available = 0;
            $up->reason = $request->reason;
            $up->save();
        } else if($request->type == 'Available'){
            $in = new \App\ApplicantLeave;
            $in->applicant_id = $request->appID;
            $in->user_id = session()->get('user_id');
            $in->days = 0;
            $in->is_available = 1;
            $in->start_date = date("Y-m-d",strtotime("now"));
            $in->save();
        } else if($request->type == 'Dispatch'){
            $in = new \App\Attendance;
            $in->status = 0;
            $in->applicant_id = $request->appID;
            $in->from = $request->from;
            $in->to = $request->to;
            $in->user_id = session()->get('user_id');
            $in->save();
        } else if($request->type == 'Arrival'){
            $up = \App\Attendance::where('applicant_id',$request->appID)->orderBy('id','DESC')->get()->first();
            $up->comment = $request->comment;
            $up->status = 1;
            $up->save();
        } else if($request->type == 'No Arrival'){
            $up = \App\Attendance::where('applicant_id',$request->appID)->orderBy('id','DESC')->get()->first();
            $up->comment = $request->comment;
            $up->status = 2;
            $up->save();
        }
        return redirect('/Attendance');
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
