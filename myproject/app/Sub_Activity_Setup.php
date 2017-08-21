<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Sub_Activity_Setup extends Model
{
    //
    use SoftDeletes;
    //
    protected $table = 'tblsubactivitysetup';
 	protected $dates = ['deleted_at'];
	
 	public function actsetup()
    {
    	return $this->belongsTo(Activity_Setup::class);
    }

}
