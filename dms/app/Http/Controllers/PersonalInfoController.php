<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class PersonalInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicants = \App\PersonalInfo::all();
        return View('PersonalInfo.applicant-list',compact('applicants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('PersonalInfo.applicant-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {   
        // $c = \App\PersonalInfo::find(6);
        // return $c->address[1]->address; foreach($c->address as $address) 
        /************* APPLICANT *************/
        $APP = new \App\Applicant;
        $APP->user_id = Auth::user()->id;
        $APP->save();
        /************* APPLICANT *************/

        /************* PERSONAL INFO *************/
        $appid = \App\Applicant::orderBy('id', 'desc')->first();
        $aid = $appid->id;

        $image_path = 'images/' . str_replace(trim('C:\fakepath\ '), '', request('image_path'));

        $PItem = new \App\PersonalInfo;
        $PItem->image_path = $image_path;

        $PItem->first_name = request("first_name");

        if(!empty(request("middle_name"))){
            $PItem->middle_name = request("middle_name");
        }

        $PItem->last_name = request("last_name");

        if(!empty(request("extension_name"))){
            $PItem->extension_name = request("extension_name");
        }

        if(strtolower(request("civil_status")) == "single"){
            $PItem->civil_status = 0;
        } else if(strtolower(request("civil_status")) == "married"){
            $PItem->civil_status = 1;
        } else if(strtolower(request("civil_status")) == "widowed"){
            $PItem->civil_status = 2;
        }
        //$PItem->civil_status = request("civil_status");

        $PItem->dob = request("date_of_birth"); 
        $PItem->pob = request("place_of_birth");
        $PItem->citizenship = request("citizenship");
        $PItem->religion = request("religion");
        $PItem->height = request("height");
        $PItem->weight = request("weight");

        if(strtolower(request("residence_type")) == "rented"){
            $PItem->residence_type = 0;
        } else if(strtolower(request("residence_type")) == "living with parents"){
            $PItem->residence_type = 1;
        } else if(strtolower(request("residence_type")) == "mortage"){
            $PItem->residence_type = 2;
        } else if(strtolower(request("residence_type")) == "owned"){
            $PItem->residence_type = 3;
        }
        //$PItem->residence_type = request("residence_type");

        $PItem->contact_no = request("contact_no");

        if(!empty(request("sss_id"))){
            $PItem->sss_id = request("sss_id");
        }
        if(!empty(request("tin_id"))){
            $PItem->tin_id = request("tin_id");
        }
        if(!empty(request("pagibig"))){
            $PItem->pagibig = request("pagibig");
        }
        if(!empty(request("philhealth"))){
            $PItem->philhealth = request("philhealth");
        }

        $PItem->sex = request("sex");
        $PItem->applicant_id = $aid;

        $PItem->save();

        $PItem = \App\PersonalInfo::where('sss_id', request('sss_id'))->get();
        $id = $PItem->first()->id;

        /****** ADDRESS ******/
        $Address = array(
            array(
                'personal_info_id'=> $id,
                'type'=> 1,
                'address'=> request("curr_add")
            ),
            array(
                'personal_info_id'=> $id ,
                'type'=> 2,
                'address'=>request("perm_add")
            ),
            array(
                'personal_info_id'=> $id,
                'type'=> 0,
                'address'=>request("prev_add")
            )
        );
        \App\Address::insert($Address);

        /************* PERSONAL INFO *************/

        /************* JSON DATA *************/
        $arrRef = json_decode(request('hdRef'),true);
        $arrWxp = json_decode(request('hdWxp'),true); // 
        $arrSib = json_decode(request('hdSib'),true); // NameAddress
        $arrChd = json_decode(request('hdChd'),true); // NameBirthdate
         $arrPxm = json_decode(request('hdPxm'),true);

        $arrR = array();
        foreach ($arrRef as $ref) {
            if(!empty($ref['strName'])){
                array_push($arrR,array(
                    "personal_info_id"=>$id,
                    "name"=>$ref['strName'],
                    "occupation"=>$ref['strOccupation'],
                    "address"=>$ref['strAddress'],
                    "contact_no"=>$ref['strContactNo']
                ));
            }
        }
        \App\Referer::insert($arrR);

        $arrW = array();
        foreach ($arrWxp as $wxp) {
            if(!empty($wxp['strName'])){
                array_push($arrW,array(
                    "personal_info_id"=>$id,
                    "name"=>$wxp['strName'],
                    "position"=>$wxp['strPosition'],
                    "date_resigned"=>$wxp['dtResigned'],
                    "contact_no"=>$wxp['strContactNo'],
                    "reason_for_leaving"=>$wxp['strReason']
                ));
            }
        }
        \App\WorkExperience::insert($arrW);

        $arrS = array();
        foreach ($arrSib as $sib) {
            if(!empty($sib['strName'])){
                array_push($arrS,array(
                    "personal_info_id"=>$id,
                    "relationship"=>3,
                    "name"=>$sib['strName'],
                    "dob"=>$sib['dtBirthdate'],
                    "address"=>$sib['strAddress']
                ));
            }
        }
        \App\FamilyBackground::insert($arrS);

        $arrC = array();
        foreach ($arrChd as $chd) {
            if(!empty($chd['strName'])){
                array_push($arrC,array(
                    "personal_info_id"=>$id,
                    "relationship"=>4,
                    "name"=>$chd['strName'],
                    "dob"=>$chd['dtBirthdate'],
                    "address"=>$chd['strAddress']
                ));
            }
        }
        \App\FamilyBackground::insert($arrC);
        $arrP = array();
        foreach ($arrPxm as $pxm) {
            if(!empty($pxm['strName'])){
                array_push($arrP,array(
                    "personal_info_id"=>$id,
                    "date"=>$pxm['dtDateTaken'],
                    "name"=>$pxm['strName'],
                    "rating"=>$pxm['strRating'],
                    "license_no"=>$pxm['strLicNum']
                ));
            }
        }
        \App\ProfessionalExam::insert($arrP);

        //  /************* JSON DATA *************/

        //  /************* EDUCATION BACKGROUND *************/
        // $Educ = array(
        //     array(
        //         'personal_info_id'=> $id,
        //         'level'=>0,
        //         'school_name'=>request("grade_name"),
        //         'school_address'=>request("grade_add")
        //         ),
        //     array(
        //         'personal_info_id'=> $id,
        //         'level'=>1,
        //         'school_name'=>request("high_name"),
        //         'school_address'=>request("high_add")
        //         ),
        //     array(
        //         'personal_info_id'=> $id,
        //         'level'=>2,
        //         'school_name'=>request("col_name"),
        //         'school_address'=>request("col_add")
        //         )
        // );

        // \App\EducationBackground::insert($Educ);
        // /************* EDUCATION BACKGROUND *************/

        // // /************* PROF EXAM *************/
        // // $PX = new \App\ProfessionalExam;

        // // $PX->personal_info_id = $id;
        // // $PX->date = request("exam_date");
        // // $PX->name = request("exam_name");
        // // $PX->license_no = request("license_no");
        // // $PX->save();

        // // /************* PROF EXAM *************/

        // /************* FAMILY BACKGROUND *************/
        // if(!empty(request("spouse_name"))){
        //     $Fam = array(
        //         array(
        //             'personal_info_id'=> $id,
        //             'relationship'=>0,
        //             'name'=>request("father_name"),
        //             'dob'=>request("father_bday"),
        //             'address'=>request("father_add")
        //         ),
        //         array(
        //             'personal_info_id'=> $id,
        //             'relationship'=>1,
        //             'name'=>request("mother_name"),
        //             'dob'=>request("mother_bday"),
        //             'address'=>request("mother_add")
        //         ),
        //         array(
        //             'personal_info_id'=> $id,
        //             'relationship'=>2,
        //             'name'=>request("spouse_name"),
        //             'dob'=>request("spouse_bday"),
        //             'address'=>request("spouse_add")
        //         )
        //     );
        // } else {
        //     $Fam = array(
        //         array(
        //             'personal_info_id'=> $id,
        //             'relationship'=>0,
        //             'relationship'=>request("father_name"),
        //             'dob'=>request("father_bday"),
        //             'address'=>request("father_add")
        //         ),
        //         array(
        //             'personal_info_id'=> $id,
        //             'relationship'=>1,
        //             'relationship'=>request("mother_name"),
        //             'dob'=>request("mother_bday"),
        //             'address'=>request("mother_add")
        //         )
        //     );
        // }

        // \App\FamilyBackground::insert($Fam);

        // /************* FAMILY BACKGROUND *************/

        // /************* FOR EMERGENCY *************/
        // $FE = new \App\ForEmergency;

        // $FE->personal_info_id = $id;
        // $FE->person_to_notify = request("emer_name");
        // $FE->relationship = request("emer_rel");
        // $FE->address = request("emer_add");
        // $FE->contact_no = request("emer_cont");
        // $FE->save();
        /************* FOR EMERGENCY *************/
        return view('PersonalInfo.applicant-list');
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
        $applicant = \App\PersonalInfo::find($id);
        return View('PersonalInfo.applicant-profile',compact('applicant'));
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
