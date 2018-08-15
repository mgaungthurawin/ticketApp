<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Bus;
use App\Models\Seat;
use App\Models\Booking;
use DB;
use Session;


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
                ->join('seats', 'seats.bus_id', 'buses.id')
                ->where('seats.status', 1)
                ->where('schedules.depature', '>', $data['depature'])
                ->where('buses.location', 'like', '%'. $location . '%')
                ->select('buses.id as id', 'schedules.depature_date as depature_date', 'schedules.depature_time as depature_time', 'seats.price', 'buses.model', 'buses.type', 'schedules.arrival_date', 'schedules.arrival_time')
                ->paginate(10);
        return view('buslist', compact('buses', 'loc'));

    }

    public function viewseat($bus_id) {
        $bus = Bus::with('seat')->where('id', $bus_id)->first();
        $books = Booking::join('buses', 'buses.id', 'bookings.bus_id')
                    ->join('seats', 'seats.bus_id', 'buses.id')
                    ->where('bookings.bus_id', $bus_id)
                    ->where('seats.status', 1)
                    ->select('bookings.seat_prefix')
                    ->get();
        $allow = $bus->seat['allow'];
        $allowArr = string2array($allow);
        $bookArr = [];
        foreach ($books as $key => $book) {
            $bookArr[] = $book->seat_prefix;
        }
        Session::put('bus_id', $bus->id);
        $booking = implode(",", $bookArr);
        Session::put('booking', $booking);
        return view('seatlist', compact('bus', 'allowArr', 'bookArr'));
    }



}




