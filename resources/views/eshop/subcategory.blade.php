@extends('layouts.main',[
'title' =>'Subcategories' .$subcategory->name
])

@section('content')

<h1>Subcategory: {{$subcategory->name}}</h1>
<a href="{{action('EshopController@category',$subcategory->category_id)}}">Back to category</a>

@include('eshop/books',['books' =>$books])

@endsection