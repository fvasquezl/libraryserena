@extends('layouts.login')

@section('content')

    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form class="form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group{{ $errors->has('username') ? ' is-invalid' : '' }} mb-3">
                    <input type="text" name="username" class="form-control"
                           placeholder="{{ __('Username/Email...') }}"
                           value="{{ old('username',null) }}"
                           required autocomplete="username"
                           autofocus
                    >
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </div>
                    </div>
                    @if ($errors->has('username'))
                        <div id="username-error" class="error text-danger pl-3" for="username"
                             style="display: block;">
                            <strong>{{ $errors->first('username') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="input-group{{ $errors->has('password') ? ' is-invalid' : '' }}">

                    <input type="password" name="password" id="password" class="form-control"
                           placeholder="{{ __('Password...') }}"
                           required autocomplete="current-password"
                    >
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @if ($errors->has('password'))
                        <div id="password-error" class="error text-danger pl-3" for="password"
                             style="display: block;">
                            <strong>{{ $errors->first('password') }}</strong>
                        </div>
                    @endif
                </div>

                <div class="row mt-3">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember"
                                   name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">
                                {{ __('Remember me') }}
                            </label>
                        </div>
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">{{ __('Log in') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <p class="text-center">
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="btn btn-link">
                {{ __('Forgot password?') }}
            </a>
        @endif
        <a href="{{ route('register') }}" class="btn btn-link">
            {{ __('Create new account') }}
        </a>
    </p>


@endsection
