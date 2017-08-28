<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stage;
use App\ActivitySetup;
use App\SubActivitySetup;

class StageController extends Controller
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
        if(session()->get('level') == 0)
        {
            return view('Stage.activity',compact('Activities','lastStage','ctr','arrTarget'));
        } else if(session()->get('level') == 1)
        {
            return view('Stage.activityStaff',compact('Activities','lastStage','ctr','arrTarget'));
        }
        
        
    }
    
    public function indexItm($id)
    {
        $activity = \App\ActivitySetup::find($id);
        if(session()->get('level') == 0)
        {
            return view('Stage.item',compact('activity'));
        } else if(session()->get('level') == 1)      
        {
            return view('Stage.itemStaff',compact('activity'));
        }
    }
    public function createItm($id)
    {
        $activity = \App\ActivitySetup::find($id);
        return view('Stage.item-add',compact('activity'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Activities = ActivitySetup::all();
        $days = 0;
        $arrTarget = array();
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
                array_push($arrTarget,$days);
                $days = 0;
            }
        }
        return view('Stage.activity-add',compact('Activities','lastStage','arrTarget'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new ActivitySetup;
        $item->name = request('hdName');
        $item->number = request('hdActnum');
        $item->stage_no = request('hdStagenum');
        $item->type = request('hdType');
        $item->target_days = request('hdTargetDays');
        $item->is_skippable = request('skip');
        $item->save();

        return redirect('Stage');
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
        $activity = ActivitySetup::find($id);
        return view('Stage.activity-edit',compact('activity'));
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
        $activity = ActivitySetup::find($id);

        $activity->name = $request->txtActName;
        $activity->number = $request->txtActNum;
        $activity->stage_no = $request->txtStageNum;
        if($request->txtActType == "Document"){
            $activity->type = 0;
        } else if($request->txtActType == "Evaluation"){
            $activity->type = 1;
        } else {
            $activity->type = 2;
        }
        $activity->target_days = $request->txtTargetDays;
        $activity->is_skippable = $request->rbtnIsSkippable;
        $activity->save();

        return redirect ('Stage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ActivitySetup::find($id);
        $item->delete(); 
        return Redirect('Stage');
    }
}
