<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professional_Exam extends Model
{
    protected $table = 'tblprofessionalexam';
	
	public function Personal_Info_PXM()
    {
    	return $this->belongsTo(Personal_Info::class);
    }

}
