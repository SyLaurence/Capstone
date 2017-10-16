<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public function user(){
        return $this->belongsTo('App\User'); 
    }
    public function activityitem(){
    	return $this->hasMany('App\ActivityItem'); 
    }
    public function recruitment(){
    	return $this->belongsTo('App\Recruitment');
    }

    public function activitysetup(){
    	return $this->belongsTo('App\ActivitySetup');
    }

    public $timestamps = false;
}
