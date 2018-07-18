<table class="table table-responsive" id="buses-table">
    <thead>
        <th>Bus No</th>
        <th>Bus Type</th>
        <th>Bus Model</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($buses as $bus)
        <tr>
            <td>{!! $bus->no !!}</td>
            <td>{!! $bus->type !!}</td>
            <td>{!! $bus->model !!}</td>
            <td>
                {!! Form::open(['route' => ['bus.destroy', $bus->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('bus.show', [$bus->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('bus.edit', [$bus->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>