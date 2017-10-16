<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContractRecord extends Model
{
    public function hireddriver(){
    	return $this->belongsTo('App\HiredDriver');
    }
}
