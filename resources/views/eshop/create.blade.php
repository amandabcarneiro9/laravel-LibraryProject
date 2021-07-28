@extends ('layouts.main',[
'title' => 'Create new author'
])


@section('content')

<h2>Create new author</h2>

<form action="{{ action('AuthorController@store') }}" method="post">
    @csrf

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
        <input type="submit" value="Create">
    </div>


</form>

@endsection