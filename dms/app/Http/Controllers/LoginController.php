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
            $arrAppID = array();
            $arrName = array();
            $arrBus = array();
            $arrDays = array();
            $arrImage = array();
            $arrAtt = array(0,0,0); // Available, Ontrip, Leave
            $applicants = \App\Applicant::all();
            foreach($applicants as $applicant){
                if($applicant->hireddriver != '[]'){
                    $is = \App\ApplicantLeave::where('applicant_id',$applicant->id)->orderBy('created_at','DESC')->get()->first()->is_available;
                    if($is == 0){
                        $arrAtt[2]++;
                    } else {
                        if(!empty(\App\Attendance::where('applicant_id',$applicant->id)->orderBy('created_at','DESC')->get()->first())){
                            $attendance = \App\Attendance::where('applicant_id',$applicant->id)->orderBy('created_at','DESC')->get()->first()->status;
                            if($attendance == 0){
                                $arrAtt[1]++;
                            } else if($attendance > 0){
                                $arrAtt[0]++;
                            }
                        } else {
                            $arrAtt[0]++;
                        }
                    }
                }
            }
            $unhired = 0;
            $below = 0;
            foreach($applicants as $applicant){
                if($applicant->hireddriver != '[]'){
                    $unhired = 0;
                    $hID = 0;
                    $hID = \App\HiredDriver::where('applicant_id',$applicant->id)->orderBy('created_at','DESC')->get()->first()->id;
                    $stat = \App\HiredDriver::where('applicant_id',$applicant->id)->orderBy('created_at','DESC')->get()->first()->status;
                    if($stat == 2){
                        $startDate = \App\Appraisal::where('hired_driver_id',$hID)->get()->first()->created_at;
                    } else {
                        $startDate = \App\HiredDriver::where('applicant_id',$applicant->id)->orderBy('created_at','DESC')->get()->first()->created_at;
                    }
                    if(date('Y-m-d',strtotime("+5 months", strtotime($startDate))) <= date('Y-m-d',strtotime('now'))){
                        //return date('Y-m-d',strtotime("+5 months +30 days",strtotime($startDate)));
                        array_push($arrAppID,$applicant->id);
                        array_push($arrImage,$applicant->personalinfo->first()->image_path);
                        $endDate = date('Y-m-d',strtotime("+6 months", strtotime($startDate)));
                        $nowDate = date('Y-m-d',strtotime('now'));
                        $days = date_create($nowDate)->diff(date_create($endDate))->d;
                        array_push($arrDays,$days);
                         // Checks if Driver is Hired
                        foreach($applicant->hireddriver as $hired){
                            if($hired->status == 3){
                                $unhired = 1;
                            }
                        }
                        // If Driver is Hired
                        if($unhired == 0){
                            $fname = $applicant->personalinfo->first()->first_name;
                            $mname = $applicant->personalinfo->first()->middle_name;
                            $lname = $applicant->personalinfo->first()->last_name;
                            $ename = $applicant->personalinfo->first()->extension_name;
                            $name = $fname.' '.$mname.' '.$lname.' '.$ename;
                            array_push($arrName,$name);
                            $busid = \App\DesignationRecord::where('applicant_id',$applicant->id)->orderBy('id', 'desc')->get()->first()->company_brand_id;
                            $busname = \App\CompanyBrand::find($busid)->name;
                            array_push($arrBus,$busname);
                        }
                    } else {
                        $below = 1;
                    }
                }
            }
            $norecord = 'Has';
            if(empty($arrBus)){
                $norecord = 'No Reminders.';
            }
            $drivers = \App\Applicant::all();
            // Training
            if($drivers == '[]'){
                $asOfTrain = "No Applicant";
                $training = 0;
            } else {
                $asOfTrain = '';
                $arrTrain = array();
                foreach($drivers as $train){
                    if($train->hireddriver == '[]'){
                        array_push($arrTrain,$train->id);
                    }
                }
                $training = count($arrTrain);
                if(count($arrTrain)>0){
                    $asOfTrain = \App\Applicant::find($arrTrain[count($arrTrain)-1])->get()->first()->created_at;
                    $asOfTrain = date_format(date_create($asOfTrain),"F j, Y");
                }
            }

            // Contract
            $contract = 0;
            $regular = 0;
            $added = 0;
            foreach($drivers as $driver){
                if($driver->hireddriver != '[]'){
                    foreach($driver->hireddriver as $hired){
                        if($hired->status == 0){
                            $contract++;
                            $added = 1;
                        } else if($hired->status == 1){
                            if($added == 0){
                                $contract++;
                            }
                        } else if($hired->status == 2){
                            $regular++;
                            $contract--;
                        } else if($hired->status == 3){
                            $regular--;
                            break;
                        }
                    }
                }
            }
            if(\App\HiredDriver::where('status',0)->get() == '[]' && \App\HiredDriver::where('status',1)->get() == '[]'){
                $asOfContract = "No Contractual";
                $contract = 0;
            } else {
                if($contract > 0){
                    $asOfContract = \App\HiredDriver::where('status',0)->orderBy('created_at','DESC')->get()->first()->created_at;
                    $asOfContract = date_format(date_create($asOfContract),"F j, Y");
                } else {
                    $asOfContract = "No Contractual";
                }
            }
            
            // Regular
            if($regular > 0){
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
             $ctr = 0;
             $months = array();
             $months[0] = date('F',strtotime("now -4 month"));
             $months[1] = date('F',strtotime("now -3 month"));
             $months[2] = date('F',strtotime("now -2 month"));
             $months[3] = date('F',strtotime("now -1 month"));
             $num = array(0,0,0,0);
             foreach($drivers as $drv){
                if($drv->hireddriver != '[]'){
                    if(date('Y-m',strtotime('now -1 month')) == date('Y-m',strtotime($drv->hireddriver->first()->created_at))){
                        $num[3]++;
                    } else if(date('Y-m',strtotime('now -2 month')) == date('Y-m',strtotime($drv->hireddriver->first()->created_at))){
                        $num[2]++;
                    } else if(date('Y-m',strtotime('now -3 month')) == date('Y-m',strtotime($drv->hireddriver->first()->created_at))){
                        $num[1]++;
                    } else if(date('Y-m',strtotime('now -4 month')) == date('Y-m',strtotime($drv->hireddriver->first()->created_at))){
                        $num[0]++;
                    }
                }
             }
            return view('Dashboard',compact('total','training','contract','regular','asOfTotal','asOfTrain','asOfContract','asOfRegular','norecord','arrBus','arrName','arrDays','arrImage','arrAppID','ctr','arrAtt','months','num','below'));
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
                $name = $UserItem->first()->first_name . " " .$UserItem->first()->middle_name . " " . $UserItem->first()->last_name;
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
            return redirect('/Login');
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
