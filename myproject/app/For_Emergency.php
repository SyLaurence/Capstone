<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class For_Emergency extends Model
{
    
    protected $table = 'tblforemergency';

    public function Personal_Info_FEM()
    {
    	return $this->belongsTo(Personal_Info::class);
    }

}
