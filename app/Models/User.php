<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Base
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'] ;
}
