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
                   {!! Form::model($bus, ['route' => ['bus.update', $bus->id], 'method' => 'patch']) !!}

                        @include('admin.bus.fields')

                        <div class="form-group col-sm-6">
                            {!! Form::label('location', 'Location') !!}
                            <div id="loc"></div>
                            <a href="#" id="add_location" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-plus"></i></a>

                            <a href="#" id="remove_location" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-minus"></i></a>
                        </div>

                        <input type="hidden" id="location_collection" name="location_collection" value="{{$locations}}">

                        <input type="hidden" id="location_selected" name="location_selected" value="{{$selected}}">

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