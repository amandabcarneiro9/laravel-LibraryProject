@foreach ($errors->all() as $error)
<div class="error">{{ $error }}</div>
@endforeach

<form action="{{ route('register') }}" method="post">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" value="{{ old('name') }}"><br>

    <label for="name">email:</label>
    <input type="email" name="email" value="{{ old('email') }}"><br>

    <label for="name">Password:</label>
    <input type="password" name="password" value=""><br>

    <label for="name">Password confirmation:</label>
    <input type="password" name="password_confirmation" value="">

    <button>Register</button>

</form>