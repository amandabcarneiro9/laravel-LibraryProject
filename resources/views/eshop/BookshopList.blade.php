@extends('layouts.main',[
'title' => 'list of bookshop',
'current_menu_item' => 'Bookshop'
])

@section('content')

<h1>List of bookshop</h1>

@foreach($bookshops as $bookshop)
<ul>
    <li>{{$bookshop->name}}</li>
    <li>{{$bookshop->city}}</li>
</ul>
@endforeach

<a href="{{action('BookshopController@create')}}">Create a new bookshop</a>

@endsection