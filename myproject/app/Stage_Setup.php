<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Stage_Setup extends Model
{

    public function actsetup()
    {
        return $this->hasMany(Activity_Setup::class);
    }

    public function stgsetup()
    {
        return $this->hasMany(Stage::class);
    }


    //
    use SoftDeletes;
    //
    protected $table = 'tblstagesetup';

 	protected $dates = ['deleted_at'];
	
	
}
