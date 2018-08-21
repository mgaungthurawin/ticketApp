<table class="table table-responsive" id="seates-table">
    <thead>
        <th>Bus No</th>
        <th>Seat Count</th>
        <th>Price</th>
        <th>Status</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($seats as $seat)
        <tr>
            <td>
                @foreach ($seat->buses as $key => $bus) 
                    {!! $bus->no !!}
                @endforeach

            </td>
            <td>{!! $seat->seat_no !!}</td>
            <td>{!! $seat->price !!} Ks / 1 Seat</td>
            <td>{!! showPrettyStatus($seat->status) !!}</td>
            <td>
                {!! Form::open(['route' => ['seat.destroy', $seat->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('seat.show', [$seat->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('seat.edit', [$seat->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>