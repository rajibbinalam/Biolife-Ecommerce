@extends('layouts.app')

@section('content')


<div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="{{ route('register') }}" method="post">
    	@csrf

      <div class="form-group has-feedback">
        <input type="text" name="name" class="form-control @error('email') is-invalid @enderror" placeholder="User name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        @error('name')
		    <div class="text-danger">{{ $message }}</div>
		@enderror
      </div>

      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @error('email')
		    <div class="text-danger">{{ $message }}</div>
		@enderror
      </div>

      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control @error('email') is-invalid @enderror" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @error('password')
		    <div class="text-danger">{{ $message }}</div>
		@enderror
      </div>

      <div class="form-group has-feedback">
        <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <!-- <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div> -->
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Register') }}</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>

    <a href="{{ route('login') }}" class="text-center">{{ __('I already have a membership') }}</a>
  </div>



@endsection