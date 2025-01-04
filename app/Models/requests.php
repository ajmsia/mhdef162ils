<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class requests extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'requestID', 'userFirstName', 'userLastName', 'userMiddleName', 'upmail', 'college', 'userType', 'tuklaslink' 'requestDate', 'requestTime', 'purpose'
    ];

    protected $casts = [
        'requestDate' => 'date',
        'requestTime' => 'datetime'
    ]

}
