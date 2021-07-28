@extends('layouts.main', [
'title' => 'Create a bookshop form'
])

@section('content')

<h1>Create a new bookshop</h1>

<form action="{{ action('BookshopController@save') }}" method="POST">
    @csrf

    @component('components.form-group', [
    'label' => 'Name',
    'name' => 'name'
    ])

    <input type="text" name="name" value="">

    @endcomponent

    @component('components.form-group', [
    'label' => 'City',
    'name' => 'city'
    ])

    <input type="text" name="city" value="">

    @endcomponent

    @component('components.form-group', ['label' => 'Description', 'name' => 'description'])

    <textarea name="description" id="" cols="30" rows="10"></textarea>

    @endcomponent


    <input type="submit" value="Save bookshop">


</form>

@endsection