<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WrittenExam extends Model
{
    public function applicant(){
    	return $this->belongsTo('App\Applicant'); 
    }
    public function writtenexamdetail(){
    	return $this->hasMany('App\WrittenExamDetail'); 
    }
}
