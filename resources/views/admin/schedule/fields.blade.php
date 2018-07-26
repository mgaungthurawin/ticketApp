
<div class="form-group col-sm-6">
    {!! Form::label('depature', 'Depature:') !!} <span class="text-danger">*</span>
    <div class='input-group date' id='depature'>
        {!! Form::text('depature', null, ['class' => 'form-control', 'data-datepicker' => 'datepicker']) !!}
        <!-- <input type='text' name="depature" class="form-control" /> -->
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('arrival', 'Arrival:') !!} <span class="text-danger">*</span>
    <div class='input-group date' id='arrival'>
        <!-- <input type='text' name="arrival" class="form-control" /> -->
        {!! Form::text('arrival', null, ['class' => 'form-control','data-datepicker' => 'datepicker']) !!}
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