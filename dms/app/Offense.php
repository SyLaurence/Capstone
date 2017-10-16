<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offense extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function driveroffense(){
    	return $this->hasMany('App\DriverOffense'); 
    }

}
