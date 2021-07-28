<header>
    <nav>
        <a href="{{ action('EshopController@index')}}" @if ($current=='Home' ) class="current" @endif>Home</a>
        <a href="{{ action('BookshopController@index')}}" @if ($current=='Bookshop' ) class="current" @endif>Bookshop</a>
        <a href="{{ action('AuthorController@index')}}" @if ($current=='Authors' ) class="current" @endif>Authors</a>

    </nav>
</header>