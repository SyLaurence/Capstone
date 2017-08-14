<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Company_Brand extends Model
{
	use SoftDeletes;
    //
    protected $table = 'tblcompanybrand';

 	protected $dates = ['deleted_at'];
	

}
