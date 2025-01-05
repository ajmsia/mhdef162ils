<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class requests extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'requestID'; // laravel expects that the default column name for our primary key is 'id'. but since i changed it to 'requestID', it should be able to recognize the requestID primary key!
    protected $fillable = [
        'requestID', 'userFirstName', 'userLastName', 'userMiddleName', 'upmail', 'college', 'userType', 'title', 'resourceType', 'tuklasLink', 'requestDate'
    ];

    protected $casts = [
        'requestDate' => 'date',
    ];

    }
