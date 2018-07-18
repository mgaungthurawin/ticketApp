<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seat;
use App\Models\Bus;
use Flash;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seats = Seat::with(['buses'])->orderby('id', 'DESC')->paginate(15);
        return view('admin.seat.index', compact('seats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buses = Bus::all();
        return view('admin.seat.create', compact('buses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request->all();
        // $count = $data['seat_no'];
        // $allowcount = $data['allow'];
        // $arr = string2array($allowcount);

        // for ($i=1; $i <= $count; $i++) { 
        //     if (in_array($i, $arr)) {
        //         $status = 1;
        //     } else {
        //         $status = 0;
        //     }

        //     $insert[] = [
        //         'bus_id' => $data['bus_id'],
        //         'seat_no' => $i,
        //         'allow' => $data['allow'],
        //         'price' => $data['price'],
        //         'status' => $status
        //     ];
        // }

        Seat::create($request->all());
        Flash::success('Successfully save the seat.');
        return redirect(route('seat.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seat = Seat::with('buses')->find($id);
        if (empty($seat)) {
            Flash::error('seat not found');
            return redirect(route('seat.index'));
        }

        return view('admin.seat.show', compact('seat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seat = Seat::find($id);
        $buses = Bus::all();
        if (empty($seat)) {
            Flash::error('seat not found');
            return redirect(route('seat.index'));
        }

        return view('admin.seat.edit', compact('seat', 'buses'));
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
        Seat::find($id)->update($request->all());
        Flash::success('Successfully update the seat.');
        return redirect(route('seat.index'));   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Seat::find($id)->delete();
        Flash::success('successfully delete the seat');
        return redirect(route('seat.index'));
    }
}



