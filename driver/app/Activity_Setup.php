<?php
namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Activity_Setup extends Model
{
    //
    use SoftDeletes;
    //
    protected $table = 'activity_setup';

 	protected $dates = ['deleted_at'];
	
    public function stage_setup()
    {
        return $this->belongsTo('App\Stage_Setup');
    }

}
