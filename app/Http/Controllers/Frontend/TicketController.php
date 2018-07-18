<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Bus;
use App\Models\Seat;
use DB;


class TicketController extends Controller
{
    public function index() {
    	$locations = Location::all();
    	return view('home', compact('locations'));
    }

    public function searchbus(Request $request) {
    	$data = $request->all();
    	$locationArr = [$data['from'], $data['to']];
    	$location = $data['from'] . "," . $data['to'];
    	$data['depature'] = convertDate($data['depature']);
    	$data['arrival'] = convertDate($data['arrival']);

        $directions = Location::wherein('id', $locationArr)->get();
        foreach ($directions as $key => $direction) {
            $loc[] = $direction->name;
        }

        $buses = Bus::join('schedules', 'schedules.bus_id', 'buses.id')
                ->where('schedules.depature', '>', $data['depature'])
                ->where('buses.location', 'like', '%'. $location . '%')->paginate(10);
        return view('buslist', compact('buses', 'loc'));

    }

    public function viewseat($bus_id) {
        $bus = Bus::with('seat')->where('id', $bus_id)->first();
        $allow = $bus->seat['allow'];
        $allowArr = string2array($allow);
        return view('seatlist', compact('bus', 'allowArr'));
    }



}




