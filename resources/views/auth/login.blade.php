@extends('layouts.auth')

@section('content')

<form class="form-auth" method="POST" action="{{route('auth.login')}}">
    @csrf
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

    <div class="form-group">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email address" required="" autofocus="" value="{{ old('email') }}">
        @if ($errors->has('email'))
            <span class="invalid-feedback">
                {{ $errors->first('email') }}
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Password" required="" value="{{ old('password') }}">
        @if ($errors->has('password'))
            <span class="invalid-feedback">
                {{ $errors->first('password') }}
            </span>
        @endif
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <a class="btn btn-lg btn-secondary btn-block" href="{{route('auth.showRegistrationForm')}}">Register</a>
</form>

@endsection
