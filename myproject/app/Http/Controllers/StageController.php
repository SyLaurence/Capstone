<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stage;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stages = \App\Stage_Setup::all();
        return view('pages/Stage/stage',compact('stages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages/Stage/stage-add');
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
        $SItem = new \App\Stage_Setup;
        $SItem->intSSPNumber = request('txtStageNum');
        $SItem->strSSPName = request('txtStageName');
        $SItem->save();

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
        //$stages = \App\Stage_Setup::find($intSSPID);
        $stages = \App\Stage_Setup::where('intSSPID', $id)->get();
        //$passFromDB = $UserItem->first()->txtUSRPassword;
        return view('pages/Stage/stage-edit',compact('stages'));
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
        $stages = \App\Stage_Setup::where('intSSPID', $id)->get();

        /*$stages->intSSPNumber = request('txtStageNum');
        $stages->strSSPName = request('txtStageName');
        $stages->save();*/
        return $stages;
        //return redirect ('Stage');
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
