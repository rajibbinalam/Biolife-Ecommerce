@extends('layouts.app')

@section('content')


<div class="login-box-body">
      <p class="login-box-msg">Admin Log In</p>

      <form action="{{ route('admin.storelogin') }}" method="post">
      	@csrf

        <div class="form-group has-feedback">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="" placeholder="Email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          @error('email')
		    <div class="text-danger">{{ $message }}</div>
		@enderror
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          @error('password')
		    <div class="text-danger">{{ $message }}</div>
		@enderror
        </div>

        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label><input type="checkbox" id="remember_me" name="remember">{{ __('Remember me') }}</label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Log in') }}</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
          Facebook</a>
        <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
          Google+</a>
      </div>
      <!-- /.social-auth-links -->

		<!-- @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif -->
      <!-- <a href="#">I forgot my password</a> -->
      <!-- <br> -->
      <a href="" class="text-center">Register a new membership</a>

    </div>



@endsection