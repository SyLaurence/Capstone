<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appraisal extends Model
{
    public function evaluation(){
    	return $this->hasMany('App\Evaluation');
    }
    public function contractrecord(){
    	return $this->hasMany('App\ContractRecord');
    }
}
