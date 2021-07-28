@extends('layouts.main', ['title' => 'Edit ' . $book->title])

@section('content')
<h2>Edit {{ $book->title }}</h2>
<a href="{{ action('BookController@index') }}">Back to index of books</a>
<a href="{{ action('BookController@show', [$book->id]) }}">Detail {{ $book->title }}</a>


<form method="post" action="{{ action('BookController@update', [$book->id]) }}">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="">Title</label>
        <input type="text" name="title" value="{{ $book->title }}">
    </div>

    <div class="form-group">
        <label for="">Authors</label>
        <input type="text" name="authors" value="{{ $book->authors }}">
    </div>

    <div class="form-group">
        <label for="">Image</label>
        <input type="text" name="image" value="{{ $book->image }}">
    </div>

    <div>
        <form action="{{ action('BookController@show', [$book->id]) }}" method="POST">
            <label for="review">Review:</label><br>
            <textarea name="review" id="review" cols="30" rows="10"></textarea><br>
            <label for="rating">Rating (between 1 and 5):</label>
            <input type="number" id="rating" name="rating" min="1" max="5"><br>
        </form>

    </div>

    <div class="form-group form-group--submit">
        <input type="submit" value="Create">
    </div>

</form>





@endsection