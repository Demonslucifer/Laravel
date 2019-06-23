<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tags\Btn;

class Base extends Model
{
    use Btn;
    protected $guarded = [];
}
