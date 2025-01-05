<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class consultations extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'fullname', 
        'mail', 
        'contact', 
        'reserveDate', 
        'reserveTime', 
        'purpose', 
    ];

    protected $casts = [
        'reserveDate' => 'date',
        'reserveTime' => 'datetime',
    ];
}
