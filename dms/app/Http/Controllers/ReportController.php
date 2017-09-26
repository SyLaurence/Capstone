<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Report');
    }
    public function generate(Request $request)
    {
        $arr = array();
        $start = date('Y-m-d',strtotime($request->from));
        $end = date('Y-m-d',strtotime($request->to));
        // Hired
        if($request->rtype == 'HD'){
            // date name bus
            if(\App\HiredDriver::where('status',2)->get() != '[]'){
                $drivers = \App\HiredDriver::where('status',2)->get();
                foreach($drivers as $driver){
                    if(\App\HiredDriver::where('applicant_id',$driver->applicant_id)->orderBy('created_at','DESC')->get()->first()->status == 2){
                        // Name
                        $forName = \App\PersonalInfo::find($driver->applicant_id);
                        $name = $forName->first_name .' '.$forName->middle_name.' '.$forName->last_name.' '.$forName->extension_name;
                        $app = \App\HiredDriver::where('applicant_id',$driver->applicant_id)->orderBy('created_at','DESC')->get()->first();
                        // Date
                        $appstart = date('Y-m-d',strtotime($app->created_at));
                        if($appstart >= date('Y-m-d',strtotime($start)) && $appstart <= date('Y-m-d',strtotime($end))){
                            // Bus
                            $buscom = \App\DesignationRecord::where('applicant_id',$driver->applicant_id)->orderBy('created_at','ASC')->get()->first()->company_brand_id;
                            $busname = \App\CompanyBrand::find($buscom)->name;

                            array_push($arr,array(
                            'date' => date('m / d / Y',strtotime($appstart)),
                            'name' => $name,
                            'bus' => $busname
                            ));
                        }
                    }
                }
            }
            if($request->ajax()){
                return $arr;
            }
        }
        // Contractual
        if($request->rtype == 'CD'){
            // date name bus status
            if(\App\HiredDriver::where('status',0)->get() != '[]'){
                $drivers = \App\HiredDriver::where('status',0)->get();
                foreach($drivers as $driver){
                    $status = \App\HiredDriver::where('applicant_id',$driver->applicant_id)->orderBy('created_at','DESC')->get()->first()->status;
                    if($status != 2 && $status != 3){
                        // Status
                        if($status == 1){
                            $stat = '2nd Contract';
                        } else {
                            $stat = '1st Contract';
                        }
                        // Name
                        $forName = \App\PersonalInfo::find($driver->applicant_id);
                        $name = $forName->first_name .' '.$forName->middle_name.' '.$forName->last_name.' '.$forName->extension_name;
                        $app = \App\HiredDriver::where('applicant_id',$driver->applicant_id)->orderBy('created_at','DESC')->get()->first();
                        // Date
                        $appstart = date('Y-m-d',strtotime($app->created_at));
                        if($appstart >= date('Y-m-d',strtotime($start)) && $appstart <= date('Y-m-d',strtotime($end))){
                            // Bus
                            $buscom = \App\DesignationRecord::where('applicant_id',$driver->applicant_id)->orderBy('created_at','ASC')->get()->first()->company_brand_id;
                            $busname = \App\CompanyBrand::find($buscom)->name;
                            
                            array_push($arr,array(
                            'date' => date('m / d / Y',strtotime($appstart)),
                            'name' => $name,
                            'bus' => $busname,
                            'status' => $stat
                            ));
                        }
                    }
                }
            }
            if($request->ajax()){
                return $arr;
            }
        }
        // On Training
        if($request->rtype == 'DOT'){
            // date name bus
            $drivers = \App\Applicant::all();
            foreach($drivers as $driver){
                if($driver->hireddriver == '[]'){
                    // Name
                    $forName = \App\PersonalInfo::find($driver->id);
                    $name = $forName->first_name .' '.$forName->middle_name.' '.$forName->last_name.' '.$forName->extension_name;
                    $app = $driver->created_at;
                    // Date
                    $appstart = date('Y-m-d',strtotime($app));
                    if($appstart >= $start && $appstart <= $end){
                        // Bus
                        $buscom = \App\DesignationRecord::where('applicant_id',$driver->id)->orderBy('created_at','ASC')->get()->first()->company_brand_id;
                        $busname = \App\CompanyBrand::find($buscom)->name;

                        // Current Activity
                        $arrAllAct = array();
                        $arrCompleted = array();
                        $curr = '';
                        $ActivitySetup = \App\ActivitySetup::where('id','!=',null)->orderBy('stage_no','ASC')->get();
                        foreach($ActivitySetup as $act){
                            array_push($arrAllAct,$act->id);
                        }
                        
                        $rec = \App\Recruitment::where('applicant_id',$driver->id)->get()->first();
                        foreach($rec->activity as $act){
                            array_push($arrCompleted,$act->activity_setup_id);
                        }
                        if(empty(array_diff($arrAllAct,$arrCompleted))){
                            $curr = 'Completed';
                        } else{
                            foreach(array_diff($arrAllAct,$arrCompleted) as $a){
                                $actID = $a;
                                break;
                            }
                        }
                        if($curr != 'Completed'){
                            $activity = \App\ActivitySetup::find($actID);
                            $curr = $activity->name;
                        }

                        array_push($arr,array(
                        'date' => date('m / d / Y',strtotime($appstart)),
                        'name' => $name,
                        'bus' => $busname,
                        'curr' => $curr
                        ));
                    }
                }
            }
            if($request->ajax()){
                return $arr;
            }
        }
        // Per Bus Company
        if($request->rtype == 'NODPB'){
            $buscoms = \App\CompanyBrand::all();
            foreach($buscoms as $buscom){
                $ctr = 0;
                $app = 0;
                if(\App\DesignationRecord::where('end_date',null)->get() != '[]'){
                    $busapps = \App\DesignationRecord::where('end_date',null)->get();
                    foreach($busapps as $busapp){
                        if($busapp->company_brand_id == $buscom->id){
                            $busstart = date('Y-m-d',strtotime($busapp->created_at));
                            if($busstart >= $start && $busstart <= $end){
                                if(\App\HiredDriver::where('applicant_id',$busapp->applicant_id)->get() != '[]'){
                                    $status = \App\HiredDriver::where('applicant_id',$busapp->applicant_id)->orderBy('created_at','DESC')->get()->first()->status;
                                    if($status < 3){
                                        $ctr++;
                                    }
                                } else {
                                    $app++;        
                                }
                            }
                        }
                    }
                }
                array_push($arr,array(
                    'bus' => $buscom->name,
                    'reg' => $ctr,
                    'app' => $app
                    ));
            }
            if($request->ajax()){
                return $arr;
            }
        }
        // Per Activity
        if($request->rtype == 'NOAPA'){
            $Actsetups = \App\ActivitySetup::where('id','!=',null)->orderBy('stage_no','ASC')->get();
            $Applicants = \App\Applicant::all();
            $arrCompleted = array();
            $arrAllAct = array();
            foreach($Actsetups as $a){
                array_push($arrAllAct,$a->id);
            }
            
            foreach($Actsetups as $Actsetup){
                $ctr = 0;
                foreach($Applicants as $applicant){
                    if(\App\Hireddriver::where('applicant_id',$applicant->id)->get() == '[]'){
                        $applicantActs = $applicant->recruitment->first()->activity;
                        foreach($applicantActs as $act){
                            array_push($arrCompleted,$act->activity_setup_id);
                        }

                        if(!empty(array_diff($arrAllAct,$arrCompleted))){
                            foreach(array_diff($arrAllAct,$arrCompleted) as $a){
                                $actID = $a;
                                break;
                            }
                        }
                        if($actID == $Actsetup->id){
                            $recID = \App\Recruitment::where('applicant_id',$applicant->id)->get()->first()->id;
                            $date = \App\Activity::where('recruitment_id',$recID)->orderBy('id','DESC')->get()->first()->end_date;
                            $last = date('Y-m-d',strtotime($date));
                            if($last >= $start && $last <= $end)
                            {
                                $ctr++;
                            }
                        }
                    }
                }
                array_push($arr,array(
                    'name' => $Actsetup->name,
                    'total' => $ctr
                    ));
            }
            if($request->ajax()){
                return $arr;
            }
        }
        // Per Stage
        if($request->rtype == 'NOAPS'){
            $Actsetups = \App\ActivitySetup::where('id','!=',null)->orderBy('stage_no','ASC')->get();
            $Applicants = \App\Applicant::all();
            $Stages = \App\ActivitySetup::select('stage_no')->distinct()->get();
            $arrCompleted = array();
            $arrAllAct = array();
            foreach($Actsetups as $a){
                array_push($arrAllAct,$a->id);
            }
            foreach($Stages as $stage){
                $ctr = 0;
                foreach($Actsetups as $Actsetup){
                    foreach($Applicants as $applicant){
                        if(\App\Hireddriver::where('applicant_id',$applicant->id)->get() == '[]'){
                            $applicantActs = $applicant->recruitment->first()->activity;
                            foreach($applicantActs as $act){
                                array_push($arrCompleted,$act->activity_setup_id);
                            }

                            if(!empty(array_diff($arrAllAct,$arrCompleted))){
                                foreach(array_diff($arrAllAct,$arrCompleted) as $a){
                                    $actID = $a;
                                    break;
                                }
                            }
                            if($actID == $Actsetup->id){
                                $recID = \App\Recruitment::where('applicant_id',$applicant->id)->get()->first()->id;
                                $date = \App\Activity::where('recruitment_id',$recID)->orderBy('id','DESC')->get()->first()->end_date;
                                $last = date('Y-m-d',strtotime($date));
                                if($last >= $start && $last <= $end)
                                {
                                    if($Actsetup->stage_no == $stage->stage_no){
                                        $ctr++;
                                    }
                                }
                            }
                        }
                    }
                }
                array_push($arr,array(
                        'stage' => $stage->stage_no,
                        'total' => $ctr
                        ));    
            }
            if($request->ajax()){
                return $arr;
            }
        }
    }
    // Contractual
    
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
