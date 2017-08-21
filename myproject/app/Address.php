<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'tbladdress';

    public function Personal_Info_ADD()
    {
    	return $this->belongsTo(Personal_Info::class);
    }
}
