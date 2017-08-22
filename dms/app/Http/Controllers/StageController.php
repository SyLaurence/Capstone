<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stage;
use App\StageSetup;
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
        // $stages = StageSetup::all();
        // $activities = ActivitySetup::all();
        // $subact = SubActivitySetup::all();
        // return view('Stage/stage',compact('stages','activities','subact'));
        $Activities = ActivitySetup::all();
        $lastStage = ActivitySetup::where('deleted_at',null)
               ->orderBy('stage_no', 'desc')
               ->get()->first()->stage_no;
        $ctr = 1;
        return view('Stage.activity',compact('Activities','lastStage','ctr'));

    }

    public function indexItm($id)
    {
        $activity = \App\ActivitySetup::find($id);
        
        return view('Stage.item',compact('activity'));
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
        return view('Stage.activity-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $SItem = new StageSetup;
        // $SItem->number = request('txtStageNum');
        // $SItem->name = request('txtStageName');
        // $SItem->target_days = request('txtTargetDays');
        // $SItem->save();

        // return redirect('Stage');

        $item = new ActivitySetup;
        $item->name = request('hdName');
        $item->number = request('hdActnum');
        $item->stage_no = request('hdStagenum');
        $item->type = request('hdType');
        $item->target_days = request('hdTargetDays');

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
        //$stages = \App\Stage_Setup::find($intSSPID);
        // $stages = StageSetup::find($id);
        // return view('Stage/stage-edit',compact('stages'));
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
        // $stages = StageSetup::find($id);

        // $stages->name = $request->txtStageName;
        // $stages->number = $request->txtStageNum;
        // $stages->target_days = $request->txtTargetDays;
        // $stages->save();

        // return redirect ('Stage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $item = StageSetup::find($id);
        // $item->delete(); 
        // return Redirect('Stage');
    }
}
