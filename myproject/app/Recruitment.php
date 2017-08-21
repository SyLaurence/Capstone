<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    
    protected $table = 'tblrecruitment';

    public function stage()
    {
    	return $this->hasMany(Stage::class);
    }
}
