<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $fillable = [
        'bus_id', 'seat_no', 'allow', 'price', 'status',
    ];

    public function buses() {
    	return $this->hasMany('App\Models\Bus','id');
    }

    public function bus() {
    	return $this->belongsTo('App\Models\Bus','id');
    }
}
