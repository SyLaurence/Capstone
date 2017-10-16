<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hold extends Model
{
    public function applicant(){
    	return $this->belongsTo('App\Applicant'); 
    }
}
