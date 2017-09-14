<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function detail($actID, $appID)
    {
        $activity = \App\ActivitySetup::find($actID);
        $aID = $activity->id;
        $applicant = \App\PersonalInfo::where('id',$appID)->get()->first();
        $busid = \App\DesignationRecord::where('applicant_id',$applicant->applicant_id)->orderBy('id', 'desc')->get()->first()->company_brand_id;
        $busname = \App\CompanyBrand::find($busid)->name;
        $recID = \App\Recruitment::where('applicant_id',$applicant->id)->get()->first()->id;
        $actresult = \App\Activity::where('recruitment_id',$recID)->get();
        $activityID = '';
        $arrUser = array();

        foreach($actresult as $ac){ // Array for User
            if($ac->activity_setup_id == $activity->id){
                $user = \App\User::find($ac->user_id);                
                $username = $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name;
                array_push($arrUser,$username);
            }
        }
        
        //$actresult = \App\Activity::find($activityID);
        $arrTotalCrit = array();
        $arrChkCrit = array();
        $count = 0;
        $totalScore = 0;
        foreach($activity->itemsetup as $factor){ // Array for Total Score. Number of Criteria
                if($factor->severity == 2){
                    $totalScore += 5;
                } else if($factor->severity == 1){
                    $totalScore += 3;
                } else {
                    $totalScore += 1;
                }
        }
        foreach($actresult as $ac){
            if($ac->activity_setup_id == $aID){
                foreach($activity->itemsetup as $factor){ // Array for Total Score. Number of Criteria
                    if($factor->criteriasetup->first() != null){
                        foreach($factor->criteriasetup as $criteria){
                            $count++;
                        }
                        array_push($arrTotalCrit,$count);
                        $count = 0;
                    }
                }
            }
        }
        $count = 0;
        $score = 0; 
        $arrTots = array();
        $arrScr = array();
        // Foreach
        foreach($actresult as $act){
            if($act->activity_setup_id == $aID){
                foreach($act->activityitem as $actitem){ // Score
                    if($actitem->item->score > 0){
                        $score += $actitem->item->score;
                    }
                    if($actitem->item->criteria->first() != null){
                        foreach($actitem->item->criteria as $crit){
                            if($crit->score > 0){ // 1 Out of
                                $count++;
                            }
                        }
                        array_push($arrChkCrit,$count);
                        $count = 0;
                    }
                }
                $count = 0;
                $tot = number_format(($score/$totalScore)*100); // Foreach
                array_push($arrTots,$tot);
                array_push($arrScr,$score);
                $score = 0;
            }
        }
        $ctr = 0;
        //return $actresult->last()->activityitem->last()->item->criteria;
        //return $arrTots;
        return view('Evaluation.evaluation-detail',compact('activity','applicant','busname','actresult','arrUser','arrChkCrit','arrTotalCrit','count','arrScr','arrTots','ctr','aID'));
    }

    public function evaluate($actID,$appID)
    {
        $countF = 0;
        $countC = 0;
        $activity = \App\ActivitySetup::find($actID);
        $applicant = \App\PersonalInfo::where('id',$appID)->get()->first();
        $busid = \App\DesignationRecord::where('applicant_id',$applicant->applicant_id)->orderBy('id', 'desc')->get()->first()->company_brand_id;
        $busname = \App\CompanyBrand::find($busid)->name;
        $recruitmentID = \App\Recruitment::where('applicant_id',$appID)->get()->first()->id;
        return view('Evaluation.evaluation',compact('activity','applicant','busname','recruitmentID','countC','countF'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $actID = request('actID');
        $ctr = 0;
        $arrFact = array();
        
        $activity = \App\ActivitySetup::find($actID);

        $arrSevItem = array();
        $arrItem = array();
        $arrTotalScore = array();
        $arrTotal = array();
        $arrCrit = array();
        $critScore = 0;
        $total = 0;
        $totalScore = 0;
        $ave = 0;
        
        $insert = new \App\Activity;
        $insert->recruitment_id = request('recID');
        $insert->user_id = session()->get('user_id');
        $insert->activity_setup_id = $activity->id;
        $insert->end_date = date("Y-m-d",strtotime("now"));
        $insert->comment = "Good";
        $insert->recommendation = "Pass";
        $insert->save();
        $activityID = $insert->id;

        foreach($activity->itemsetup as $factor){
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
            // Working Sev, Total, all
            if($factor->severity == 2){
                array_push($arrSevItem,5);
            } else if($factor->severity == 1){
                array_push($arrSevItem,3);
            } else {
                array_push($arrSevItem,1);
            }
        }

        foreach($activity->itemsetup as $factor){
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
            \App\Item::insert($arrInsert);
            $itmID = \App\Item::all()->last()->id;
            array_push($arrFact,
                array(
                        'activity_id' => $activityID,
                        'item_id' => $itmID
                    ));    
            \App\ActivityItem::insert($arrFact);
            array_pop($arrFact);
        }
        //$itemID = \App\PersonalInfo::orderBy('id','desc')->get()->first()->id;

        foreach($activity->itemsetup as $factor){
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

        $totalItem = 0;
        foreach($activity->itemsetup as $factor){
            if($factor->severity == 2){
                $totalItem+=5;
            } else if($factor->severity == 1) {
                $totalItem+=3;
            } else {
                $totalItem+=1;
            }
        }

        $actItem = \App\Activity::find($activityID)->activityitem;
        $totalItemScore = 0;
        foreach($actItem as $items){
            $totalItemScore += $items->item->score;
        }

        if(number_format((($totalItemScore/$totalItem)*100),2)<60.00){
            $up = \App\Activity::find($activityID);
            $up->recommendation="Fail";
            $up->save();
        } 
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
