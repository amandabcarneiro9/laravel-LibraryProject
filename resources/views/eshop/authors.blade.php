@extends('layouts.main',[
'title' =>'List of authors',
'current_menu_item' => 'Authors'
])
<!-- makes this file avaliable in others files -->

@section('content')\


@foreach($authors as $author)
<li>{{$author->name}}</li>

@endforeach

@endsection




<!-- @section('menu')

<nav>
    <a href="#">Books</a>
    <a href="#">Authors</a>
</nav>

@endsection -->