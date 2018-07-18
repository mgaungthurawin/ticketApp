<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'bus_id', 'period', 'depature' ,'depature_date', 'depature_time', 'arrival' ,'arrival_date', 'arrival_time',
    ];

    public function buses() {
    	return $this->hasMany('App\Models\Bus','id');
    }

    public function bus() {
    	return $this->hasOne('App\Models\Bus');
    }
}
