<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Performance_Appraisal_Criteria extends Model
{
    //
    use SoftDeletes;
    //
    protected $table = 'tblappraisalcriteria';

 	protected $dates = ['deleted_at'];
	
}
