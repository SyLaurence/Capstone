<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education_Background extends Model
{

    protected $table = 'tbleducbackground';

    public function Personal_Info_EDB()
    {
    	return $this->belongsTo(Personal_Info::class);
    }
}
