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
                <div class="row" style="padding-left: 20px">
                    <div class="form-group">
                        {!! Form::label('id', 'Id:') !!}
                        <p>{!! $seat->id !!}</p>
                    </div>

                    <div class="form-group">
                        {!! Form::label('seat_count', 'Seat Count:') !!}
                        <p>{!! $seat->seat_count !!} </p>
                    </div>

                    <?php
                        foreach ($seat->buses as $key => $bus) {
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
                            {!! Form::label('model', 'Bus Model:') !!}
                                <p>{!! $bus->model !!}</p>
                            </div>

                            <div class="form-group">
                            {!! Form::label('tour', 'Tour:') !!}
                                <p>{!! implode(",", $arr) !!}</p>
                            </div>
                    <?php   }
                        $seatArr = explode(",", $seat->allow_seat);
                        for ($i=0; $i < count($seatArr) ; $i++) { 
                            ?>
                            <div class="form-group col-sm-3">
                                <button type="button" class="btn btn-default btn-lg">
                                    {{ $seatArr[$i] }}
                                </button>
                            </div>
                    <?php    }

                    ?>



                    <a href="{!! route('seat.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection