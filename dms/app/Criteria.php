<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    //
    public function item(){
    	return $this->belongsTo('App\Item');
    }
    public function criteriasetup(){
    	return $this->belongsTo('App\CriteriaSetup');
    }
    public $timestamps = false;
}
