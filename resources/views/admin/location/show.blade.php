@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Location
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    <!-- Id Field -->
                    <div class="form-group">
                        {!! Form::label('id', 'Id:') !!}
                        <p>{!! $location->id !!}</p>
                    </div>

                    <!-- Pub Name Field -->
                    <div class="form-group">
                        {!! Form::label('name', 'Location Name:') !!}
                        <p>{!! $location->name !!}</p>
                    </div>
                    <a href="{!! route('location.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection