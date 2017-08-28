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
        if(session()->get('level') == 0)
        {
            return view('Recruitment.recruitment-transaction');
        } else if(session()->get('level') == 1)
        {
            return view('Recruitment.recruitment-transactionStaff');
        }
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
