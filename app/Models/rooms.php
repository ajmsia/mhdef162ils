<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class rooms extends Model
{
    use SoftDeletes;

    protected $fillable = ['roomName', 'roomCapacity', 'image'];


    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'roomid', 'id');
    }

    public function isAvailable($date, $time)
    {
        return !$this->reservations()
            ->where('reserveDate', $date)
            ->where('reserveTime', $time)
            ->exists();
    }
        
}
