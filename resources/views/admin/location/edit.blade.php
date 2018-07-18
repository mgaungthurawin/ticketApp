@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            location
        </h1>
   </section>
   <div class="content">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($location, ['route' => ['location.update', $location->id], 'method' => 'patch']) !!}

                        @include('admin.location.fields')

                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('location.index') !!}" class="btn btn-default">Cancel</a>
                        </div>

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection