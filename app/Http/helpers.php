<?php

use App\Models\Schedule;
use Carbon\Carbon;
use App\Models\Booking;

function getDateTime($datetime) {
	$dateArr = explode(" ", $datetime);
	$data = $dateArr[0];
	$time = $dateArr[1] ." ". $dateArr[2];
	return ['date' => $data, 'time' => $time];
}

function convertDate($date) {
	$newDate = date("Y-m-d", strtotime($date));
	return $newDate;
}

function showPrettyStatus($status)
{
    switch ($status) {
        case 1:
            return '<i class="fa fa-check-circle text-green"></i>';
            break;
        case 0:
            return '<i class="fa fa-times-circle-o text-red"></i>';
            break;
    }
}

function array2string($array) {
    $string = implode(",", $array);
    return $string;
}

function string2array($string) {
    $arr = explode(",", $string);
    return $arr;
}

function thura(&$arr) {
    $key = key($arr);
    $result = ($key === null) ? false : [$key, current($arr), 'key' => $key, 'value' => current($arr)];
    next($arr);
    return $result;
}

function killdate($bus_id) {
    $row = Schedule::where('bus_id', $bus_id)->first();
    $depdate = $row->depature;
    $deptime = $row->depature_time;
    $newdeptime = date("H:i:s", strtotime($deptime));
    $depature_date = $depdate .' '.$newdeptime;
    $date = new Carbon($depature_date);
    return $date->subDays(1);
}


function bookingkill() {
    $now = \Carbon\Carbon::now();
    $books = Booking::where('kill_date', '<', $now)->get();
    if($books) {
        foreach ($books as $key => $book) {
            Booking::where('id', $book->id)
                    ->update(['status' => false]);
        }
    }
}








