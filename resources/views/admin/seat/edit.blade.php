@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Seat
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">

            <div class="box-body">
            
                <div class="row">
                {!! Form::model($seat, ['route' => ['seat.update', $seat->id], 'method' => 'patch']) !!}

                    <div class="form-group col-sm-6">
                        {!! Form::label('bus', 'Bus') !!}
                        <select id="bus_id" name="bus_id" class="form-control">
                            @foreach ($buses as $bus)
                                <option value="{{ $bus->id }}">{{ $bus->no}}</option>
                            @endforeach
                        </select>
                    </div>

                    @include('admin.seat.fields')

                    <div class="form-group col-sm-12">
                       {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                       <a href="{!! route('seat.index') !!}" class="btn btn-default">Cancel</a>
                    </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection