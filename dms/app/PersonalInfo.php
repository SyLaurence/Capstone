<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    //
    public $timestamps = false;

    public function address(){
    	return $this->hasMany('App\Address'); 
    }
    public function educationbackground(){
    	return $this->hasMany('App\EducationBackground'); 
    }
    public function familybackground(){
    	return $this->hasMany('App\FamilyBackground'); 
    }
    public function foremergency(){
    	return $this->hasMany('App\ForEmergency'); 
    }
    public function professionalexam(){
    	return $this->hasMany('App\ProfessionalExam'); 
    }
    public function referer(){
    	return $this->hasMany('App\Referer'); 
    }
    public function workexperience(){
    	return $this->hasMany('App\WorkExperience'); 
    }

    public function designationrecord(){
        return $this->hasMany('App\DesignationRecord'); 
    }
}
