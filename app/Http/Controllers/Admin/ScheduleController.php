<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Bus;
use Flash;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::with(['buses'])->orderby('id', 'DESC')->paginate(15);
        return view('admin.schedule.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buses = Bus::all();
        return view('admin.schedule.create', compact('buses'));
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
        $depature = getDateTime($data['depature']);
        $data['depature_date'] = $depature['date'];
        $data['depature_time'] = $depature['time'];
        $arrival = getDateTime($data['arrival']);
        $data['arrival_date'] = $arrival['date'];
        $data['arrival_time'] = $arrival['time'];

        $data['depature'] = convertDate($depature['date']);
        $data['arrival'] = convertDate($arrival['date']);

        Schedule::create($data);
        Flash::success('Successfully save the schedule.');
        return redirect(route('schedule.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $schedule = Schedule::with('buses')->find($id);
        if (empty($schedule)) {
            Flash::error('schedule not found');
            return redirect(route('schedule.index'));
        }

        return view('admin.schedule.show', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = Schedule::find($id);
        $buses = Bus::all();
        if (empty($schedule)) {
            Flash::error('schedule not found');
            return redirect(route('schedule.index'));
        }

        return view('admin.schedule.edit', compact('schedule', 'buses'));
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
        $depature = getDateTime($data['depature']);
        $data['depature_date'] = $depature['date'];
        $data['depature_time'] = $depature['time'];
        $arrival = getDateTime($data['arrival']);
        $data['arrival_date'] = $arrival['date'];
        $data['arrival_time'] = $arrival['time'];

        $data['depature'] = convertDate($depature['date']);
        $data['arrival'] = convertDate($arrival['date']);

        Schedule::find($id)->update($data);
        Flash::success('Successfully update the schedule.');
        return redirect(route('schedule.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Schedule::find($id)->delete();
        Flash::success('successfully delete the schedule');
        return redirect(route('schedule.index'));
    }
}



