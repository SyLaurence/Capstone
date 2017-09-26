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
            $applicants = \App\Applicant::all();
            $unhired = 0;
            foreach($applicants as $applicant){
                if($applicant->hireddriver != '[]'){
                    $unhired = 0;
                    $hID = 0;
                    $hID = \App\HiredDriver::where('applicant_id',$applicant->id)->orderBy('created_at','DESC')->get()->first()->id;
                    $stat = \App\HiredDriver::where('applicant_id',$applicant->id)->orderBy('created_at','DESC')->get()->first()->status;
                    $hireddr = \App\ContractRecord::where('appraisal_id',0)->get();
                    $cont = \App\ContractRecord::where('hired_driver_id',$hID)->get()->first()->appraisal_id;
                    if($stat == 2 && $cont > 0){
                        $startDate = \App\Appraisal::where('id',$cont)->get()->first()->created_at;
                    } else {
                        foreach($hireddr as $hd){
                            if($hd->hired_driver_id == $hID){
                                $startDate = $hd->created_at;
                            }
                        }
                    }
                    if(date('Y-m-d',strtotime("+5 months", strtotime($startDate))) <= date('Y-m-d',strtotime('now'))){
                        //return date('Y-m-d',strtotime("+5 months +30 days",strtotime($startDate)));
                        array_push($arrAppID,$applicant->id);
                        array_push($arrImage,$applicant->personalinfo->first()->image_path);
                        $endDate = date('Y-m-d',strtotime("+5 months +30 days", strtotime($startDate)));
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
                    }
                }
            }
            $norecord = 'Has';
            if($arrBus == '[]'){
                $norecord = 'No Reminders.';
            }
            //return date('Y-m-d',strtotime($startDate));
            //return date('Y-m-d',strtotime("+5 months", strtotime($startDate))) . ' ' . date('Y-m-d',strtotime('now'));
            // if(date('Y-m-d',strtotime('now')) <= date('Y-m-d',strtotime('+12 days',strtotime('now')))){
            //     return 1;
            // }
            //return date('Y-m-d',strtotime("+5 months +30 days", strtotime($startDate)));
            //return $arrDays;
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
            return view('Dashboard',compact('total','training','contract','regular','asOfTotal','asOfTrain','asOfContract','asOfRegular','norecord','arrBus','arrName','arrDays','arrImage','arrAppID','ctr'));
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
            

            $arrAppID = array();
            $arrName = array();
            $arrBus = array();
            $arrDays = array();
            $arrImage = array();
            $applicants = \App\Applicant::all();
            $unhired = 0;
            foreach($applicants as $applicant){
                if($applicant->hireddriver != '[]'){
                    $unhired = 0;
                    $hID = 0;
                    $hID = \App\HiredDriver::where('applicant_id',$applicant->id)->orderBy('created_at','DESC')->get()->first()->id;
                    $stat = \App\HiredDriver::where('applicant_id',$applicant->id)->orderBy('created_at','DESC')->get()->first()->status;
                    $hireddr = \App\ContractRecord::where('appraisal_id',0)->get();
                    $cont = \App\ContractRecord::where('hired_driver_id',$hID)->get()->first()->appraisal_id;
                    if($stat == 2 && $cont > 0){
                        $startDate = \App\Appraisal::where('id',$cont)->get()->first()->created_at;
                    } else {
                        foreach($hireddr as $hd){
                            if($hd->hired_driver_id == $hID){
                                $startDate = $hd->created_at;
                            }
                        }
                    }
                    if(date('Y-m-d',strtotime("+5 months", strtotime($startDate))) <= date('Y-m-d',strtotime('now'))){
                        //return date('Y-m-d',strtotime("+5 months +30 days",strtotime($startDate)));
                        array_push($arrAppID,$applicant->id);
                        array_push($arrImage,$applicant->personalinfo->first()->image_path);
                        $endDate = date('Y-m-d',strtotime("+5 months +30 days", strtotime($startDate)));
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
                    }
                }
            }
            $norecord = 'Has';
            if($arrBus == '[]'){
                $norecord = 'No Reminders.';
            }
            //return date('Y-m-d',strtotime($startDate));
            //return date('Y-m-d',strtotime("+5 months", strtotime($startDate))) . ' ' . date('Y-m-d',strtotime('now'));
            // if(date('Y-m-d',strtotime('now')) <= date('Y-m-d',strtotime('+12 days',strtotime('now')))){
            //     return 1;
            // }
            //return date('Y-m-d',strtotime("+5 months +30 days", strtotime($startDate)));
            //return $arrDays;

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
            return view('Dashboard',compact('total','training','contract','regular','asOfTotal','asOfTrain','asOfContract','asOfRegular','norecord','arrBus','arrName','arrDays','arrImage','arrAppID','ctr'));
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
