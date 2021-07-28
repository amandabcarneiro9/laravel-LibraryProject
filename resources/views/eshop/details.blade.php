@extends ('layouts.main',[
'title' => $publisher->title
])

@section('content')


<h1>{{$publisher->title}}</h1>

<h2>Published books:</h2>

@foreach($publisher->books as $book)
<h3>{{$book->title}}</h3>
<img src="{{$book->image}}" alt="{{$book->title}}">

@endforeach


@endsection