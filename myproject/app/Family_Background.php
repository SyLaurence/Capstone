<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family_Background extends Model
{
    
    protected $table = 'tblfambackground';

    public function Personal_Info_FAM()
    {
    	return $this->belongsTo(Personal_Info::class);
    }
	
}
