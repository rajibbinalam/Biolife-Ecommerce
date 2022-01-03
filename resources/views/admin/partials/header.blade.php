<header class="main-header">
    <!-- Logo -->
    <a href="{{route('admin.index')}}" class="logo">
      <span class="logo-mini"><b>A</b>LT</span>
      <span class="logo-lg">{{__($general->site_name)}}</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        
        
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{auth()->guard('admin')->user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

                <p>
                  {{auth()->guard('admin')->user()->name}} - Web Developer
                  <small>Member Since {{auth()->guard('admin')->user()->created_at->format('d-M-Y')}}</small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{route('admin.adminProfile')}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <form method="POST" action="{{ route('admin.logout') }}">
                      @csrf


                      <input type="submit" name="submit" class="btn btn-default btn-flat" value="{{ __('Log Out') }}">
                     
                          {{-- {{ __('Log Out') }} --}}
                      
                  </form>
                </div>
              </li>
            </ul>
          </li>
        
        </ul>
      </div>
    </nav>
  </header>