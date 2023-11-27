@extends('front.app')

@section('content')
<div class="img-cont">
    <img src="{{asset('img/pitons.png')}}" class="background-image">
    <div class="box">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row mb-3">
                <label for="login" class="col-md-3 col-form-label text-md-end">
                    <i class="fa fa-user" width="24" height="24"></i>

                </label>

                <div class="col-md-6">
                    <input id="login" type="text" placeholder="{{ __('Username or Email') }}" class="form-control{{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}" name="login" value="{{ old('username') ?: old('email') }}" required autofocus>

                    @if ($errors->has('username') || $errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="row mb-3">
                <label for="password" class="col-md-3 col-form-label text-md-end">
                    <i class="fa fa-lock"></i>
                </label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder=" {{ __('Password') }}" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6 offset-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-8 offset-md-3">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
@endsection