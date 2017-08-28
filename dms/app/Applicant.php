<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    public function designationrecord(){
    	return $this->hasMany('App\DesignationRecord'); 
    }
}
