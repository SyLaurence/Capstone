<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function activity(){
    	return $this->belongsTo('App\Activity');
    }
    public function criteria(){
    	return $this->hasMany('App\Criteria'); 
    }
    public function activityitem(){
    	return $this->hasMany('App\ActivityItem'); 
    }
    public function evaluation(){
        return $this->hasMany('App\Evaluation'); 
    }
    public $timestamps = false;
}
