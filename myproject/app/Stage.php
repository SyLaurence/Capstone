<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    //
    use SoftDeletes;
    //
    protected $table = 'tblstage';
}
