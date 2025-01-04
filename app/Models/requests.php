<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class requests extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'requestID', 'userFirstName', 'userLastName', 'userMiddleName', 'upmail', 'college', 'userType', 'title', 'resourceType', 'tuklasLink', 'requestDate'
    ];

    protected $casts = [
        'requestDate' => 'date',
    ];

    }
