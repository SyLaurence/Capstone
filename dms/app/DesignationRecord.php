<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesignationRecord extends Model
{
    //
    public function applicant(){
    	return $this->belongsTo('App\Applicant');
    }
    public function companybrand(){
    	return $this->belongsTo('App\CompanyBrand');
    }
}
