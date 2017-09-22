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
        if(session()->get('level') == 0)
        {
            return view('Appraisal.item',compact('items'));
        }
        else if(session()->get('level') == 1)
        {
            return view('Appraisal.itemStaff',compact('items'));
        }
    }
    public function indexCrit($id)
    {
        $item = ItemSetup::find($id);
        if(session()->get('level') == 0)
        {
            return View('Appraisal.criteria',compact('item'));
        }
        else if(session()->get('level') == 1)
        {
            return View('Appraisal.criteriaStaff',compact('item'));
        }
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
            $insertApp = new \App\Appraisal; // Appraisal
            $insertApp->user_id = session()->get('user_id');
            $insertApp->comment = $request->Comment;
            if($request->Recommendation == '2nd contract'){
                $insertApp->Recommendation = 1;
            } else if($request->Recommendation == 'Regular'){
                $insertApp->Recommendation = 2;
            } else if($request->Recommendation == 'Dismiss') {
                $insertApp->Recommendation = 3;
            }
            $insertApp->save();
            $AppID = $insertApp->id;

            // Contract Up
            $hiredID = \App\HiredDriver::where('applicant_id',$request->appID)->orderBy('created_at','DESC')->get()->first()->id;
            $cont = \App\ContractRecord::where('hired_driver_id',$hiredID)->orderBy('created_at','DESC')->get()->first();
            $cont->appraisal_id = $AppID;
            $cont->save();

            $insertHired = new \App\HiredDriver; // Hired Driver
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
            $insertCont->appraisal_id = 0;
            $insertCont->hired_driver_id = $hiredID;
            $insertCont->save();

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

            return redirect('/HiredDriver');
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
        // Foreach
        foreach($appraisal->evaluation as $eval){
                //foreach($act->activityitem as $actitem){ // Score
                    if($eval->item->score > 0){
                        $score += $eval->item->score;
                    //}
                    if($eval->item->criteria->first() != null){
                        foreach($eval->item->criteria as $crit){
                            if($crit->score > 0){ // 1 Out of
                                $count++;
                            }
                        }
                        array_push($arrChkCrit,$count);
                        $count = 0;
                    }
                }
                $count = 0;
                //$tot = number_format(($score/$totalScore)*100);
                //array_push($arrTots,$tot);
                //array_push($arrScr,$score);
                $scr += $score;
                $score = 0;
        }
        $totScore =  number_format(($scr/$totalScore)*100);
        $recom = '';
        if($totScore<60){
            $recom = "Fail";
        } else {
            $recom = "Pass";
        }
        $ctr = 0;
        $stat = '';
        $hired = \App\HiredDriver::find($appraisal->contractrecord->first()->hired_driver_id)->status;
        if($hired == 0){
            $stat = '1st Contract';
        } else if($hired == 1){
            $stat = '2nd Contract';
        } else if($hired == 2){
            $stat = 'Regular';
        }

        return view('Appraisal.performance-evaluation-detail',compact('applicant','busname','arrChkCrit','arrTotalCrit','count','scr','totScore','ctr','appraisal','Factors','recom','username','stat'));
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
        return view('Appraisal.performance-evaluation',compact('Factors','applicant','busname'));
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
