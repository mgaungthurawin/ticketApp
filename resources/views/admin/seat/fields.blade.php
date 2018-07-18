
<div class="form-group col-sm-3">
    {!! Form::label('seat_no', 'Seat No:') !!} <span class="text-danger">*</span>
        {!! Form::number('seat_no', null, ['class' => 'form-control']) !!}
        @if ($errors->has('seat_no'))
            <span class="text-danger">
                <strong>{{ $errors->first('seat_no') }}</strong>
            </span>
        @endif
</div>

<div class="form-group col-sm-3">
    {!! Form::label('price', 'Price:') !!} <span class="text-danger">*</span>
        {!! Form::number('price', null, ['class' => 'form-control']) !!}
    @if ($errors->has('price'))
        <span class="text-danger">
            <strong>{{ $errors->first('price') }}</strong>
        </span>
    @endif
</div>

<div class="form-group col-sm-6">
    {!! Form::label('allow', 'Allow Seat:') !!} <span class="text-danger">*</span>
        {!! Form::text('allow', null, ['class' => 'form-control']) !!}
    @if ($errors->has('allow'))
        <span class="text-danger">
            <strong>{{ $errors->first('allow') }}</strong>
        </span>
    @endif
</div>

<div class="form-group col-sm-6">
    {!! Form::label('allow_seat', 'Seat Status:') !!} <span class="text-danger">*</span>
    <br>
    <div class="btn-group" id="status" data-toggle="buttons">
        <label class="btn btn-default btn-on btn-xs active">
        <input type="radio" value="1" name="status" checked="checked">ON</label>
        <label class="btn btn-default btn-off btn-xs ">
        <input type="radio" value="0" name="status">OFF</label>
    </div>
</div>