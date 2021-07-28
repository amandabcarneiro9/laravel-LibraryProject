<section>

    @foreach($books as $book)
    <h3>{{$book->title}}</h3>
    <span>{{$book->authors}}</span><br>
    <img src="{{$book->image}}" alt="{{$book->title}}"><br>
    <a href="{{action('EshopController@show',$book->id)}}">Details of book</a>
    @endforeach

</section>