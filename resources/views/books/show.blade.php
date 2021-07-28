@extends('layouts.main', ['title' => $book->title])

@section('content')
<h2>{{ $book->title }}</h2>
<a href="{{ action('BookController@index') }}">Back to index of books</a><br>
<img src="{{ $book->image }}" alt="{{ $book->title }}">
<h3>{{ $book->title }}</h3>
<p>{{ $book->authors }}</p>
<p>Published by: {{ $book->publisher->title }}</p>

<h3>Order</h3>
@if ($user)
<div class="form-group">
    <form action="{{ route('create-order') }}" method="POST">
        @csrf
        <input type="hidden" name="book_id" value="{{$book->id}}">
        <input type="hidden" name="user_id" value="{{Auth::user()}}">
        <label for="quantity">Quantity:</label><br>
        <input type="number" name="quantity" min="0" max="10" value="{{old('quantity')}}">
        <input type="submit" name="order" value="Order">
    </form>
</div>
@endif


<div class="reviews">
    <h3>Reviews</h3>

    @foreach($book->reviews as $review)
    <p>Review:{{$review->review}}</p>
    <span>Rating: {{$review->rating}}</span>

    @can('admin')
    <form method="post" action="{{ route('destroy-review', [$review->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete a review</button>
    </form>
    </p>
    @endcan

    @endforeach
</div>

@auth
<div class="form-group">
    <form action="{{ route('create-review', $book->id) }}" method="POST">
        @csrf
        <label for="review">Review:</label><br>
        <textarea name="review" id="review" cols="30" rows="10">{{old('review')}}</textarea><br>
        <label for="rating">Rating (between 0 and 100):</label>
        <input type="number" id="rating" name="rating" min="0" max="100" value="{{old('rating')}}"><br>
        <input type="submit" name="submit">
    </form>
</div>

@endauth



<a href="{{ action('BookController@edit', [$book->id]) }}">Edit</a>
<form method="post" action="{{ action('BookController@destroy', [$book->id]) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Delete the book</button>
</form>
</p>


@endsection