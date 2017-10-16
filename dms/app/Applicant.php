<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    public function designationrecord(){
    	return $this->hasMany('App\DesignationRecord'); 
    }
    public function recruitment(){
    	return $this->hasMany('App\Recruitment'); 
    }
    public function personalinfo(){
    	return $this->hasMany('App\PersonalInfo'); 
    }
    public function hireddriver(){
    	return $this->hasMany('App\HiredDriver'); 
    }
    public function attendance(){
        return $this->hasMany('App\Attendance'); 
    }
    public function applicantleave(){
        return $this->hasMany('App\ApplicantLeave'); 
    }
    public function writtenexam(){
        return $this->hasMany('App\WrittenExam'); 
    }
    public function hold(){
        return $this->hasMany('App\Hold'); 
    }
}
