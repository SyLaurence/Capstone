<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function activity(){
    	return $this->hasMany('App\Activity'); 
    }
}
