<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesignationRecord extends Model
{
    //
    public function personalinfo(){
    	return $this->belongsTo('App\PersonalInfo');
    }
    public function companybrand(){
    	return $this->belongsTo('App\CompanyBrand');
    }
}
