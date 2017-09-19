<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(session()->get('user_id')>0)
        {
            
            // Training
            $training = \App\Applicant::all();
            if($training == '[]'){
                $asOfTrain = "No Applicant";
                $training = 0;
            } else {
                $asOfTrain = '';
                $arrTrain = array();
                foreach($training as $train){
                    if($train->hireddriver == '[]'){
                        array_push($arrTrain,$train->id);
                    }
                }
                $training = count($arrTrain);
                $asOfTrain = \App\Applicant::find($arrTrain[count($arrTrain)-1])->get()->first()->created_at;
                $asOfTrain = date_format(date_create($asOfTrain),"F j, Y");
            }
            // Contract
            if(\App\HiredDriver::where('status',0)->get() == '[]' && \App\HiredDriver::where('status',1)->get() == '[]'){
                $asOfContract = "No Contractual";
                $contract = 0;
            } else {
                $contract = count(\App\HiredDriver::where('status',0)->get()) + count(\App\HiredDriver::where('status',1)->get());
                $asOfContract = \App\HiredDriver::where('status',0)->orderBy('created_at','DESC')->get()->first()->created_at;
                $asOfContract = date_format(date_create($asOfContract),"F j, Y");
            }
            
            // Regular
            $regular = count(\App\HiredDriver::where('status',2)->get());
            if(\App\HiredDriver::where('status',2)->orderBy('created_at','DESC')->get() != '[]'){
                $asOfRegular = \App\HiredDriver::where('status',2)->orderBy('created_at','DESC')->get()->first()->created_at;
                $asOfRegular = date_format(date_create($asOfRegular),"F j, Y");
            } else {
                $asOfRegular = "No Regular";
            }
            // Total
            if(\App\Applicant::where('id','!=', null)->orderBy('created_at', 'desc')->get() == '[]'){
                $asOfTotal = 'No Driver';
                $total = 0;
            } else {
                $total = $contract + $training + $regular;
                $asOfTotal = \App\Applicant::where('id','!=', null)->orderBy('created_at', 'desc')
                   ->first()->created_at;
                $asOfTotal = date_format(date_create($asOfTotal),"F j, Y");
            }
            return view('Dashboard',compact('total','training','contract','regular','asOfTotal','asOfTrain','asOfContract','asOfRegular'));
        } else {
            return view('login');
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
       $username = $request->hdUname;
       $password = $request->hdPword;
       $UserItem = User::where('username', $username)->get();
       if($UserItem != '[]'){
            $passFromDB = $UserItem->first()->password;
            $pass = md5($password);

            if ($pass == $passFromDB) {
                // The passwords match...
                $name = $UserItem->first()->first_name . " " .$UserItem->first()->last_name . " " . $UserItem->first()->middle_name;
                session([
                        'username' => $username,
                        'image' => $UserItem->first()->image_path,
                        'name' => $name,
                        'email' => $UserItem->first()->email,
                        'contact' => $UserItem->first()->contact_no,
                        'user_id' => $UserItem->first()->id,
                        'level' => $UserItem->first()->level,
                        'pass_txt' => $password
                    ]);
                        
                // Training
                $training = \App\Applicant::all();
                if($training == '[]'){
                    $asOfTrain = "No Applicant";
                    $training = 0;
                } else {
                    $asOfTrain = '';
                    $arrTrain = array();
                    foreach($training as $train){
                        if($train->hireddriver == '[]'){
                            array_push($arrTrain,$train->id);
                        }
                    }
                    $training = count($arrTrain);
                    $asOfTrain = \App\Applicant::find($arrTrain[count($arrTrain)-1])->get()->first()->created_at;
                    $asOfTrain = date_format(date_create($asOfTrain),"F j, Y");
                }
                // Contract
                if(\App\HiredDriver::where('status',0)->get() == '[]' && \App\HiredDriver::where('status',1)->get() == '[]'){
                    $asOfContract = "No Contractual";
                    $contract = 0;
                } else {
                    $contract = count(\App\HiredDriver::where('status',0)->get()) + count(\App\HiredDriver::where('status',1)->get());
                    $asOfContract = \App\HiredDriver::where('status',0)->orderBy('created_at','DESC')->get()->first()->created_at;
                    $asOfContract = date_format(date_create($asOfContract),"F j, Y");
                }
                
                // Regular
                $regular = count(\App\HiredDriver::where('status',2)->get());
                if(\App\HiredDriver::where('status',2)->orderBy('created_at','DESC')->get() != '[]'){
                    $asOfRegular = \App\HiredDriver::where('status',2)->orderBy('created_at','DESC')->get()->first()->created_at;
                    $asOfRegular = date_format(date_create($asOfRegular),"F j, Y");
                } else {
                    $asOfRegular = "No Regular";
                }
                // Total
                if(\App\Applicant::where('id','!=', null)->orderBy('created_at', 'desc')->get() == '[]'){
                    $asOfTotal = 'No Driver';
                    $total = 0;
                } else {
                    $total = $contract + $training + $regular;
                    $asOfTotal = \App\Applicant::where('id','!=', null)->orderBy('created_at', 'desc')
                       ->first()->created_at;
                    $asOfTotal = date_format(date_create($asOfTotal),"F j, Y");
                }
                return view('Dashboard',compact('total','training','contract','regular','asOfTotal','asOfTrain','asOfContract','asOfRegular'));
            } else {
                return view('/Login');
            }
       } else{
            return view('login');
       }

        
    }
    public function logout()
    {
        session()->flush();
        return redirect('/Login');
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
