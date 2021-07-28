@extends ('layouts.main',[
'title' => 'Edit author'
])


@section('content')

<h2>Edit author: {{$author->name}}</h2>

<form action="{{ action('AuthorController@update',[$author->id])}}" method="post">
    @csrf
    @method('put')

    @component('components.form-group',[
    'label' => 'Name',
    'name' => 'name'
    ])
    <input type="text" name="name" value="{{old('name',$author->name)}}">
    @endcomponent

    @component('components.form-group',[
    'label' => 'Biography',
    'name' => 'bio'
    ])
    <textarea name="bio" cols="30" rows="10">{{old('name',$author->bio)}}</textarea>
    @endcomponent


    <div>
        <input type="submit" value="update">
    </div>


</form>

@endsection