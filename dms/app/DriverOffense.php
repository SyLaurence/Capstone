<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverOffense extends Model
{
    public function offense(){
    	return $this->belongsTo('App\Offense'); 
    }
}
