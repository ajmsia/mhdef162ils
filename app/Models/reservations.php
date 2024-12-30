<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class reservations extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'userFirstName', 
        'userLastName', 
        'userMiddleName', 
        'upmail', 
        'college', 
        'userType', 
        'roomID', 
        'reserveDate', 
        'reserveTime', 
        'purpose',
    ];

    protected $casts = [
        'reserveDate' => 'date',
        'reserveTime' => 'datetime',
    ];

    // for connecting Rooms and Reservation so that in reservation it displays room info //
    public function rooms()
    {
        return $this->belongsTo(Rooms::class, 'roomid', 'id');
    }
}

