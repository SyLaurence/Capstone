<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class CompanyBrand extends Model
{
	use SoftDeletes;
    //
    protected $table = 'company_brand';

 	protected $dates = ['deleted_at'];
	

}
