@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" href="{!! route('seat.create') !!}">Add New</a>
        </h1>
        <div class="row">
        </div>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('admin.seat.table')
            </div>
            <div class="pull-right">{{ $seats->render() }}</div>
        </div>
    </div>
@endsection