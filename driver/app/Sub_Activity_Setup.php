<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Sub_Activity_Setup extends Model
{
    //
    use SoftDeletes;
    //
    protected $table = 'sub_activity_setup';
 	protected $dates = ['deleted_at'];

}
