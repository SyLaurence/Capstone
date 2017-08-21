<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_Activity extends Model
{
    protected $table = 'tblsubactivity';	
    public function actsetup()
    {
    	return $this->belongsTo(Activity_Setup::class);
    }

    public function act()
    {
    	return $this->belongsTo(Activity::class);
    }
}
