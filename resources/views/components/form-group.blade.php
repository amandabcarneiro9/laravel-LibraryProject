<div class="form-group">
    <label class="form-group__label">{{$label}}</label>
    <div class="form-group__input">
        {!! $slot !!}
    </div>
    @if ($errors->has($name))
    <div class="form-group__errors">
        @foreach ($errors->get($name) as $error)
        <div class="form-group__error">{{ $error }}</div>
        @endforeach
    </div>
    @endif
</div>