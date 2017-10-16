<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WrittenExamDetail extends Model
{
    public function question(){
    	return $this->belongsTo('App\Question'); 
    }
    public $timestamps = false;
    public function writtenexam(){
    	return $this->belongsTo('App\WrittenExam'); 
    }
    public function choice(){
    	return $this->belongsTo('App\Choice');
    }
}
