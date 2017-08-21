 Image: {{$applicant->image_path}}
<br>
 Name: {{$applicant->first_name}} {{$applicant->middle_name}} {{$applicant->last_name}} {{$applicant->extension_name}}
 <br>
 Sex: @if($applicant->sex == 1)
            Male
      @endif
      @if($applicant->sex == 0)
            Female
      @endif
<br>
Citizenship: {{$applicant->citizenship}}
<br>
Birthday: {{$applicant->dob}}
<br>
Place of Birth: {{$applicant->pob}}
<br>
Weight in KG: {{$applicant->weight}}
<br>
Height in FT: {{$applicant->height}}
<br>
Religion: {{$applicant->religion}}
<br>
SSS ID: {{$applicant->sss_id}}
<br>
TIN ID: {{$applicant->tin_id}}     
<br>
Philhealth: {{$applicant->philhealth}}
<br>
Pagibig: {{$applicant->pagibig}}
<br>
Contact Number: {{$applicant->contact_no}}
<br>
Residence Type: 
      @if($applicant->residence_type == 0)
            Rented
      @endif
      @if($applicant->residence_type == 1)
            Living with Parents
      @endif
      @if($applicant->residence_type == 2)
            Mortage
      @endif
      @if($applicant->residence_type == 3)
            Owned
      @endif
<br>
Civil Status: 
      @if($applicant->civil_status == 0)
            Single
      @endif
      @if($applicant->civil_status == 1)
            Married
      @endif
      @if($applicant->civil_status == 2)
            Widowed
      @endif
<br>
<br>
<hr>
<br>
Family Background
<br>
@foreach($applicant->familybackground as $fam)
      Relationship: 
            @if($fam->relationship == 0) 
                  Father
            @endif
            @if($fam->relationship == 1)
                  Mother
            @endif
            @if($fam->relationship == 2)
                  Spouse
            @endif
            @if($fam->relationship == 3)
                  Sibling
            @endif
            @if($fam->relationship == 4)
                  Children
            @endif
      <br>
      Name: {{$fam->name}}
      <br>
      Birthday: {{$fam->dob}}
      <br>
      Address: {{$fam->address}}
      <br>
      <br>
@endforeach
<hr>
<br>
Professional Exam
<br>
@foreach($applicant->professionalexam as $pxm)
      Exam Name: {{$pxm->name}}
      <br>
      License Number: {{$pxm->license_no}}
      <br>
      Date Issued: {{$pxm->date}}
      <br>
      <br>
@endforeach
<hr>
<br>
References
<br>
@foreach($applicant->referer as $ref)
      Name: {{$ref->name}}
      <br>
      Occupation: {{$ref->occupation}}
      <br>
      Address: {{$ref->address}}
      <br>
      Contact Number: {{$ref->contact_no}}
      <br>
      <br>
@endforeach
<hr>
<br>
Educational Background
<br>
@foreach($applicant->educationbackground as $ed)
      Level: 
            @if($ed->level == 0)
                  Grade School
            @endif
            @if($ed->level == 1)
                  HighSchool
            @endif
            @if($ed->level == 2)
                  College
            @endif
      <br>
      School Name: {{$ed->school_name}}
      <br>
      School Address: {{$ed->school_address}}
      <br>
      <br>
@endforeach
<hr>
<br>
Address
<br>
@foreach($applicant->address as $add)
            @if($add->type == 0)
                  Previous Address
            @endif
            @if($add->type == 1)
                  Current Address
            @endif
            @if($add->type == 2)
                  Permanent Address
            @endif
      : {{$add->address}}
      <br>
@endforeach
<hr>
<br>
Work Experience
<br>
@foreach($applicant->workexperience as $wxp)
      Name: {{$wxp->name}}
      <br>
      Position: {{$wxp->position}}
      <br>
      Date Resigned: {{$wxp->date}}
      <br>
      Contact Number: {{$wxp->contact_no}}
      <br>
      Reason for Leaving: {{$wxp->reason_for_leaving}}
      <br>
      <br>
@endforeach
<hr>
<br>
For Emergency
<br>
@foreach($applicant->foremergency as $fem)
    Person to Notify: {{$fem->person_to_notify}} 
    <br>
    Relationship: {{$fem->relationship}}
    <br>
    Address: {{$fem->address}}
    <br>
    Contact Number: {{$fem->contact_no}}
@endforeach