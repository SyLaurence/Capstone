<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InterviewController extends Controller
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

    public function interview($actID,$appID){
        $activity = \App\ActivitySetup::where('id',$actID)->get()->first();
        $applicant = \App\PersonalInfo::where('id',$appID)->get()->first();
        $busid = \App\DesignationRecord::where('applicant_id',$applicant->applicant_id)->orderBy('id', 'desc')->get()->first()->company_brand_id;
        $busname = \App\CompanyBrand::find($busid)->name;
        $recruitmentID = \App\Recruitment::where('applicant_id',$appID)->get()->first()->id;
        return view('Interview.interview',compact('activity','applicant','busname','recruitmentID'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insert = new \App\Activity;
        $insert->recruitment_id = request('recID');
        $insert->user_id = session()->get('user_id');
        $insert->activity_setup_id = request('actID');
        $insert->end_date = date("Y-m-d",strtotime("now"));
        $insert->comment = request('hdcont');
        $insert->recommendation = request('hdrec');
        $insert->save();
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
    public function interviewDetail($actID,$appID)
    {
        $activity = \App\ActivitySetup::where('id',$actID)->get()->first();
        $applicant = \App\PersonalInfo::where('id',$appID)->get()->first();
        $busid = \App\DesignationRecord::where('applicant_id',$applicant->applicant_id)->orderBy('id', 'desc')->get()->first()->company_brand_id;
        $busname = \App\CompanyBrand::find($busid)->name;
        $recruitmentID = \App\Recruitment::where('applicant_id',$appID)->get()->first()->id;
        $activities = \App\Activity::where('recruitment_id',$recruitmentID)->get();
        foreach($activities as $act){
            if($act->activity_setup_id == $actID){
                $id = $act->id;
            }
        }
        $currActivity = \App\Activity::find($id)->get();
        $count = 0;
        $arrUser = array();
        foreach($currActivity as $curr){
            $user = \App\User::find($curr->user_id);
            $username = $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name;
            array_push($arrUser,$username);
        }
        return view('Interview.interview-detail',compact('activity','applicant','busname','recruitmentID','currActivity','arrUser','count'));
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
