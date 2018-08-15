<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Customer;


class BookingController extends Controller
{
    public function index(Request $request) {
    	$bookings = Booking::join('customers', 'customers.id', 'bookings.customer_id')->paginate(10);
    	return view('admin.booking.index', compact('bookings'));
    }
}
