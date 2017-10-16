<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HiredDriver extends Model
{

 	public function applicant(){
    	return $this->belongsTo('App\Applicant');
    }
    public function contractrecord(){
    	return $this->hasMany('App\ContractRecord'); 
    }
    public function appraisal(){
    	return $this->hasMany('App\Appraisal');
    }
}
