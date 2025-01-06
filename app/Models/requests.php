<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class requests extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'requestID'; // laravel expects that the default column name for our primary key is 'id'. but since I changed it to 'requestID', it should be able to recognize the requestID primary key!

    // Define the fillable columns (only once)
    protected $fillable = [
        'userFirstName', 'userLastName', 'userMiddleName', 'upmail', 'college', 
        'userType', 'title', 'resourceType', 'tuklasLink', 'requestDate', 'status'
    ];

    protected $casts = [
        'requestDate' => 'date', // Cast requestDate to date
    ];

    use HasFactory;

    // Explicitly define the table name since it's plural
    protected $table = 'requests';  // Specify the table name
}
