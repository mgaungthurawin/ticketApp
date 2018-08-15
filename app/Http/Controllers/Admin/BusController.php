<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\Location;
use Flash;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->get('name')) {
            $buses = Bus::WHERE('no', $request->get('name'))->paginate(15);
            if (empty($buses)) {
                Flash::error('bus not found');
                return redirect(route('bus.index'));
            }
            return view('admin.bus.index', compact('buses'));
        }
        $buses = Bus::orderby('id', 'DESC')->paginate(15);
        return view('admin.bus.index', compact('buses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();
        return view('admin.bus.create', compact('locations'));
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
        $data['location'] = array2string($data['location']);
        Bus::create($data);
        Flash::success('Successfully save the bus.');
        return redirect(route('bus.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bus = Bus::find($id);
        if (empty($bus)) {
            Flash::error('Bus not found');
            return redirect(route('bus.index'));
        }

        return view('admin.bus.show', compact('bus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $locations = Location::all();
        $bus = Bus::find($id);
        if (empty($bus)) {
            Flash::error('Bus not found');
            return redirect(route('bus.index'));
        }
        $location = explode(",", $bus->location);
        $selected = Location::wherein('id', $location)->get();

        return view('admin.bus.edit', compact('bus', 'locations', 'selected'));
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
        $data = $request->all();
        $data['location'] = array2string($data['location']);
        Bus::find($id)->update($data);
        Flash::success('Successfully update the bus');
        return redirect(route('bus.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bus::find($id)->delete();
        Flash::success('successfully delete the bus');
        return redirect(route('bus.index'));
    }
}




