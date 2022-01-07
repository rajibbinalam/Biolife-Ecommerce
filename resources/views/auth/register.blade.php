@extends('partials.app')
@section('content')
<!--Hero Section-->
<div class="hero-section hero-background">
  <h1 class="page-title">User Registration</h1>
</div>

<!--Navigation section-->
<div class="container">
  <nav class="biolife-nav">
      <ul>
          <li class="nav-item"><a href="{{route('home')}}" class="permal-link">Home</a></li>
          <li class="nav-item"><span class="current-page">Authentication</span></li>
      </ul>
  </nav>
</div>

<div class="page-contain login-page">

  <div id="main-content" class="main-content">
      <div class="container">

          <div class="row">

              <!--Form Sign In-->
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="signin-container">
                      <form action="{{ route('register') }}" name="frm-login" method="post">
                        @csrf
                          <p class="form-row">
                            <label for="fid-name">User Name:<span class="requite">*</span></label>
                            <input type="text" id="fid-name" name="name" value="{{ old('name') }}" class="txt-input  @error('name') is-invalid @enderror">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </p>
                          <p class="form-row">
                              <label for="fid-name">Email Address:<span class="requite">*</span></label>
                              <input type="email" id="fid-name" name="email" value="{{ old('email') }}" class="txt-input  @error('email') is-invalid @enderror">
                              @error('email')
                                  <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </p>
                          <p class="form-row">
                            <label for="fid-name">Phone:<span class="requite">*</span></label>
                            <input type="text" id="fid-name" name="phone" value="{{ old('phone') }}" class="txt-input  @error('phone') is-invalid @enderror">
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </p>
                          <p class="form-row">
                              <label for="fid-pass">Password:<span class="requite">*</span></label>
                              <input type="password" id="fid-pass" name="password" value="{{ old('password') }}" class="txt-input  @error('password') is-invalid @enderror">
                              @error('password')
                                  <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </p>
                          <p class="form-row">
                              <label for="fid-pass">Confirm Password:<span class="requite">*</span></label>
                              <input type="password" id="fid-pass" name="password_confirmation"  class="txt-input">
                          </p>
                          <p class="form-row wrap-btn">
                              <button class="btn btn-submit btn-bold" type="submit">{{ __('Sign Up') }}</button>
                              {{-- <a href="" class="link-to-help">Forgot your password</a> --}}

                              {{-- @if(Route::has('password.request'))
                                  <a href="{{ route('password.request') }}">
                                      {{ __('Forgot your password?') }}
                                  </a>
                              @endif --}}
                          </p>
                      </form>
                  </div>
              </div>

              <!--Go to Register form-->
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="register-in-container">
                      <div class="intro">
                          <h4 class="box-title">Have a Account?</h4>
                          <p class="sub-title">Log In and Find your Favourit:</p>
                          <ul class="lis">
                              <li>Check out faster</li>
                              <li>Save multiple shipping anddesses</li>
                              <li>Access your order history</li>
                              <li>Track new orders</li>
                              <li>Save items to your Wishlist</li>
                          </ul>
                          <a href="{{route('login')}}" class="btn btn-bold">@lang('Log In')</a>
                      </div>
                  </div>
              </div>

          </div>

      </div>

  </div>

</div>

@endsection