<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Stage_Setup extends Model
{

    use SoftDeletes;
    //
    protected $table = 'stage_setup';
 	protected $dates = ['deleted_at'];
	public function activity_setup()
    {
        return $this->hasMany('App\Activity_Setup');
    }
	
}
