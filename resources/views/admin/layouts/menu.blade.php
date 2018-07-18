<li class="{{ Request::is('location*') ? 'active' : '' }}">
    <a href="{!! route('location.index') !!}"><i class="fa fa-edit"></i><span>Location</span></a>
</li>

<li class="{{ Request::is('bus*') ? 'active' : '' }}">
    <a href="{!! route('bus.index') !!}"><i class="fa fa-edit"></i><span>Bus</span></a>
</li>

<li class="{{ Request::is('schedule*') ? 'active' : '' }}">
    <a href="{!! route('schedule.index') !!}"><i class="fa fa-edit"></i><span>Schedule</span></a>
</li>

<li class="{{ Request::is('seat*') ? 'active' : '' }}">
    <a href="{!! route('seat.index') !!}"><i class="fa fa-edit"></i><span>Seat</span></a>
</li>