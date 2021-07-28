@extends ('layouts.main',[
'title' => $publisher->title
])

@section('content')

<ul>

    @foreach($publishers as $publisher)
    <li>{{$publisher->title}}</li>
    <a href="{{action('PublisherController@show',$publisher->id)}}">More details</a>

    @endforeach
</ul>

@endsection