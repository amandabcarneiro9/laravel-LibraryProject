@extends('layouts.main', ['title' => 'List of books'])

@section('content')
<h2>List of books</h2>
<a href="{{ action('BookController@create') }}">Create new book</a>
@forelse($books as $book)
<div>
    <img src="{{ $book->image }}" alt="{{ $book->title }}">
    <h3>{{ $book->title }}</h3>
    <p>{{ $book->authors }}</p>
    <p>
        <a href="{{ action('BookController@show', [$book->id]) }}">Detail</a>
        <a href="{{ action('BookController@edit', [$book->id]) }}">Edit</a>
    <form method="post" action="{{ action('BookController@destroy', [$book->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    </p>
</div>
@empty
<p>No books created :(</p>
@endforelse


@endsection