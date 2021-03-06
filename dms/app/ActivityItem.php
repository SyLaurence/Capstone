<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityItem extends Model
{
    public $timestamps = false;

    public function activity(){
    	return $this->belongsTo('App\Activity');
    }

    public function item(){
    	return $this->belongsTo('App\Item');
    }
}
