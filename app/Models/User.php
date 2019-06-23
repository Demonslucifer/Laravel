<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Base
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'] ;

    public function getImageAttribute()
    {
        $img = $this->attributes['images'];
        return !empty($img)?$img:'/uploads/nameijiang.jpg';
    }
}
