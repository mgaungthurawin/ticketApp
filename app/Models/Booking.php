<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'customer_id', 'bus_id', 'seat_no', 'seat_prefix',
    ];
}
