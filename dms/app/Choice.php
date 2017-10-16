<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Choice extends Model
{
    use SoftDeletes;
 	protected $dates = ['deleted_at'];
	public $timestamps = false;
 	public function question(){
    	return $this->belongsTo('App\Question'); 
    }
    public function writtenexamdetail(){
    	return $this->hasMany('App\WrittenExamDetail');
    }
}
