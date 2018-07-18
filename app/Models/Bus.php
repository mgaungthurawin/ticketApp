<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $fillable = [
        'no', 'type', 'model', 'location'
    ];

    protected $casts = [
        'location' => 'array',
	];

	public function schedules() {
	  return $this->belongsTo('App\Models\Schedule','bus_id');
	}

	public function seats() {
		return $this->belongsTo('App\Models\Seat','bus_id');
	}

	public function seat() {
		// return $this->hasMany('App\Models\Seat','id');
		return $this->hasOne('App\Models\Seat', 'bus_id');
	}

}
