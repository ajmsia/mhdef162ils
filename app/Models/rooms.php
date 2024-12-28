<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class rooms extends Model
{
    use SoftDeletes;

    protected $fillable = 
        ['roomName', 'roomCapacity'];

}
