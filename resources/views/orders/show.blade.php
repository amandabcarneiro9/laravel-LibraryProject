@extends('layouts.main', ['title' => 'orders'])

@section('content')
<h2>Orders</h2>
<a href="{{ action('BookController@index') }}">Back to index of books</a><br>

<table class="table table-striped">
    <tr>
        <th>Book:</th>
        <th>User:</th>
        <th>quantity:</th>
    </tr>


    @foreach($orders as $order)
    <tr>
        <td>{{ $order->book->title }}</td>
        <td>{{ $order->user->name }}</td>
        <td>{{ $order->quantity }}</td>
    </tr>

    @endforeach
</table>

@endsection