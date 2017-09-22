<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
	public function activity(){
    	return $this->belongsTo('App\Appraisal');
    }

    public function item(){
    	return $this->belongsTo('App\Item');
    }
    public $timestamps = false;
}
