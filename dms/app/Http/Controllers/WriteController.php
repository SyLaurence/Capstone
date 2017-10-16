<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = \App\Question::all();
        $arrAns = array();
        $ctr = 0;
        foreach($questions as $question){
            if($question->choice != '[]'){
                $ans = \App\Choice::where('question_id',$question->id)->orderBy('is_correct','DESC')->get()->first();
                if($ans->deleted_at == null && $ans->is_correct == 0){
                    array_push($arrAns,'choose');
                } else {
                    array_push($arrAns,$ans->choice);    
                }
                
            }
        }
        return view('Written.written',compact('questions','ctr','arrAns'));
    }
    public function showEdit(Request $request){
        $id = $request->id;
        $question = \App\Question::find($id);
        $arr = array();
        array_push($arr,$question->question);
        if($question->severity == 0){
            array_push($arr, 'Low');
        } else if($question->severity == 1) {
            array_push($arr, 'Medium');
        } else {
            array_push($arr, 'High');
        }
        if($request->ajax()){
            return $arr;
        }
    }
    public function up(Request $request){
        $id = $request->id;
        $question = $request->question;
        $sev = $request->severity;

        $up = \App\Question::find($id);
        $up->question = $question;
        $up->severity = 0;
        $up->save();
        if($request->ajax()){
            return $up;
        }
    }
    public function add(Request $request){
        $in = new \App\Question;
        $in->question = $request->question;
        $in->severity = 0;
        $in->save();
        if($request->ajax()){
            return $in;
        }
    }
    public function delete(Request $request){
        $del = \App\Question::find($request->id);
        $del->delete();
        if($request->ajax()){
            return $del;
        }
    }
    public function ans(Request $request){
        $up = \App\Question::find($request->questionid)->choice;
        foreach($up as $u){
            $u->is_correct = 0;
            $u->save();
        }
        $up = \App\Choice::find($request->choiceid);
        $up->is_correct = 1;
        $up->save();
        if($request->ajax()){
            return $up;
        }
    }
    public function showChoice($id){
        $question = \App\Question::find($id);
        return view('Written.choice',compact('question'));
    }
    public function addchoice(Request $request){
        $in = new \App\Choice;
        $in->choice = $request->choice;
        $in->question_id = $request->questionid;
        $in->is_correct = 0;
        $in->save();
        if($request->ajax()){
            return $in;
        }
    }
    public function delchoice(Request $request){
        $del = \App\Choice::find($request->choice);
        $del->delete();
        if($request->ajax()){
            return $del;
        }
    }
    public function upchoice(Request $request){
        $up = \App\Choice::find($request->id);
        $up->choice = $request->choice;
        $up->save();
        if($request->ajax()){
            return $up;
        }
    }

    public function exam($id){
        $applicant = \App\PersonalInfo::where('id',$id)->get()->first();
        $busid = \App\DesignationRecord::where('applicant_id',$applicant->applicant_id)->orderBy('id', 'desc')->get()->first()->company_brand_id;
        $busname = \App\CompanyBrand::find($busid)->name;
        $questions = \App\Question::all();
        return view('Written.eval',compact('applicant','busname','questions'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inwe = new \App\WrittenExam;
        $inwe->applicant_id = $request->appID;
        $inwe->user_id = session()->get('user_id');
        date_default_timezone_set('Asia/Hong_Kong');
        $inwe->created_at = date("Y-m-d H:i:s",strtotime('now'));
        $inwe->updated_at = date("Y-m-d H:i:s",strtotime('now'));
        $inwe->save();
        $arr = array();
        $questions = \App\Question::all();
        foreach($questions as $question){
            if($question->choice != '[]'){
                if(request('ans'.$question->id) != 'not'){
                    $ind = new \App\WrittenExamDetail;
                    $ind->written_exam_id = $inwe->id;
                    $ind->question_id = $question->id;
                    $ind->choice_id = request('ans'.$question->id);
                    $ind->save();
                }
            }
        }
        return redirect('/WrittenDetail'.'/'.$request->appID);
    }

    public function details($id){
        $applicants = \App\Applicant::find($id);
        $applicant = $applicants->personalinfo->first();
        $busid = \App\DesignationRecord::where('applicant_id',$applicants->id)->orderBy('id', 'desc')->get()->first()->company_brand_id;
        $busname = \App\CompanyBrand::find($busid)->name;
        $questions = \App\Question::all();
        $arrUser = array();

        foreach($applicants->writtenexam as $wxm){ // Array for User
                $user = \App\User::find($wxm->user_id);                
                $username = $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name;
                array_push($arrUser,$username);
        }
        $ctr = 0;
        //return $applicants->writtenexam->first()->writtenexamdetail->first()->question->choice->first();
        return view('Written.evaldetail',compact('applicant','busname','applicants','questions','arrUser','ctr'));
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
