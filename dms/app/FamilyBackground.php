<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyBackground extends Model
{
    //
    public $timestamps = false;

    public function personalinfo(){
    	return $this->belongsTo('App\PersonalInfo');
    }
}
