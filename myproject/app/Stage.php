<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    //
    use SoftDeletes;
    //
    protected $table = 'tblstage';

    public function stagesetup()
    {
    	return $this->belongsTo(Stage_Setup::class);
    }

    public function act()
    {
    	return $this->hasMany(Activity::class);
    }

    public function recruitment()
    {
    	return $this->belongsTo(Recruitment::class);
    }
}
