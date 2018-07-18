@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Schedule
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    <!-- Id Field -->
                    <div class="form-group">
                        {!! Form::label('id', 'Id:') !!}
                        <p>{!! $schedule->id !!}</p>
                    </div>

                    <!-- Pub Name Field -->
                    <div class="form-group">
                        {!! Form::label('depature', 'Depature:') !!}
                        <p>{!! $schedule->depature_date !!} {!! $schedule->depature_time !!}</p>
                    </div>

                    <!-- Pub Name Field -->
                    <div class="form-group">
                        {!! Form::label('no', 'Arrival:') !!}
                        <p>{!! $schedule->arrival_date !!} {!! $schedule->arrival_time !!}</p>
                    </div>

                        <?php
                            foreach ($schedule->buses as $key => $bus) {
                                $location = string2array($bus->location);
                                $locations = App\Models\Location::wherein('id', $location)->select('name')->get()->toArray();
                                foreach ($locations as $key => $location) {
                                    $arr[] = $location['name'];
                                }?>
                                <div class="form-group">
                                {!! Form::label('no', 'Bus No:') !!}
                                    <p>{!! $bus->no !!}</p>
                                </div>

                                <div class="form-group">
                                {!! Form::label('no', 'Tour:') !!}
                                    <p>{!! implode(",", $arr) !!}</p>
                                </div>
                        <?php   }
                        ?>
                        </p>

                    <a href="{!! route('schedule.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection