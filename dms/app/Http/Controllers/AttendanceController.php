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
        $arrAll = array();
        $buses = \App\CompanyBrand::all();
        $applicants = \App\Applicant::all();
        foreach($applicants as $applicant){
            if(\App\HiredDriver::where('applicant_id',$applicant->id)->get() != '[]'){
                $status = \App\HiredDriver::where('applicant_id',$applicant->id)->orderBy('status','DESC')->get()->first()->status;
                if($status < 3){
                    $name = $applicant->personalinfo->first()->first_name.' '.$applicant->personalinfo->first()->middle_name.' '.$applicant->personalinfo->first()->last_name.' '.$applicant->personalinfo->first()->extension_name;
                    $busid = \App\DesignationRecord::where('applicant_id',$applicant->id)->orderBy('id', 'desc')->get()->first()->company_brand_id;
                    $busname = \App\CompanyBrand::find($busid)->name;
                    $available = \App\ApplicantLeave::where('applicant_id',$applicant->id)->orderBy('id','DESC')->get()->first()->is_available;
                     if($available == 1){
                        $status = 'Available';
                        $btn = 'Dis';
                        if($applicant->attendance != '[]'){
                            $attendance = \App\Attendance::where('applicant_id',$applicant->id)->orderBy('id','DESC')->get()->first()->status;
                            if($attendance == 0){
                                $status = 'Driving';
                                $btn = 'Driv';
                            }
                        }
                    } else {
                        $status = 'On Leave/Not Available';
                        $btn = 'Leav';
                    }
                    array_push($arrAll,array(
                        'id' => $applicant->id,
                        'name' => $name,
                        'bus' => $busname,
                        'status' => $status,
                        'btn' => $btn
                        ));
                }
            }
        }
        $type = '';
        return view('Attendance.attendance',compact('buses','applicants','arrAll','type'));
    }

    public function changebus(Request $request){
        $arr = array('All');
        $applicants = \App\Applicant::all();
        foreach($applicants as $applicant){
            if(\App\HiredDriver::where('applicant_id',$applicant->id)->get() != '[]'){
                $status = \App\HiredDriver::where('applicant_id',$applicant->id)->orderBy('status','DESC')->get()->first()->status;
                if($status < 3){
                    $name = $applicant->personalinfo->first()->first_name.' '.$applicant->personalinfo->first()->middle_name.' '.$applicant->personalinfo->first()->last_name.' '.$applicant->personalinfo->first()->extension_name;
                    if($request->busid == 'All'){
                        $arr[0] = 'All';
                        $busid = \App\DesignationRecord::where('applicant_id',$applicant->id)->orderBy('id', 'desc')->get()->first()->company_brand_id;
                        $busname = \App\CompanyBrand::find($busid)->name;
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
                        if($status == $request->status){
                            array_push($arr,array(
                                'id' => $applicant->id,
                                'name' => $name,
                                'bus' => $busname,
                                'status' => $status,
                                'btn' => $btn
                                ));
                        } else if($request->status == 'All'){
                            array_push($arr,array(
                                'id' => $applicant->id,
                                'name' => $name,
                                'bus' => $busname,
                                'status' => $status,
                                'btn' => $btn
                                ));
                        }
                    } else {
                        $arr[0] = 'notAll';
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
                                if($status == $request->status){
                                    array_push($arr,array(
                                        'name' => $name,
                                        'status' => $status,
                                        'btn' => $btn
                                        ));
                                } else if($request->status == 'All'){
                                    array_push($arr,array(
                                        'name' => $name,
                                        'status' => $status,
                                        'btn' => $btn
                                        ));
                                }
                            }
                        }
                    }
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
            date_default_timezone_set('Asia/Hong_Kong');
            $up->start_date = date("Y-m-d H:i:s",strtotime("now"));
            $up->save();
        } else if($request->type == 'Available'){
            $in = new \App\ApplicantLeave;
            $in->applicant_id = $request->appID;
            $in->user_id = session()->get('user_id');
            $in->days = 0;
            $in->is_available = 1;
            date_default_timezone_set('Asia/Hong_Kong');
            $in->start_date = date("Y-m-d H:i:s",strtotime("now"));
            $in->updated_at = date("Y-m-d H:i:s",strtotime('now'));
            $in->save();
        } else if($request->type == 'Dispatch'){
            $in = new \App\Attendance;
            $in->status = 0;
            $in->applicant_id = $request->appID;
            $in->from = $request->from;
            $in->to = $request->to;
            $in->bus_no = $request->bno;
            $in->user_id = session()->get('user_id');
            date_default_timezone_set('Asia/Hong_Kong');
            $in->created_at = date("Y-m-d H:i:s",strtotime('now'));
            $in->updated_at = date("Y-m-d H:i:s",strtotime('now'));
            $in->save();
        } else if($request->type == 'Arrival'){
            $up = \App\Attendance::where('applicant_id',$request->appID)->orderBy('id','DESC')->get()->first();
            $up->comment = $request->comment;
            $up->status = 1;
            date_default_timezone_set('Asia/Hong_Kong');
            $up->updated_at = date("Y-m-d H:i:s",strtotime('now'));
            $up->save();
        } else if($request->type == 'No Arrival'){
            $up = \App\Attendance::where('applicant_id',$request->appID)->orderBy('id','DESC')->get()->first();
            $up->comment = $request->comment;
            $up->status = 2;
            date_default_timezone_set('Asia/Hong_Kong');
            $up->updated_at = date("Y-m-d H:i:s",strtotime('now'));
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
        $appID = $id;
        $attendances = \App\Attendance::where('applicant_id',$appID)->get();
        $arr = array();
        foreach($attendances as $attendance){
            if($attendance->status > 0){
                $user = \App\User::find($attendance->user_id);
                array_push($arr,array(
                    'user' => $user->first_name.' '.$user->middle_name.' '.$user->last_name,
                    'bno' => $attendance->bus_no,
                    'from' => $attendance->from,
                    'to' => $attendance->to,
                    'dept' => date('g:i A M j, Y',strtotime($attendance->created_at)),
                    'arrive' => date('g:i A M j, Y',strtotime($attendance->updated_at)),
                    'comment' => $attendance->comment
                    ));
            }
        }
        return view('Attendance.attendanceRecord',compact('appID','arr'));
    }
    public function showrecord(Request $request)
    {
        $appID = $request->appID;
        $attendances = \App\Attendance::where('applicant_id',$appID)->get();
        $arr = array();
        foreach($attendances as $attendance){
            if($attendance->status > 0){
                if($request->type == "All"){
                    $user = \App\User::find($attendance->user_id);
                    array_push($arr,array(
                        'user' => $user->first_name.' '.$user->middle_name.' '.$user->last_name,
                        'bno' => $attendance->bus_no,
                        'from' => $attendance->from,
                        'to' => $attendance->to,
                        'dept' => date('g:i A M j, Y',strtotime($attendance->created_at)),
                        'arrive' => date('g:i A M j, Y',strtotime($attendance->updated_at)),
                        'comment' => $attendance->comment
                        ));
                } else if($request->type == "Arrived"){
                    if($attendance->status == 1){
                        $user = \App\User::find($attendance->user_id);
                        array_push($arr,array(
                            'user' => $user->first_name.' '.$user->middle_name.' '.$user->last_name,
                            'bno' => $attendance->bus_no,
                            'from' => $attendance->from,
                            'to' => $attendance->to,
                            'dept' => date('g:i A M j, Y',strtotime($attendance->created_at)),
                            'arrive' => date('g:i A M j, Y',strtotime($attendance->updated_at)),
                            'comment' => $attendance->comment
                            ));
                    }
                } else if($request->type == "No Arrival"){
                    if($attendance->status == 2){
                        $user = \App\User::find($attendance->user_id);
                        array_push($arr,array(
                            'user' => $user->first_name.' '.$user->middle_name.' '.$user->last_name,
                            'bno' => $attendance->bus_no,
                            'from' => $attendance->from,
                            'to' => $attendance->to,
                            'dept' => date('g:i A M j, Y',strtotime($attendance->created_at)),
                            'arrive' => date('g:i A M j, Y',strtotime($attendance->updated_at)),
                            'comment' => $attendance->comment
                            ));
                    }
                }
            }
        }
        if($request->ajax()){
            return $arr;
        }
    }
    public function custom($type){
        if($type=='Leave'){
            $type='On Leave/Not Available';
        }
        $arrAll = array();
        $buses = \App\CompanyBrand::all();
        $applicants = \App\Applicant::all();
        foreach($applicants as $applicant){
            if(\App\HiredDriver::where('applicant_id',$applicant->id)->get() != '[]'){
                $status = \App\HiredDriver::where('applicant_id',$applicant->id)->orderBy('status','DESC')->get()->first()->status;
                if($status < 3){
                    $name = $applicant->personalinfo->first()->first_name.' '.$applicant->personalinfo->first()->middle_name.' '.$applicant->personalinfo->first()->last_name.' '.$applicant->personalinfo->first()->extension_name;
                    $busid = \App\DesignationRecord::where('applicant_id',$applicant->id)->orderBy('id', 'desc')->get()->first()->company_brand_id;
                    $busname = \App\CompanyBrand::find($busid)->name;
                    $available = \App\ApplicantLeave::where('applicant_id',$applicant->id)->orderBy('id','DESC')->get()->first()->is_available;
                     if($available == 1){
                        $status = 'Available';
                        $btn = 'Dis';
                        if($applicant->attendance != '[]'){
                            $attendance = \App\Attendance::where('applicant_id',$applicant->id)->orderBy('id','DESC')->get()->first()->status;
                            if($attendance == 0){
                                $status = 'Driving';
                                $btn = 'Driv';
                            }
                        }
                    } else {
                        $status = 'On Leave/Not Available';
                        $btn = 'Leav';
                    }
                    if($type == $status){
                        array_push($arrAll,array(
                            'id' => $applicant->id,
                            'name' => $name,
                            'bus' => $busname,
                            'status' => $status,
                            'btn' => $btn
                            ));
                    }
                }
            }
        }
        return view('Attendance.attendance',compact('buses','applicants','arrAll','type'));
    }

    public function leaverecord($id){
        $appID = $id;
        $leaves = \App\ApplicantLeave::where('applicant_id',$appID)->get();
        $lastID = $leaves->last()->id; 
        $arr = array();
        for($ctr = 0; $ctr < count($leaves); $ctr++){
            if($leaves[$ctr]['is_available'] == 0 && $leaves[$ctr]['id'] != $lastID){
                $user = \App\User::find($leaves[$ctr]['user_id']);
                array_push($arr,array(
                    'user' => $user->first_name.' '.$user->middle_name.' '.$user->last_name,
                    'es' => $leaves[$ctr]['days'],
                    'ac' => date_create($leaves[$ctr]['start_date'])->diff(date_create($leaves[$ctr+1]['created_at']))->d,
                    'st' => date('M j, Y',strtotime($leaves[$ctr]['start_date'])),
                    'end' => date('M j, Y',strtotime($leaves[$ctr+1]['created_at'])),
                    'res' => $leaves[$ctr]['reason']
                    ));
            }
        }
        return view('Attendance.leaveRecord',compact('appID','arr'));
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
