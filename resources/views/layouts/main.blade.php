<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>


<body>

    @include('partials.header',[
    'current' => $current_menu_item ?? null

    ])


    <h1>Bookshop Project</h1>

    <main>
        <!-- it's from extends from section in authors.blade.php file. -->
        @yield('content')

        @include('partials.messages')


    </main>


</body>

</html>