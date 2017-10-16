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
        $feed = \App\Limit::find(2);
        $att = \App\Limit::find(3);
        return view('Appraisal.item',compact('items','feed','att'));
    }
    public function indexCrit($id)
    {
        $item = ItemSetup::find($id);
        return View('Appraisal.criteria',compact('item'));
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

            $regular = \App\HiredDriver::where('applicant_id',$request->appID)->orderBy('created_at','DESC')->get()->first()->status;
            $id = \App\HiredDriver::where('applicant_id',$request->appID)->orderBy('created_at','DESC')->get()->first()->id;

            $insertApp = new \App\Appraisal; // Appraisal
            $insertApp->user_id = session()->get('user_id');
            $insertApp->comment = $request->Comment;
            if($request->Recommendation == '2nd contract'){
                $insertApp->Recommendation = 1;
            } else if($request->Recommendation == 'Regular' || $request->Recommendation == 'Continue'){
                $insertApp->Recommendation = 2;
            } else if($request->Recommendation == 'Dismiss') {
                $insertApp->Recommendation = 3;
            }
            $insertApp->hired_driver_id = $id;
            date_default_timezone_set('Asia/Hong_Kong');
            $insertApp->created_at = date("Y-m-d H:i:s",strtotime('now'));
            $insertApp->updated_at = date("Y-m-d H:i:s",strtotime('now'));
            $insertApp->save();
            $AppID = $insertApp->id;

            if($regular < 2){
                 // Hired Driver
                $insertHired = new \App\HiredDriver;
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
                $insertCont->hired_driver_id = $hiredID;
                $insertCont->save();
            }

            // Appraisal Result here 
            $total = 0;
            $totalScore = 0;
            $ctr = 0;
            $arrFact = array();

            $arrSevItem = array();
            $arrItem = array();
            $arrTotalScore = array();
            $arrTotal = array();
            $arrCrit = array();
            $critScore = 0;

            $Factors = \App\ItemSetup::where('used_in',1)->get();

            foreach($Factors as $factor){
                if($factor->criteriasetup->first() != null){
                    foreach($factor->criteriasetup as $criteria){
                        if($criteria->severity == 2){
                            $total+=5;
                        } else if($criteria->severity == 1){
                            $total+=3;
                        } else {
                            $total+=1;
                        }

                        if(request('crit'.$criteria->id) == 'checked'){
                            if($criteria->severity == 2) {
                                $totalScore+=5;
                            } else if($criteria->severity == 1) {
                                $totalScore+=3;
                            } else {
                                $totalScore+=1;
                            }
                        }

                    }
                    array_push($arrTotalScore, $totalScore);
                    $totalScore = 0;
                    array_push($arrTotal,$total);
                    $total = 0;
                } 
                // Working Sev, Total, all; Sev for Factor
                if($factor->severity == 2){
                    array_push($arrSevItem,5);
                } else if($factor->severity == 1){
                    array_push($arrSevItem,3);
                } else {
                    array_push($arrSevItem,1);
                }
            }
            // Factor Score
            foreach($Factors as $factor){
                $arrInsert = array();
                if($factor->criteriasetup->first() != null){
                    array_push($arrInsert,array(
                        'item_setup_id' => $factor->id,
                        'score' => number_format(($arrSevItem[$ctr]*($arrTotalScore[$ctr]/$arrTotal[$ctr])),2)
                        ));
                } else {
                    if(request('fact'.$factor->id) == 'checked'){
                        array_push($arrInsert,array(
                            'item_setup_id' => $factor->id,
                            'score' => $arrSevItem[$ctr]
                            ));
                    } else {
                        array_push($arrInsert,array(
                            'item_setup_id' => $factor->id,
                            'score' => 0
                            ));
                    }
                }
                $ctr++;
                // Evaluations 
                \App\Item::insert($arrInsert);
                $itmID = \App\Item::all()->last()->id;
                array_push($arrFact,
                    array(
                            'appraisal_id' => $AppID,
                            'item_id' => $itmID
                        ));    
                \App\Evaluation::insert($arrFact);
                array_pop($arrFact);
            }
            // Criteria Score
            foreach($Factors as $factor){
                if($factor->criteriasetup->first() != null){
                    foreach($factor->criteriasetup as $criteria){
                        $critID = $criteria->item_setup_id;
                        $itemID = \App\Item::where('item_setup_id',$critID)->orderBy('id','desc')->get()->first()->id;                    
                        if(request('crit'.$criteria->id) == 'checked'){
                            if($criteria->severity == 2) {
                                $critScore = 5;
                            } else if($criteria->severity == 1) {
                                $critScore = 3;
                            } else {
                                $critScore = 1;
                            }
                            array_push($arrCrit,array(
                                'item_id' => $itemID,
                                'criteria_setup_id' => $criteria->id,
                                'score' => $critScore
                                ));
                        } else {
                            array_push($arrCrit,array(
                                'item_id' => $itemID,
                                'criteria_setup_id' => $criteria->id,
                                'score' => 0
                                ));
                        }
                    }
                } 
            }
            \App\Criteria::insert($arrCrit);
            return redirect('/Appraisal'.'/'.$AppID.'/'.$request->appID.'/Detail');
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

    public function detail($aprID, $appID)
    {
        $appraisal = \App\Appraisal::find($aprID);
        $applicant = \App\PersonalInfo::where('id',$appID)->get()->first();
        $busid = \App\DesignationRecord::where('applicant_id',$applicant->applicant_id)->orderBy('id', 'desc')->get()->first()->company_brand_id;
        $busname = \App\CompanyBrand::find($busid)->name;
        $user = \App\User::find($appraisal->user_id);                
        $username = $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name;
        
        $arrTotalCrit = array();
        $arrChkCrit = array();
        $count = 0;
        $totalScore = 0;
        $Factors = \App\ItemSetup::where('used_in',1)->get();

        foreach($Factors as $factor){ // Final Total
            if($factor->severity == 2){
                $totalScore += 5;
            } else if($factor->severity == 1){
                $totalScore += 3;
            } else {
                $totalScore += 1;
            }
            if($factor->criteriasetup->first() != null){
                foreach($factor->criteriasetup as $criteria){
                    $count++;
                }
                array_push($arrTotalCrit,$count);
                $count = 0;
            }
        }

        $count = 0;
        $score = 0; 
        $totScore = 0;
        $scr = 0;
        $arrTots = array();
        $arrScr = array();
        $arrItemScore = array();
        $arrCritScore = array();
        // Foreach
        foreach($appraisal->evaluation as $eval){
            if($eval->item->score > 0){
                $score += $eval->item->score;
                if($eval->item->criteria->first() != null){
                    foreach($eval->item->criteria as $crit){
                        if($crit->score > 0){ // 1 Out of
                            $count++;
                        }
                        array_push($arrCritScore,$crit->score);
                    }
                    array_push($arrChkCrit,$count);
                    $count = 0;
                }
            } else {
                if($eval->item->criteria->first() != null){
                    array_push($arrChkCrit,0);
                    foreach($eval->item->criteria as $crit){
                        array_push($arrCritScore,0);
                    }
                }
            }
            array_push($arrItemScore,$eval->item->score);
            $count = 0;
            $scr += $score;
            $score = 0;
        }
        $totScore =  number_format(($scr/$totalScore)*100)*.50;
        $recom = '';
        if($totScore<60){
            $recom = "Fail";
        } else {
            $recom = "Pass";
        }
        $ctr = 0;
        $stat = '';
        $hired = 1;
        if($hired == 0){
            $stat = '1st Contract';
        } else if($hired == 1){
            $stat = '2nd Contract';
        } else if($hired == 2){
            $stat = 'Regular';
        }
        $crit = 0;
        $fact = 0;
        // totScore + Att + Off + Feed
        //$now = date('Y-m-d',strtotime('now'));
        $hired_date = date('Y-m-d',strtotime(\App\HiredDriver::where('applicant_id',$appID)->get()->last()->created_at));

        // Attendance
        $atts = \App\Attendance::where('applicant_id',$appID)->get();
        $totalTrips = 0;
        foreach($atts as $att){
            if($att->status == 1){
                if(date('Y-m-d',strtotime($att->created_at)) >= $hired_date && date('Y-m-d',strtotime($att->created_at)) <= date('Y-m-d',strtotime($appraisal->created_at))){
                    $totalTrips++;
                }
            }
        }
        $times = date_create($hired_date)->diff(date_create($appraisal->created_at))->m;
        $targettrips = \App\Limit::find(3);
        $limittrips = $targettrips->limit_of_grave*$times;
        $Att = (($totalTrips/$limittrips)*100)*.20;

        // Feedback
        $fds = \App\Feedback::where('applicant_id',$appID)->get();
        $limit = \App\Limit::find(2);
        if($fds != '[]'){
            $pos = 0;
            $neg = 0;
            foreach($fds as $fd){
                if(date('Y-m-d',strtotime($fd->created_at)) >= $hired_date && date('Y-m-d',strtotime($fd->created_at)) <= date('Y-m-d',strtotime($appraisal->created_at))){
                    if($fd->type == 0){
                        $pos++;
                    } else {
                        $neg++;
                    }
                }
            }
            $res = $pos-$neg;
            if($res <= 0){
                $Feed = 0;
            } else if($res > 0){
                $Feed = (($res/$limit->less_grave_no)*100)*.10;
            } else if($res == $limit->less_grave_no){
                $Feed = 10;
            }
        } else {
            $Feed = $limit->limit_of_grave;
        }

        // Offense
        $offs = \App\DriverOffense::where('applicant_id',$appID)->get();
        $limit = \App\Limit::find(1);
        $pts = 0;
        $Off = 0;
        if($offs != '[]'){
            foreach($offs as $off){
                if(date('Y-m-d',strtotime($off->date)) >= $hired_date && date('Y-m-d',strtotime($off->date)) <= date('Y-m-d',strtotime($appraisal->created_at))){
                    $offense = \App\Offense::find($off->offense_id);
                    if($offense->level == 0){
                        $pts++;
                    } else{
                        $pts += $limit->less_grave_no;
                    }
                }
            }
            $Off = ((($pts/($limit->limit_of_grave*$limit->less_grave_no))*100)-100)*.20;
        } else {
            $Off = 20;
        }
        
        $evalTot = $totScore + $Att + number_format(abs($Off)) + $Feed;
        return view('Appraisal.performance-evaluation-detail',compact('applicant','busname','arrChkCrit','arrTotalCrit','count','scr','totScore','ctr','appraisal','Factors','recom','username','stat','arrCritScore','arrItemScore','crit','fact','evalTot','Att','Off','Feed'));
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
        $HiredLevel = 0;
        $hd = \App\HiredDriver::where('applicant_id',$applicant->applicant->id)->orderBy('created_at','DESC')->get()->first()->status;
        return view('Appraisal.performance-evaluation',compact('Factors','applicant','busname','hd'));
    }

    public function showrecord($id){
        $arrApp = array();
        $hasApp = 0;
        $name = \App\PersonalInfo::find($id);
        $drivername = $name->first_name.' '.$name->middle_name.' '.$name->last_name.' '.$name->extension_name;
        $hhh = \App\HiredDriver::where('applicant_id',$id)->get();
        if($hhh == '[]'){
            $hasApp = 0;
        } else {
            foreach($hhh as $hd){
                if($hd->appraisal != '[]'){
                    foreach($hd->appraisal as $appraise){
                        $user = \App\User::find($appraise->user_id);
                        $username = $user->first_name.' '.$user->middle_name.' '.$user->last_name;
                        if($hd->status == 0){
                            $period = '1st Contract';
                        } else if($hd->status == 1){
                            $period = '2nd Contract';
                        } else if($hd->status == 2){
                            $period = 'Regular';
                        }
                        array_push($arrApp,array(
                            'id' => $appraise->id,
                            'date' => date_format(date_create($appraise->created_at),"F j, Y"),
                            'period' => $period,
                            'name' => $username
                            ));
                        $hasApp = 1;
                    }
                }
            }
        }
        $ctr = 0;
        return view('Appraisal.appraisalRecord',compact('arrApp','ctr','id','drivername'));
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
