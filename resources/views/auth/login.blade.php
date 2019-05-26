@extends('layouts.logsesion')

@section('content')

<div class="form-log" style="margin-top: -4%;">
  <h2 class="header-log">Informatics.id Sign up or Sign in Form</h2>
    <div class="container" id="container">
      <div class="form-container sign-up-container">
        <form method="post" action="{{ route('register') }}" class="main-form">
          {{ csrf_field() }}
            <div class=" log{{ $errors->has('email') ? ' has-error' : '' }}">
                <h1>Create Account</h1>
                <div >
                    <input id="name" type="text" placeholder="Your name here......" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
                <div>
                    <input id="email" type="email" placeholder="Your email here......" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Input Password here....." name="password" required >

                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
                <div>
                    <input id="password-confirm" placeholder="Type your password again" type="password" class="form-control" name="password_confirmation" required autofocus>
                </div>
                <button type="submit">{{ __('Register') }}</button>
            </div>
        </form>
      </div>

      <!-- sign in -->
      <div class="form-container sign-in-container">
        <form method="POST" action="{{ route('login') }}" class="main-form">
          {{ csrf_field() }}
          <h1>Sign in here</h1>
          <div class="mail{{ $errors->has('email') ? ' has-error' : '' }}">
              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" style="width: 300px;" required autofocus >

              @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
              <div class="clear"></div>
          </div>
          <div class="pass{{ $errors->has('password') ? ' has-error' : '' }}">
              <input id="password" type="password" class="form-control" style="width: 300px;" name="password" required autofocus>

              @if ($errors->has('password'))
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
              @endif
              <div class="clear"></div>
          </div>
            <br>
          <div>
              <input class="form-check-input remenber-me pull-right" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

              <label for="remember" style="color: black;" style="float: left;">
                  {{ __('Remember Me') }}
              </label>
          </div>
          <div>
            @if (Route::has('password.request'))
                <a class="label label-danger" href="{{ route('password.request') }}" style="text-decoration: none; color: black;">
                  {{ __('Forgot Your Password...?') }}
                </a>
            @endif
          </div>
            <hr>
          <button type="submit">
            {{ __('Login') }}
          </button>
        </form>
      </div>

      <!-- ovarlay form -->
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1>Welcome</h1>
            <p class="sect">To keep connected with us <br>please login with your account</p>
            <button class="ghost" id="signIn">Sign In</button>
          </div>
          <div class="overlay-panel overlay-right">
            <h1>Welcome</h1>
            <p class="sect">Enter your personal details <br>to get in touch with us</p>
            <button class="ghost" id="signUp">Sign Up</button>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection

