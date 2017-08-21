<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{

    protected $table = 'tblactivity';

    public function actsetup()
    {
    	return $this->belongsTo(Activity_Setup::class);
    }

    public function stage()
    {
    	return $this->belongsTo(Stage::class);
    }

    public function subactivity()
    {
    	return $this->hasMany(Sub_Activity::class);
    }

}
