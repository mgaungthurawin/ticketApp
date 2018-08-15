<table class="table table-responsive" id="bookings-table">
    <thead>
        <th>Customer Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Seat No</th>
    </thead>
    <tbody>
    @foreach($bookings as $booking)
        <tr>
            <td>{!! $booking->name !!}</td>
            <td>{!! $booking->email !!}</td>
            <td>{!! $booking->phone !!}</td>
            <td>{!! $booking->seat_no !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>