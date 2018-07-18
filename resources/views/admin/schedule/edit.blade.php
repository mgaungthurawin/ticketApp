@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Bus
        </h1>
   </section>
   <div class="content">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($schedule, ['route' => ['schedule.update', $schedule->id], 'method' => 'patch']) !!}

                        <div class="form-group col-sm-6">
                            {!! Form::label('depature', 'Depature:') !!} <span class="text-danger">*</span>
                            <div class='input-group date' id='depature'>
                                <input type='text' name="depature" class="form-control" value="{{$schedule->depature}}" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            {!! Form::label('arrival', 'Arrival:') !!} <span class="text-danger">*</span>
                            <div class='input-group date' id='arrival'>
                                <input type='text' name="arrival" class="form-control" value="{{ $schedule->arrival}}" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            @if ($errors->has('arrival'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('arrival') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group col-sm-6">
                            {!! Form::label('bus', 'Bus') !!}
                            <select id="bus_id" name="bus_id" class="form-control">
                                @foreach ($buses as $bus)
                                    <option value="{{ $bus->id }}">{{ $bus->no}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-6">
                            {!! Form::label('period', 'Period') !!}
                            <select id="period" name="period" class="form-control">
                                @foreach (config('custom.period') as $period)
                                    <option value="{{ $period }}">{{ $period}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('bus.index') !!}" class="btn btn-default">Cancel</a>
                        </div>

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection