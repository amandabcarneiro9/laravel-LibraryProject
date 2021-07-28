@extends('layouts.main', ['title' => 'New book'])

@section('content')
<h2>New book</h2>
<a href="{{ action('BookController@index') }}">Back to index of books</a>

<form method="post" action="{{ action('BookController@store') }}">
    @csrf

    <div class="form-group">
        <label for="">Title</label>
        <input type="text" name="title">
    </div>

    <div class="form-group">
        <label for="">Authors</label>
        <input type="text" name="authors">
    </div>

    <div class="form-group">
        <label for="">Image</label>
        <input type="text" name="image">
    </div>

    <div class="form-group form-group--submit">
        <input type="submit" value="Create">
    </div>


</form>
@endsection