@extends ('layouts.main',[
'title' => 'Reservations'
])


@section('content')


<h2>Reservations</h2>
<table class="table table-striped">
    <tr>
        <th>Book</th>
        <th>User</th>
        <th>From</th>
        <th>To</th>
    </tr>

    @foreach($reservations as $reservation)
    <tr>
        <td>{{$reservation->book->title}}</td>
        <td>{{$reservation->user_id}}</td>
        <td>{{$reservation->from}}</td>
        <td>{{$reservation->to}}</td>
    </tr>
    @endforeach
</table><br>

<a href="{{ action('ReservationController@create') }}">Make a reservation</a><br>


@endsection