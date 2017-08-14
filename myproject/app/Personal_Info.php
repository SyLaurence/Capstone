<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal_Info extends Model
{
    
    protected $table = 'tblpersonalinfo';

    public function referer()
    {
    	return $this->hasMany(Referer::class);
    }
}
