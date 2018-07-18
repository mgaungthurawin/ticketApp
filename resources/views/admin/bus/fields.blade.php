<div class="form-group col-sm-6">
    {!! Form::label('no', 'Bus No:') !!} <span class="text-danger">*</span>
    {!! Form::text('no', null, ['class' => 'form-control']) !!}
    @if ($errors->has('no'))
        <span class="text-danger">
            <strong>{{ $errors->first('no') }}</strong>
        </span>
    @endif
</div>

<div class="form-group col-sm-6">
    {!! Form::label('type', 'Bus Type:') !!} <span class="text-danger">*</span>
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
    @if ($errors->has('type'))
        <span class="text-danger">
            <strong>{{ $errors->first('type') }}</strong>
        </span>
    @endif
</div>

<div class="form-group col-sm-6">
    {!! Form::label('model', 'Bus Model:') !!} <span class="text-danger">*</span>
    {!! Form::text('model', null, ['class' => 'form-control']) !!}
    @if ($errors->has('model'))
        <span class="text-danger">
            <strong>{{ $errors->first('model') }}</strong>
        </span>
    @endif
</div>