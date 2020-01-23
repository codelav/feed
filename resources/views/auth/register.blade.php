@extends('layouts.auth')

@section('content')
    <form class="form-auth {{$errors->any() ? 'was-validated' : ''}}" method="POST" action="{{route('auth.register')}}">
        @csrf
        <h1 class="h3 mb-3 font-weight-normal">Registration</h1>

        <div class="form-group">
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required="" value="{{old('email')}}" {{ $errors->has('email') ? ':invalid' : '' }}>
            @if ($errors->has('email'))
                <span class="invalid-feedback">
                    {{ $errors->first('email') }}
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' was-validated' : '' }}">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="" {{ $errors->has('password') ? ':invalid' : '' }} value="{{old('password')}}">
            @if ($errors->has('password'))
                <span class="invalid-feedback">
                    {{ $errors->first('password') }}
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' was-validated' : '' }}">
            <label for="inputPasswordConfirm" class="sr-only">Confirm Password</label>
            <input type="password" name="password_confirmation" id="inputPasswordConfirm" class="form-control" placeholder="Confirm Password" required="" {{ $errors->has('password_confirmation') ? ':invalid' : '' }} value="{{old('password_confirmation')}}">
            @if ($errors->has('password_confirmation'))
                <span class="invalid-feedback">
                    {{ $errors->first('password_confirmation') }}
                </span>
            @endif
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
    </form>

@endsection

@section('bottom_js')
    {!! JsValidator::formRequest('App\Http\Requests\RegisterRequest') !!}
@endsection
