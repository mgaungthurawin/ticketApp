<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Location;
use Flash;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if ($request->get('name')) {
        //     $locations = Location::WHERE('name', $request->name)->first();
        //     if (empty($locations)) {
        //         Flash::error('location not found');
        //         return redirect(route('location.index'));
        //     }

        //     return view('admin.location.index', compact('locations'));
        // }

        $locations = Location::orderby('id', 'DESC')->paginate(15);
        return view('admin.location.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Location::create($request->all());
        Flash::success('Successfully save the location.');
        return redirect(route('location.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $location = Location::find($id);
        if (empty($location)) {
            Flash::error('location not found');
            return redirect(route('location.index'));
        }

        return view('admin.location.show', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = Location::find($id);
        if (empty($location)) {
            Flash::error('location not found');
            return redirect(route('location.index'));
        }

        return view('admin.location.edit', compact('location'));
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
        Location::find($id)->update($request->all());
        Flash::success('Successfully update the location');
        return redirect(route('location.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Location::find($id)->delete();
        Flash::success('successfully delete the location');
        return redirect(route('location.index'));
    }
}





