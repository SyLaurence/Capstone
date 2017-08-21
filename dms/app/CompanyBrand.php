<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyBrand extends Model
{
    use SoftDeletes;
 	protected $dates = ['deleted_at'];
	
 	public function designationrecord(){
    	return $this->hasMany('App\DesignationRecord'); 
    }

}
