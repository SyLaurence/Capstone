<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OffenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offenses = \App\Offense::all();
        $limit = \App\Limit::all()->first();
        return view('Offense.offense',compact('offenses','limit'));
    }
    public function add(Request $request){
        $in = new \App\Offense;
        $in->name = $request->offense;
        $in->level = $request->level;
        $in->save();
        if($request->ajax()){
            return $in;   
        }
    }
    public function up(Request $request){
        $up = \App\Offense::find($request->id);
        $up->name = $request->offense;
        $up->level = $request->level;
        $up->save();
        if($request->ajax()){
            return $up;   
        }
    }
    public function del(Request $request){
        $up = \App\Offense::find($request->id);
        $up->delete();
        if($request->ajax()){
            return $up;   
        }
    }
    public function set(Request $request){
        if($request->for == 'off'){
            $in = \App\Limit::find(1);
            if($in != ''){
                $in->user_id = session()->get('user_id');
                $in->less_grave_no = $request->no;
                $in->limit_of_grave = $request->limit;
                $in->save();
            } else {
                $in = new \App\Limit;
                $in->id = 1;
                $in->user_id = session()->get('user_id');
                $in->less_grave_no = $request->no;
                $in->limit_of_grave = $request->limit;
                $in->save();
            }
        } else if($request->for == 'perf'){
            $in = \App\Limit::find(2);
            if($in != ''){
                $in->user_id = session()->get('user_id');
                $in->less_grave_no = $request->num;
                $in->limit_of_grave = $request->def;
                $in->save();
            } else {
                $in = new \App\Limit;
                $in->id = 2;
                $in->user_id = session()->get('user_id');
                $in->less_grave_no = $request->num;
                $in->limit_of_grave = $request->def;
                $in->save();
            }

            $up = \App\Limit::find(3);
            if($up != ''){
                $up->user_id = session()->get('user_id');
                $up->less_grave_no = 0;
                $up->limit_of_grave = $request->trips;
                $up->save();
            } else {
                $up = new \App\Limit;
                $up->id = 3;
                $up->user_id = session()->get('user_id');
                $up->less_grave_no = 0;
                $up->limit_of_grave = $request->trips;
                $up->save();
            }

        }
        if($request->ajax()){
            return $in;   
        }
    }

    public function offenserecord($id){
        $appID = $id;
        $offs = \App\DriverOffense::where('applicant_id',$appID)->get();
        $arr = array();
        foreach($offs as $off){
            $user = \App\User::find($off->user_id);
            $offense = $off->offense->first();
            if($offense->level == 0){
                $level = 'Less Grave';
            } else {
                $level = 'Grave';
            }
            array_push($arr,array(
                'user' => $user->first_name.' '.$user->middle_name.' '.$user->last_name,
                'dt' => date('g:i A M j, Y',strtotime($off->date)),
                'off' => $offense->name,
                'lev' => $level,
                'com' => $off->comment
                ));
        }
        $offs = \App\Offense::all();
        return view('Offense.offenseRecord',compact('appID','arr','offs'));
    }

    public function showrecord(Request $request)
    {
        $appID = $request->appID;
        $offs = \App\DriverOffense::where('applicant_id',$appID)->get();
        $arr = array();
        foreach($offs as $off){
            $user = \App\User::find($off->user_id);
            $offense = $off->offense->first();
                if($request->type == "All"){
                    if($offense->level == 0){
                        $level = 'Less Grave';
                    } else {
                        $level = 'Grave';
                    }
                    array_push($arr,array(
                        'user' => $user->first_name.' '.$user->middle_name.' '.$user->last_name,
                        'dt' => date('g:i A M j, Y',strtotime($off->date)),
                        'off' => $offense->name,
                        'lev' => $level,
                        'com' => $off->comment
                        ));
                } else if($request->type == "Less Grave"){
                    if($offense->level == 0){
                        array_push($arr,array(
                            'user' => $user->first_name.' '.$user->middle_name.' '.$user->last_name,
                            'dt' => date('g:i A M j, Y',strtotime($off->date)),
                            'off' => $offense->name,
                            'com' => $off->comment
                            ));
                    }
                } else if($request->type == "Grave"){
                    if($offense->level == 1){
                        array_push($arr,array(
                            'user' => $user->first_name.' '.$user->middle_name.' '.$user->last_name,
                            'dt' => date('g:i A M j, Y',strtotime($off->date)),
                            'off' => $offense->name,
                            'com' => $off->comment
                            ));
                    }
                }
        }
        if($request->ajax()){
            return $arr;
        }
    }

    public function addrecord(Request $request){
        $in = new \App\DriverOffense;
        $in->user_id = session()->get('user_id');
        $in->offense_id = $request->offid;
        $in->applicant_id = $request->appid;
        $in->comment = $request->comment;
        $in->date = date("Y-m-d H:i:s",strtotime($request->date));
        $in->save();
        if($request->ajax()){
            return $in;
        }
    }

    public function feedbackrecord($id){
        $appID = $id;
        $fds = \App\Feedback::where('applicant_id',$appID)->get();
        $arr = array();
        foreach($fds as $fd){
            $user = \App\User::find($fd->user_id);
            if($fd->type == 0){
                $level = 'Positive';
            } else {
                $level = 'Negative';
            }
            array_push($arr,array(
                'user' => $user->first_name.' '.$user->middle_name.' '.$user->last_name,
                'dt' => date('g:i A M j, Y',strtotime($fd->date)),
                'com' => $fd->comment,
                'lev' => $level
                ));
        }
        return view('Offense.feedbackRecord',compact('appID','arr'));
    }

    public function showrecordfeed(Request $request)
    {
        $appID = $request->appID;
        $fds = \App\Feedback::where('applicant_id',$appID)->get();
        $arr = array();
        foreach($fds as $fd){
            $user = \App\User::find($fd->user_id);
                if($request->type == "All"){
                    if($fd->level == 0){
                        $level = 'Positive';
                    } else {
                        $level = 'Negative';
                    }
                    array_push($arr,array(
                        'user' => $user->first_name.' '.$user->middle_name.' '.$user->last_name,
                        'dt' => date('g:i A M j, Y',strtotime($fd->created_at)),
                        'com' => $fd->comment,
                        'lev' => $level
                        ));
                } else if($request->type == "Pos"){
                    if($fd->type == 0){
                        array_push($arr,array(
                            'user' => $user->first_name.' '.$user->middle_name.' '.$user->last_name,
                            'dt' => date('g:i A M j, Y',strtotime($fd->created_at)),
                            'com' => $fd->comment,
                            ));
                    }
                } else if($request->type == "Neg"){
                    if($fd->type == 1){
                        array_push($arr,array(
                            'user' => $user->first_name.' '.$user->middle_name.' '.$user->last_name,
                            'dt' => date('g:i A M j, Y',strtotime($fd->created_at)),
                            'com' => $fd->comment,
                            ));
                    }
                }
        }
        if($request->ajax()){
            return $arr;
        }
    }

    public function addrecordfeed(Request $request){
        if($request->type == 'Pos'){
            $level = 0;
        } else {
            $level = 1;
        }
        $in = new \App\Feedback;
        $in->user_id = session()->get('user_id');
        $in->applicant_id = $request->appid;
        $in->comment = $request->comment;
        $in->type = $level;
        $in->save();
        if($request->ajax()){
            return $in;
        }
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
