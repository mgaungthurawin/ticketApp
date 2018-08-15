<?php

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