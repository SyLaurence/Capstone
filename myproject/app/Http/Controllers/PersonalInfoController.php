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
        $APP->intAPPUSRID = 1;
        $APP->save();

        $appid = \App\Applicant::orderBy('intAPPID', 'desc')->first();
        $aid = $appid->first()->intAPPID;

        /************* PERSONAL INFO *************/
        $image_path = 'images/' . str_replace(trim('C:\fakepath\ '), '', request('image_path'));

        $PItem = new Personal_info;
        $PItem->txtPNFOImagePath = $image_path;

        $PItem->strPNFOFname = request("first_name");

        if(!empty(request("middle_name"))){
            $PItem->strPNFOMName = request("middle_name");
        }

        $PItem->strPNFOLName = request("last_name");

        if(!empty(request("extension_name"))){
            $PItem->strPNFOEname = request("extension_name");
        }

        $PItem->strPNFOCivilStatus = request("civil_status");
        $PItem->dtPNFODOB = request("date_of_birth");
        $PItem->txtPNFOPOB = request("place_of_birth");
        $PItem->strPNFOCitizenship = request("citizenship");
        $PItem->strPNFOReligion = request("religion");
        $PItem->ftPNFOHeightFT = request("height");
        $PItem->ftPNFOWeightKG = request("weight");
        $PItem->strPNFOResidenceType = request("residence_type");
        $PItem->txtPNFOContactNo = request("contact_no");
        $PItem->strPNFOSSSID = request("sss_id");
        $PItem->strPNFOTINID = request("tin_id");
        $PItem->strPNFOPagibig = request("pagibig");
        $PItem->strPNFOPhilhealth = request("philhealth");
        $PItem->intPNFOSex = request("sex");
        $PItem->intPNFOAPPID = $aid;

        $PItem->save();

        $PItem = Personal_info::where('strPNFOSSSID', request('sss_id'))->get();
        $id = $PItem->first()->intPNFOID;

        /****** ADDRESS ******/
        $AItem = new \App\Address;

        $Address = array(
            array(
                'intADDPNFOID'=> $id,
                'strADDType'=>'current',
                'txtADDress'=>request("curr_add")
            ),
            array(
                'intADDPNFOID'=> $id ,
                'strADDType'=>'permanent',
                'txtADDress'=>request("perm_add")
            ),
            array('intADDPNFOID'=> $id,
                'strADDType'=>'previous',
                'txtADDress'=>request("prev_add")
            )
        );

        \App\Address::insert($Address);

        /************* PERSONAL INFO *************/

        /************* JSON DATA *************/
        $arrRef = json_decode(request('hdRef'),true);
        $arrWxp = json_decode(request('hdWxp'),true); // 
        $arrSib = json_decode(request('hdSib'),true); // strNamestrAddress
        $arrChd = json_decode(request('hdChd'),true); // strNamedtBirthdate


        $arrR = array();
        foreach ($arrRef as $ref) {
            if(!empty($ref['strName'])){
                array_push($arrR,array(
                    "intREFPNFOID"=>$id,
                    "txtREFName"=>$ref['strName'],
                    "txtREFOccupation"=>$ref['strOccupation'],
                    "txtREFAddress"=>$ref['strAddress'],
                    "txtREFContactNo"=>$ref['strContactNo']
                ));
            }
        }
        \App\Referer::insert($arrR);

        $arrW = array();
        foreach ($arrWxp as $wxp) {
            if(!empty($wxp['strName'])){
                array_push($arrW,array(
                    "intWXPPNFOID"=>$id,
                    "txtWXPCompanyName"=>$wxp['strName'],
                    "txtWXPPosition"=>$wxp['strPosition'],
                    "dtWXPDateResigned"=>$wxp['dtResigned'],
                    "txtWXPCompanyContactNo"=>$wxp['strContactNo'],
                    "txtWXPReasonForLeaving"=>$wxp['strReason']
                ));
            }
        }
        \App\Work_Experience::insert($arrW);

        $arrS = array();
        foreach ($arrSib as $sib) {
            if(!empty($sib['strName'])){
                array_push($arrS,array(
                    "intFAMPNFOID"=>$id,
                    "strFAMRelationship"=>"sibling",
                    "strFAMName"=>$sib['strName'],
                    "dtFAMDateOfBirth"=>$sib['dtBirthdate'],
                    "txtFAMAddress"=>$sib['strAddress']
                ));
            }
        }
        \App\Family_Background::insert($arrS);

        $arrC = array();
        foreach ($arrChd as $chd) {
            if(!empty($chd['strName'])){
                array_push($arrC,array(
                    "intFAMPNFOID"=>$id,
                    "strFAMRelationship"=>"children",
                    "strFAMName"=>$chd['strName'],
                    "dtFAMDateOfBirth"=>$chd['dtBirthdate'],
                    "txtFAMAddress"=>$chd['strAddress']
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
                'intEDBGPNFOID'=> $id,
                'intEDBGLevel'=>1,
                'txtEDBGSName'=>request("grade_name"),
                'txtEDBGSAddress'=>request("grade_add")
                ),
            array(
                'intEDBGPNFOID'=> $id,
                'intEDBGLevel'=>2,
                'txtEDBGSName'=>request("high_name"),
                'txtEDBGSAddress'=>request("high_add")
                ),
            array(
                'intEDBGPNFOID'=> $id,
                'intEDBGLevel'=>3,
                'txtEDBGSName'=>request("col_name"),
                'txtEDBGSAddress'=>request("col_add")
                )
        );

        \App\Education_Background::insert($Educ);
        /************* EDUCATION BACKGROUND *************/

        /************* PROF EXAM *************/
        /*request("exam_date");
        request("exam_name");
        request("license_no");*/

        $PX = new \App\Professional_Exam;

        $PX->intPXMPNFOID = $id;
        $PX->dtPXMDate = request("exam_date");
        $PX->txtPXMName = request("exam_name");
        $PX->txtPXMLicenseNo = request("license_no");
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
                    'intFAMPNFOID'=> $id,
                    'strFAMRelationship'=>'father',
                    'strFAMName'=>request("father_name"),
                    'txtFAMAddress'=>request("father_add"),
                    'dtFAMDateOfBirth'=>request("father_bday")
                ),
                array(
                    'intFAMPNFOID'=> $id,
                    'strFAMRelationship'=>'mother',
                    'strFAMName'=>request("mother_name"),
                    'txtFAMAddress'=>request("mother_add"),
                    'dtFAMDateOfBirth'=>request("mother_bday")
                ),
                array(
                    'intFAMPNFOID'=> $id,
                    'strFAMRelationship'=>'spouse',
                    'strFAMName'=>request("spouse_name"),
                    'txtFAMAddress'=>request("spouse_add"),
                    'dtFAMDateOfBirth'=>request("spouse_bday")
                )
            );
        } else {
            $Fam = array(
                array(
                    'intFAMPNFOID'=> $id,
                    'strFAMRelationship'=>'father',
                    'strFAMName'=>request("father_name"),
                    'txtFAMAddress'=>request("father_add"),
                    'dtFAMDateOfBirth'=>request("father_bday")
                ),
                array('intFAMPNFOID'=> $id,
                    'strFAMRelationship'=>'mother',
                    'strFAMName'=>request("mother_name"),
                    'txtFAMAddress'=>request("mother_add"),
                    'dtFAMDateOfBirth'=>request("mother_bday")
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

        $FE->intFEMPNFOID = $id;
        $FE->strFEMPersonToNotify = request("emer_name");
        $FE->strFEMRelationship = request("emer_rel");
        $FE->txtFEMAddress = request("emer_add");
        $FE->txtFEMContactNo = request("emer_cont");
        $FE->save();
        /************* FOR EMERGENCY *************/

        /*config(['global.user_id' => 'heh']);

        return config('global.user_id');*/

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
