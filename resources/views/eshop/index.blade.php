@extends('layouts.main',[
'title' =>'Bookshop',
'current_menu_item' => 'Home'
])

@section('content')

<h1>Books eshop</h1>

<section>
    <h2>Categories</h2>

    @foreach($categories as $category)
    <ul>
        <li><a href="{{action('EshopController@category',$category->id)}}">{{$category->name}}</a></li>
    </ul>
    @endforeach
</section>

@include('eshop/books',['books' =>$books])

@endsection