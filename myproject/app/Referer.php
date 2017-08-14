<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referer extends Model
{

    protected $table = 'tblreferer';

    public function Personal_Info_Ref()
    {
    	return $this->belongsTo(Personal_Info::class);
    }
}
