<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class consultations extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'fullname', 
        'nickname',
        'mail', 
        'contact', 
        'reserveDate', 
        'reserveTime', 
        'purpose',
        'status'
    ];

    protected $casts = [
        'reserveDate' => 'date',
        'reserveTime' => 'datetime',
    ];
}
