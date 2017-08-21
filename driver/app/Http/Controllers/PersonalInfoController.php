<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Config\Repository;
use App\Personal_info;

class PersonalInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages/Applicant/applicant');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages/Applicant/applicant-add-wizard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        /*$CBItem = new App\Company_Brand;
        $CBItem->name = $request->name;
        $CBItem->description = $request->description;
        $CBItem->save();*/

        $APP = new \App\Applicant;
        $APP->applicant_id = 1;
        $APP->save();

        $appid = \App\Applicant::orderBy('applicant_id', 'desc')->first();
        $aid = $appid->first()->applicant_id;

        /************* PERSONAL INFO *************/
        $image_path = 'images/' . _replace(trim('C:\fakepath\ '), '', request('image_path'));

        $PItem = new Personal_info;
        $PItem->image_path = $image_path;

        $PItem->first_name = request("first_name");

        if(!empty(request("middle_name"))){
            $PItem->middle_name = request("middle_name");
        }

        $PItem->lastname = request("last_name");

        if(!empty(request("extension_name"))){
            $PItem->extension_name = request("extension_name");
        }

        $PItem->civil_status = request("civil_status");
        $PItem->dob = request("date_of_birth");
        $PItem->pob = request("place_of_birth");
        $PItem->citizenship = request("citizenship");
        $PItem->religion = request("religion");
        $PItem->height = request("height");
        $PItem->weight = request("weight");
        $PItem->residence_type = request("residence_type");
        $PItem->contact_no = request("contact_no");
        $PItem->sss_id = request("sss_id");
        $PItem->tin_id = request("tin_id");
        $PItem->pagibig = request("pagibig");
        $PItem->philhealth = request("philhealth");
        $PItem->sex = request("sex");
        $PItem->applicant_id = $aid;

        $PItem->save();

        $PItem = Personal_info::where('sss_id', request('sss_id'))->get();
        $id = $PItem->first()->ID;

        /****** ADDRESS ******/
        $AItem = new \App\Address;

        $Address = array(
            array(
                'id'=> $id,
                'type'=>'current',
                'address'=>request("curr_add")
            ),
            array(
                'id'=> $id ,
                'type'=>'permanent',
                'address'=>request("perm_add")
            ),
            array('id'=> $id,
                'type'=>'previous',
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


        $arrR = array();
        foreach ($arrRef as $ref) {
            if(!empty($ref['Name'])){
                array_push($arrR,array(
                    "personalinfo_id"=>$id,
                    "name"=>$ref['Name'],
                    "occupation"=>$ref['Occupation'],
                    "address"=>$ref['Address'],
                    "contact_no"=>$ref['ContactNo']
                ));
            }
        }
        \App\Referer::insert($arrR);

        $arrW = array();
        foreach ($arrWxp as $wxp) {
            if(!empty($wxp['Name'])){
                array_push($arrW,array(
                    "personalinfo_id"=>$id,
                    "WXPCompanyName"=>$wxp['Name'],
                    "WXPPosition"=>$wxp['Position'],
                    "WXPDateResigned"=>$wxp['Resigned'],
                    "WXPCompanyContactNo"=>$wxp['ContactNo'],
                    "WXPReasonForLeaving"=>$wxp['Reason']
                ));
            }
        }
        \App\Work_Experience::insert($arrW);

        $arrS = array();
        foreach ($arrSib as $sib) {
            if(!empty($sib['Name'])){
                array_push($arrS,array(
                    "FAMID"=>$id,
                    "FAMRelationship"=>"sibling",
                    "FAMName"=>$sib['Name'],
                    "FAMDateOfBirth"=>$sib['Birthdate'],
                    "FAMAddress"=>$sib['Address']
                ));
            }
        }
        \App\Family_Background::insert($arrS);

        $arrC = array();
        foreach ($arrChd as $chd) {
            if(!empty($chd['Name'])){
                array_push($arrC,array(
                    "FAMID"=>$id,
                    "FAMRelationship"=>"children",
                    "FAMName"=>$chd['Name'],
                    "FAMDateOfBirth"=>$chd['Birthdate'],
                    "FAMAddress"=>$chd['Address']
                ));
            }
        }
        \App\Family_Background::insert($arrC);
        
        /************* JSON DATA *************/

        /************* EDUCATION BACKGROUND *************/
        /*request("grade_name");
        request("grade_add");
        request("high_name");
        request("high_add");
        request("col_name");
        request("col_add");*/

        $Educ = array(
            array(
                'EDBGID'=> $id,
                'EDBGLevel'=>1,
                'EDBGSName'=>request("grade_name"),
                'EDBGSAddress'=>request("grade_add")
                ),
            array(
                'EDBGID'=> $id,
                'EDBGLevel'=>2,
                'EDBGSName'=>request("high_name"),
                'EDBGSAddress'=>request("high_add")
                ),
            array(
                'EDBGID'=> $id,
                'EDBGLevel'=>3,
                'EDBGSName'=>request("col_name"),
                'EDBGSAddress'=>request("col_add")
                )
        );

        \App\Education_Background::insert($Educ);
        /************* EDUCATION BACKGROUND *************/

        /************* PROF EXAM *************/
        /*request("exam_date");
        request("exam_name");
        request("license_no");*/

        $PX = new \App\Professional_Exam;

        $PX->PXMID = $id;
        $PX->PXMDate = request("exam_date");
        $PX->PXMName = request("exam_name");
        $PX->PXMLicenseNo = request("license_no");
        $PX->save();

        /************* PROF EXAM *************/

        /************* FAMILY BACKGROUND *************/
        /*request("father_name"); // 1
        request("father_bday"); // 3 Siblings
        request("father_add"); // 5 Children

        request("mother_name"); // 2
        request("mother_bday");
        request("mother_add");

        request("spouse_name"); // 4
        request("spouse_bday");
        request("spouse_add");*/

        if(!empty(request("spouse_name"))){
            $Fam = array(
                array(
                    'FAMID'=> $id,
                    'FAMRelationship'=>'father',
                    'FAMName'=>request("father_name"),
                    'FAMAddress'=>request("father_add"),
                    'FAMDateOfBirth'=>request("father_bday")
                ),
                array(
                    'FAMID'=> $id,
                    'FAMRelationship'=>'mother',
                    'FAMName'=>request("mother_name"),
                    'FAMAddress'=>request("mother_add"),
                    'FAMDateOfBirth'=>request("mother_bday")
                ),
                array(
                    'FAMID'=> $id,
                    'FAMRelationship'=>'spouse',
                    'FAMName'=>request("spouse_name"),
                    'FAMAddress'=>request("spouse_add"),
                    'FAMDateOfBirth'=>request("spouse_bday")
                )
            );
        } else {
            $Fam = array(
                array(
                    'FAMID'=> $id,
                    'FAMRelationship'=>'father',
                    'FAMName'=>request("father_name"),
                    'FAMAddress'=>request("father_add"),
                    'FAMDateOfBirth'=>request("father_bday")
                ),
                array('FAMID'=> $id,
                    'FAMRelationship'=>'mother',
                    'FAMName'=>request("mother_name"),
                    'FAMAddress'=>request("mother_add"),
                    'FAMDateOfBirth'=>request("mother_bday")
                )
            );
        }

        \App\Family_Background::insert($Fam);

        /************* FAMILY BACKGROUND *************/

        /************* FOR EMERGENCY *************/
        /*request("emer_name");
        request("emer_add");
        request("emer_rel");
        request("emer_cont");*/

        $FE = new \App\For_Emergency;

        $FE->FEMID = $id;
        $FE->FEMPersonToNotify = request("emer_name");
        $FE->FEMRelationship = request("emer_rel");
        $FE->FEMAddress = request("emer_add");
        $FE->FEMContactNo = request("emer_cont");
        $FE->save();
        /************* FOR EMERGENCY *************/

        /*config(['global.user_id' => 'heh']);

        return config('global.user_id');*/

    }

    /**
     * Display the specified resource.
     *
     * @param    $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param    $id
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
     * @param    $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    $id
     * @return \Illuminate\Http\Response
     */
    public function deoy($id)
    {
        //
    }
}
