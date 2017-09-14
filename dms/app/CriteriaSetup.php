<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class CriteriaSetup extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function criteria(){
    	return $this->hasMany('App\Criteria'); 
    }
    public function itemsetup(){
    	return $this->belongsTo('App\ItemSetup');
    }
}
