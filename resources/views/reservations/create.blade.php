@extends ('layouts.main',[
'title' => 'Make a reservation'
])


@section('content')

<h2>Make a reservation</h2>

<form action="{{ action('ReservationController@store') }}" method="post">
    @csrf
    <select name="book_id">
        @foreach($books as $book)
        <option value="{{ $book->id }}" {{intval(old('book_id')) === $book->id ? ' selected' : ''}}>{{ $book->title }}</option>
        @endforeach
    </select>
    <label for="from">From:</label>
    <input type="date" name="from" value="{{old('from')}}" />
    <label for="to">To:</label>
    <input type="date" name="to" value="{{old('to')}}" />
    <input type="submit" name="reserve" value="reserve">
</form> <br>

<a href="{{ action('ReservationController@index') }}">Back to reservations</a>

@endsection