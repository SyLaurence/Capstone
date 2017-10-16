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
        $arrCon = array();
        foreach($checkedActivities as $act){
            if(array_search($act->activity_setup_id,$arr) == null){
                if($act->recommendation == "Pass"){
                    array_push($arr,$act->activity_setup_id);
                }
            }
        }
        foreach($checkedActivities as $act){
                if($act->recommendation == "Pass"){
                    $arrCon[$act->activity_setup_id] = $act->activity_setup_id;
                }
        }
        if($all == count($arrCon)){
            $showModal = 1;
        }
        $arrNotChecked = array();
        foreach($Activities as $activity){ // arrNotChecked 
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
        $applicant = \App\Applicant::find($appID);
        $arrStart = array(date('m/d/Y',strtotime($applicant->created_at)));
        $arrEnd = array();
        $Counter = 0;
        $toin = '';
        $acts = \App\ActivitySetup::where('id','!=',null)->orderBy('stage_no','ASC')->get();
        foreach($acts as $act){
            foreach($checkedActivities as $actc){
                if($actc->activity_setup_id == $act->id && $actc->recommendation == 'Pass'){
                    $toin = date('m/d/Y',strtotime($actc->end_date));  
                    break;
                }
            }
            $arrEnd[$act->id] = $toin;
            array_push($arrStart,$toin);
            $toin='';
        }
        $hired = 0;
        if($applicant->hireddriver == '[]'){
            $hired = 0;
        } else {
            $hired = 1;
        }
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
        $Count = 0;
        $total = 0;
        $score = 0;
        $res = 0;
        $pass = 0;
        $questions = \App\Question::all();
        foreach($questions as $question){
            if($question->choice != '[]'){
                $total++;
            }
        }
        if($applicant->writtenexam != '[]'){
            foreach($applicant->writtenexam->last()->writtenexamdetail as $wxd){
                foreach($wxd->question->choice as $choice){
                    if($choice->is_correct == 1){
                        if($wxd->choice_id == $choice->id){
                            $score++;
                        }
                    }
                }
            }
            $pass = $total * .60;
        } else {
            $res = 2;
        }
        if($res != 2){
            if($score >= $pass) {
                $res = 1;
            } else {
                $res = 0;
            }
        }
        return view('Recruitment.recruitment-transaction',compact('driverName','checkedActivities','Activities','lastStage','ctr','actStage','appID','count','recID','showModal','arrNotChecked','countNotChecked','hired','Counter','arrEnd','arrStart','Count','res'));
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
            date_default_timezone_set('Asia/Hong_Kong');
            $hire->created_at = date("Y-m-d H:i:s",strtotime('now'));
            $hire->updated_at = date("Y-m-d H:i:s",strtotime('now'));
            $hire->status = 0;
            $hire->save();

            $con = new \App\ContractRecord;
            date_default_timezone_set('Asia/Hong_Kong');
            $con->created_at = date("Y-m-d H:i:s",strtotime('now'));
            $con->updated_at = date("Y-m-d H:i:s",strtotime('now'));
            $con->hired_driver_id = $hire->id;
            $con->save();

            $leave = new \App\ApplicantLeave;
            $leave->applicant_id = $id;
            $leave->user_id = session()->get('user_id');
            date_default_timezone_set('Asia/Hong_Kong');
            $leave->created_at = date("Y-m-d H:i:s",strtotime('now'));
            $leave->updated_at = date("Y-m-d H:i:s",strtotime('now'));
            $leave->start_date = date("Y-m-d H:i:s",strtotime("now"));
            $leave->is_available = 1;
            $leave->days = 0;
            $leave->save();

            return redirect('/HiredDriver');
        } else if($request->type == 'hold') {
            $in = new \App\Hold;
            $in->applicant_id = $id;
            $in->user_id = session()->get('user_id');
            $in->for = 0;
            $in->save();
            return redirect('/DriverPool');
        } else if($request->type == 'ChangeCon') {
            $hire = new \App\HiredDriver;
            $hire->applicant_id = $id;
            date_default_timezone_set('Asia/Hong_Kong');
            $hire->created_at = date("Y-m-d H:i:s",strtotime('now'));
            $hire->updated_at = date("Y-m-d H:i:s",strtotime('now'));
            if($request->Ctype == '1st'){
                $hire->status = 0;
            } else if($request->Ctype == '2nd'){
                $hire->status = 1;
            } else if($request->Ctype == 'Reg'){
                $hire->status = 2;
            }
            $hire->save();

            $con = new \App\ContractRecord;
            date_default_timezone_set('Asia/Hong_Kong');
            $con->created_at = date("Y-m-d H:i:s",strtotime('now'));
            $con->updated_at = date("Y-m-d H:i:s",strtotime('now'));
            $con->hired_driver_id = $hire->id;
            $con->save();

            $leave = new \App\ApplicantLeave;
            $leave->applicant_id = $id;
            $leave->user_id = session()->get('user_id');
            date_default_timezone_set('Asia/Hong_Kong');
            $leave->created_at = date("Y-m-d H:i:s",strtotime('now'));
            $leave->updated_at = date("Y-m-d H:i:s",strtotime('now'));
            $leave->start_date = date("Y-m-d H:i:s",strtotime("now"));
            $leave->is_available = 1;
            $leave->days = 0;
            $leave->save();

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
