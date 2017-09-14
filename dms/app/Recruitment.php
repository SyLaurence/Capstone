<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    public function applicant(){
    	return $this->belongsTo('App\Applicant');
    }
    public function activity(){
    	return $this->hasMany('App\Activity'); 
    }
}
