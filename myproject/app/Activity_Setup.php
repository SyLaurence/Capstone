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
	
	public function subactivitysetup()
    {
    	return $this->hasMany(Sub_Activity_Setup::class);
    }

    public function activity()
    {
    	return $this->hasMany(Activity::class);
    }

    public function stagesetup()
    {
    	return $this->belongsTo(Stage_Setup::class);
    }

}
