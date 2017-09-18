<?php

namespace App\Http\Controllers;
use App\ActivitySetup;
use Illuminate\Http\Request;

class RecruitmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Activities = ActivitySetup::all();
        $days = 0;
        $ctr = 1;
        $arrTarget = array();
        if($Activities == '[]'){
            $lastStage = 0;
        } else {
            $lastStage = ActivitySetup::where('deleted_at',null)->orderBy('stage_no', 'desc')->get()->first()->stage_no;
            
            for($c=1;$c<=$lastStage;$c++){
                foreach($Activities as $act){
                    if($c==$act->stage_no){
                        $days = $act->target_days + $days;
                    }
                }
                array_push($arrTarget,$days);
                $days = 0;
            }
        }
        return view('Recruitment.recruitment-all',compact('Activities','lastStage','ctr','arrTarget'));

        
        
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

        $checkedRec = \App\Activity::where('recruitment_id',request('recID'))->get();
        $arrChk = array();
        $totalAct = request('totalAct');
        for($c = 0; $c < $totalAct; $c++){
            if(request('checked'.$c) != 'notchecked'){
                array_push($arrChk,array(
                        "recruitment_id"=>request('recID'),
                        "user_id"=>session()->get('user_id'),
                        "activity_setup_id"=>request('checked'.$c),
                        "end_date"=> date("Y-m-d",strtotime("now")),
                        "comment"=>"Good",
                        "recommendation"=>"Pass"
                    ));
            }
        }
       \App\Activity::insert($arrChk);
        return redirect('/Recruitment'.'/'.request('appID'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $days = 0;
        $count = 1;
        $countNotChecked = 1;
        $ctr = 1;
        $appID = $id;
        $chk = 0;
        $all = 0;
        $showModal = 0;
        $actStage = array();
        $recID = \App\Recruitment::find($appID)->id;
        
        $Activities = \App\ActivitySetup::all();
        $checkedActivities = \App\Activity::where('recruitment_id',$recID)->get();
        foreach($Activities as $act){
            $all++;
        }
        $arr = array();
        foreach($checkedActivities as $act){
            if(array_search($act->activity_setup_id,$arr) == null){
                if($act->recommendation == "Pass"){
                    array_push($arr,$act->activity_setup_id);
                }
            }
        }
        if($all == count($arr)){
            $showModal = 1;
        }
        $arrNotChecked = array();
        foreach($Activities as $activity){ // $$arrNotChecked 
            if($activity->type == 3){
                if(array_search($activity->id,$arr) == null){
                    array_push($arrNotChecked,$activity->id);        
                }    
            }
        }
        $FName = \App\PersonalInfo::find($appID)->first_name;
        $MName = \App\PersonalInfo::find($appID)->middle_name;
        $LName = \App\PersonalInfo::find($appID)->last_name;
        $EName = \App\PersonalInfo::find($appID)->extension_name;
        $driverName = $FName . ' ' . $MName . ' ' . $LName .  ' ' . $EName;
        if($Activities == '[]'){
            $lastStage = 0;
        } else {
            $lastStage = ActivitySetup::where('deleted_at',null)->orderBy('stage_no', 'desc')->get()->first()->stage_no;
            for($c=1;$c<=$lastStage;$c++){
                foreach($Activities as $act){
                    if($c==$act->stage_no){
                        $days++;
                    }
                }
                array_push($actStage,$days);
                $days = 0;
            }
        }
        // $allChecked = ActivitySetup::where('recruitment_id',$recID)->orderBy('created_at', 'desc')->get();
        // foreach($allChecked as $check) {
        //     if($check->)
        // }
            return view('Recruitment.recruitment-transaction',compact('driverName','checkedActivities','Activities','lastStage','ctr','actStage','appID','count','recID','showModal','arrNotChecked','countNotChecked'));
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
        if($request->type == 'Doc'){
            $imagePath = 'images'.'/docs'.'/'.$request->photo;
            $in = new \App\Activity;
            $in->recruitment_id = \App\Applicant::find($id)->recruitment->first()->id;
            $in->user_id = session()->get('user_id');
            $in->activity_setup_id = $request->actID;
            $in->end_date = date("Y-m-d",strtotime("now"));
            $in->comment = $imagePath;
            $in->recommendation = 'Pass';
            $in->save();
            return redirect('Recruitment'.'/'.$id);
        } else if($request->type == 'Con') {
            $hire = new \App\HiredDriver;
            $hire->applicant_id = $id;
            $hire->status = 0;
            $hire->save();

            $con = new \App\ContractRecord;
            $con->hired_driver_id = $hire->id;
            $con->save();

            return redirect('/HiredDriver');
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
        
    }
}
