@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
    </section>
    <div class="content">
        <div class="clearfix"></div>
        <div class="clearfix"></div>

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('admin.booking.table')
            </div>
            <div class="pull-right">{{ $bookings->render() }}</div>
        </div>
    </div>
@endsection