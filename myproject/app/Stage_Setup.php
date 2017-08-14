<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Stage_Setup extends Model
{
    //
    use SoftDeletes;
    //
    protected $table = 'tblstagesetup';

 	protected $dates = ['deleted_at'];
	
}
