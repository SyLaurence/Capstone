<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Activity_Setup extends Model
{
    //
    use SoftDeletes;
    //
    protected $table = 'tblactivitysetup';

 	protected $dates = ['deleted_at'];
	
}
