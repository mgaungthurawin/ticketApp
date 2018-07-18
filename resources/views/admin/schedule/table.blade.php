<table class="table table-responsive" id="schedulees-table">
    <thead>
        <th>Bus No</th>
        <th>Period</th>
        <th>Depature</th>
        <th>Arrival</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($schedules as $schedule)
        <tr>
            <td>
                @foreach ($schedule->buses as $key => $bus) 
                    {!! $bus->no !!}
                @endforeach

            </td>
            <td>{!! $schedule->period !!}</td>
            <td>{!! $schedule->depature_date !!} {!! $schedule->depature_time !!}</td>
            <td>{!! $schedule->arrival_date !!} {!! $schedule->arrival_time !!}</td>
            <td>
                {!! Form::open(['route' => ['schedule.destroy', $schedule->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('schedule.show', [$schedule->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('schedule.edit', [$schedule->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>