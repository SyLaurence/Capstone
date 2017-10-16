<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;
 	protected $dates = ['deleted_at'];
	public $timestamps = false;
 	public function choice(){
    	return $this->hasMany('App\Choice'); 
    }
    public function writtenexamdetail(){
    	return $this->hasMany('App\WrittenExamDetail');
    }
}
