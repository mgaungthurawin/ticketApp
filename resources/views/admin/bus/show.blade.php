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
                <div class="row" style="padding-left: 20px">
                    <!-- Id Field -->
                    <div class="form-group">
                        {!! Form::label('id', 'Id:') !!}
                        <p>{!! $bus->id !!}</p>
                    </div>

                    <!-- Pub Name Field -->
                    <div class="form-group">
                        {!! Form::label('no', 'Bus No:') !!}
                        <p>{!! $bus->no !!}</p>
                    </div>

                    <!-- Pub Name Field -->
                    <div class="form-group">
                        {!! Form::label('no', 'Bus Type:') !!}
                        <p>{!! $bus->type !!}</p>
                    </div>

                    <!-- Pub Name Field -->
                    <div class="form-group">
                        {!! Form::label('no', 'Bus Model:') !!}
                        <p>{!! $bus->model !!}</p>
                    </div>

                    <!-- Pub Name Field -->
                    <div class="form-group">
                        {!! Form::label('no', 'Tour:') !!}
                        <p>
                        <?php
                            $locations = App\Models\Location::wherein('id', $bus->location)->select('name')->get()->toArray();
                            foreach ($locations as $key => $location) {
                                $arr[] = $location['name'];
                            }
                            echo implode(",", $arr);
                        ?>
                        </p>
                    </div>

                    <a href="{!! route('bus.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection