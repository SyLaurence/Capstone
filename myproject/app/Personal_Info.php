<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal_Info extends Model
{
    
    protected $table = 'tblpersonalinfo';

    /*public function referer()
    {
    	return $this->hasMany(Referer::class);
    }

    public function address()
    {
    	return $this->hasMany(Address::class);
    }

    public function educback()
    {
    	return $this->hasMany(Education_Background::class);
    }

    public function famback()
    {
    	return $this->hasMany(Family_Background::class);
    }

    public function profexam()
    {
    	return $this->hasMany(Professional_Exam::class);
    }

    public function workexp()
    {
    	return $this->hasMany(Work_Experience::class);
    }

    public function foremer()
    {
    	return $this->hasMany(For_Emergency::class);
    }*/
}
