<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ActivitySetup extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function itemsetup(){
    	return $this->hasMany('App\ItemSetup'); 
    }

    public function activity(){
    	return $this->hasMany('App\Activity'); 
    }

}
