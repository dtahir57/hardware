@extends('layouts.app')

@section('title', 'Register / Login')

@section('content')
<div class="page-title">
  <div class="container">
    <div class="column">
      <h1>Login / Register Account</h1>
    </div>
    <div class="column">
      <ul class="breadcrumbs">
        <li><a href="{{ url('/') }}">Home</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li>Login / Register</li>
      </ul>
    </div>
  </div>
</div>
<div class="container padding-bottom-3x mb-2">
  <div class="row">
    <div class="col-md-6">
      <form class="card" method="post" action="{{ route('login') }}">
        @csrf
        <div class="card-body">
          <div class="row margin-bottom-1x">
            <div class="col-xl-4 col-md-6 col-sm-4"><a class="btn btn-sm btn-block facebook-btn" href="#"><i class="socicon-facebook"></i>&nbsp;Facebook login</a></div>
            <div class="col-xl-4 col-md-6 col-sm-4"><a class="btn btn-sm btn-block twitter-btn" href="#"><i class="socicon-twitter"></i>&nbsp;Twitter login</a></div>
            <div class="col-xl-4 col-md-6 col-sm-4"><a class="btn btn-sm btn-block google-btn" href="#"><i class="socicon-googleplus"></i>&nbsp;Google+ login</a></div>
          </div>
          <h4 class="margin-bottom-1x">Or using form below</h4>
          <div class="form-group input-group">
            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" type="email" placeholder="Email" required><span class="input-group-addon"><i class="icon-mail"></i></span>
          </div>
          <div class="form-group input-group">
            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" type="password" placeholder="Password" required><span class="input-group-addon"><i class="icon-lock"></i></span>
          </div>
          <div class="d-flex flex-wrap justify-content-between padding-bottom-1x">
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="remember_me">
              <label class="custom-control-label" for="remember_me">Remember me</label>
            </div><a class="navi-link" href="account-password-recovery.html">Forgot password?</a>
          </div>
          <div class="text-center text-sm-right">
            <button class="btn btn-primary margin-bottom-none" type="submit">Login</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-6">
      <div class="padding-top-3x hidden-md-up"></div>
      <h3 class="margin-bottom-1x">No Account? Register</h3>
      <p>Registration takes less than a minute but gives you full control over your orders.</p>
      <form class="row" method="post" action="{{ route('register') }}">
        @csrf
        <div class="col-sm-6">
          <div class="form-group">
            <label for="reg-fn">Name</label>
            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Username" name="name" type="text" id="reg-fn" required>
            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="reg-email">E-mail Address</label>
            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" id="reg-email" name="email" placeholder="E-mail Address" required>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="reg-pass">Password</label>
            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" id="reg-pass" name="password" placeholder="Password" required>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="reg-pass-confirm">Confirm Password</label>
            <input class="form-control" type="password" id="reg-pass-confirm" name="password_confirmation" placeholder="Confirm Password" required>
          </div>
        </div>
        <div class="col-12 text-center text-sm-right">
          <button class="btn btn-primary margin-bottom-none" type="submit">Register</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
--}}
@endsection
