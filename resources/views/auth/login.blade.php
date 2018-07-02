@extends('layouts.app')

@section('content')
<div class="container border-top-green no-padding-top mt-3 no-padding-left-right no-padding-bottom shadow-lg" style="border-top-right-radius: 20px; border-top-left-radius: 20px">
    <div class="row justify-content-center">
        <div class="col-md-12 no-padding-left-right">
            <div class="card no-border-radius card-no-border background-light-green ">
                <div class="card-header no-border-radius  background-green white-text text-18">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right text-20 green-text">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"  style="font-size: 1.5rem" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-20 text-md-right green-text ">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" style="font-size: 1.5rem" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div>
                                    <label>
                                        <input type="checkbox" class="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-green text-20">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link green-text animate-bottom-nocontent" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
