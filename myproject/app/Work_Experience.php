<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work_Experience extends Model
{
    //
    protected $table = 'tblworkexperience';

    public function Personal_Info_WXP()
    {
    	return $this->belongsTo(Personal_Info::class);
    }
	
}
