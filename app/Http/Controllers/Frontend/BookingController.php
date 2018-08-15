<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Models\Customer;
use App\Models\Booking;
use Alert;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->all();
        Session::put('seatArr',$data['seatArr']);
        $response = [];
        $response['status'] = true;
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $bus_id = Session::get('bus_id');
        $row = Customer::where('email', $data['email'])->first();
        if (empty($row)) {
            $row = Customer::create($request->all());    
        }

        $book = [];
        $seatArr = Session::get('seatArr');
        foreach ($seatArr as $key => $seat) {
            $array = explode(",", $seat);
            $book[] = ['customer_id' => $row->id, 'bus_id' => $bus_id, 'seat_no' => $array[0], 'seat_prefix' => $array[1]];
        }
        Booking::insert($book);
        Alert::success('Successfully booking', 'Yay');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
