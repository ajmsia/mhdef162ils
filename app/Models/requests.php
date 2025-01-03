<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class requests extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id', 'userFirstName', 'userLastName', 'userMiddleName', 'upmail', 'college', 'userType', 'requestID', 'requestDate', 'requestTime', 'purpose'
    ];

    protected $casts = [
        'requestDate' => 'date',
        'requestTime' => 'datetime'
    ]

}
