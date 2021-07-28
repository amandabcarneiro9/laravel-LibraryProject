@extends('layouts.main',[
'title' =>'Category :' . $category->name
])


@section('content')

<h1>Category: {{$category->name}}</h1>
<a href="{{action('EshopController@index')}}">Back to books</a>

<section>
    <h2>Subcategories</h2>

    @foreach($category->subcategories as $subcategory)
    <ul>
        <li><a href="{{action('EshopController@subcategory',[$subcategory->id])}}">{{$subcategory->name}}</a></li>
    </ul>
    @endforeach
</section>

@include('eshop/books',['books' => $category->books])

@endsection