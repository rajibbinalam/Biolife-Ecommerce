<header id="header" class="header-area style-01 layout-03">
    <div class="header-top bg-main hidden-xs">
        <div class="container">
            <div class="top-bar left">
                <ul class="horizontal-menu">
                    <li><a href=""><i class="fa fa-envelope" aria-hidden="true"></i>{{$contact->email}}</a></li>
                    <li><a href="">Free Shipping for all Order of $99</a></li>
                </ul>
            </div>
            <div class="top-bar right">
                <ul class="social-list">
                    @foreach($socials as $social)
                        <li><a href="{{$social->link}}"><i class="{{$social->icon_class}}" aria-hidden="true"></i></a></li>
                    @endforeach
                </ul>
                <ul class="horizontal-menu">
                    <li class="horz-menu-item currency">
                        <select name="currency">
                            <option value="eur">€ EUR (Euro)</option>
                            <option value="usd" selected>$ USD (Dollar)</option>
                            <option value="usd">£ GBP (Pound)</option>
                            <option value="usd">¥ JPY (Yen)</option>
                        </select>
                    </li>
                    <li class="horz-menu-item lang">
                        <select name="language">
                            <option value="fr">French (EUR)</option>
                            <option value="en" selected>English (USD)</option>
                            <option value="ger">Germany (GBP)</option>
                            <option value="jp">Japan (JPY)</option>
                        </select>
                    </li>
                    <li>
                        @guest
                            <a href="{{route('login')}}" class="login-link"><i class="biolife-icon icon-login"></i>Login/Register</a>
                        @else
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: transparent;color: white;">{{Auth::user()->name}}</button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <img src="{{Auth::user()->avatar}}" alt="" height="30" width="30">
                                    <a class="dropdown-item user-profile" style="color: black" href="">@lang('My Profile')</a>
                                    <form action="{{route('logout')}}" method="post" style="margin-left: 55px;">
                                        @csrf
                                        {{-- <input type="submit" name="submit" class="dropdown-item user-profile" value="{{ __('Log Out') }}"> --}}
                                        <button type="submit" class="dropdown-item log-out-btn" style="color: black">
                                            @lang('Log Out')
                                        </button>
                                        {{-- <a class="dropdown-item user-profile" type="submit" style="color: black" href="">@lang('Log Out')</a> --}}
                                    </form>
                                    
                                </div>
                            </div>
                        @endguest
                        
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="header-middle biolife-sticky-object ">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-2 col-md-6 col-xs-6">
                    <a href="{{url('/')}}" class="biolife-logo"><img src="{{asset($general->logo)}}" alt="biolife logo" width="135" height="34"></a>
                </div>
                <div class="col-lg-6 col-md-7 hidden-sm hidden-xs">
                    <div class="primary-menu">
                        <ul class="menu biolife-menu clone-main-menu clone-primary-menu" id="primary-menu" data-menuname="main menu">
                            <li class="menu-item"><a href="{{url('/')}}">Home</a></li>
                            
                            <li class="menu-item menu-item-has-children has-child">
                                <a href="" class="menu-name" data-title="Products">Products</a>
                                <ul class="sub-menu">
                                   
                                    <li class="menu-item"><a href="{{route('CategoryWise')}}">Category Wise</a></li>
                                    <li class="menu-item"><a href="{{route('BrandWise')}}">Brand Wise</a></li>
                                    
                                </ul>
                            </li>
                            
                            <li class="menu-item"><a href="{{route('all.products')}}">All Products</a></li>
                            <li class="menu-item"><a href="{{route('blogs')}}">Blog</a></li>
                            <li class="menu-item"><a href="{{route('contactPage')}}">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-md-6 col-xs-6">
                    <div class="biolife-cart-info">
                        <div class="mobile-search">
                            <a href="javascript:void(0)" class="open-searchbox"><i class="biolife-icon icon-search"></i></a>
                            <div class="mobile-search-content">
                                <form action="#" class="form-search" name="mobile-seacrh" method="get">
                                    <a href="#" class="btn-close"><span class="biolife-icon icon-close-menu"></span></a>
                                    <input type="text" name="s" class="input-text" value="" placeholder="Search here...">
                                    <select name="category">
                                        <option value="-1" selected>All Categories</option>
                                        <option value="vegetables">Vegetables</option>
                                    </select>
                                    <button type="submit" class="btn-submit"></button>
                                </form>
                            </div>
                        </div>
                        <div class="wishlist-block hidden-sm hidden-xs">
                            @if(isset(Auth::user()->id))
                                <a href="{{url('/my-wishlist/'.Auth::user()->id)}}" class="link-to">
                                    <span class="icon-qty-combine">
                                        <i class="icon-heart-bold biolife-icon"></i>
                                        {{-- <span class="qty"></span> --}}
                                    </span>
                                </a>
                            @else
                            <a href="{{route('login')}}" class="link-to">
                                <span class="icon-qty-combine">
                                    <i class="icon-heart-bold biolife-icon"></i>
                                    {{-- <span class="qty"></span> --}}
                                </span>
                            </a>
                            @endif
                        </div>
                        <div class="minicart-block">
                            <div class="minicart-contain">
                                <a href="{{route('checkout')}}" class="link-to">
                                    <span class="icon-qty-combine">
                                        <i class="icon-cart-mini biolife-icon"></i>
                                        <span class="qty">{{Cart::count()}}</span>
                                    </span>
                                    <span class="title">My Cart -</span>
                                    <span class="sub-total">£ {{Cart::subTotal()}}</span>
                                </a>
                                <div class="cart-content">
                                    <div class="cart-inner">
                                        <ul class="products">
                                            @foreach (Cart::content() as $cart)
                                                
                                            <li>
                                                <div class="minicart-item">
                                                    <div class="thumb">
                                                        <a href=""><img src="{{asset(explode('|',App\Models\Product::find($cart->id)->image)[0])}}" width="70" height="50" alt="National Fresh"></a>
                                                    </div>
                                                    <div class="left-info">
                                                        <div class="product-title"><a href="{{url('/product/'.$cart->id.'/'.$cart->name)}}" class="product-name">{{$cart->name}}</a></div>
                                                        <div class="price">
                                                            <ins><span class="price-amount"><span class="currencySymbol">Price : £</span>{{$cart->price}}</span></ins>
                                                        </div>
                                                        <div class="qty">
                                                            <label for="cart[id123][qty]">Qty: {{$cart->qty}}</label>
                                                            {{-- <input type="number" class="input-qty" name="cart[id123][qty]" id="cart[id123][qty]" value="1" disabled> --}}
                                                        </div>
                                                    </div>
                                                    <div class="action">
                                                        <a href="{{route('checkout')}}" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        <a href="{{url('/cart-remove/'.$cart->rowId)}}" class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <p class="btn-control">
                                            <a href="{{route('checkout')}}" class="btn view-cart">view cart</a>
                                            <a href="" class="btn">checkout</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mobile-menu-toggle">
                            <a class="btn-toggle" data-object="open-mobile-menu" href="javascript:void(0)">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom hidden-sm hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="vertical-menu vertical-category-block">
                        <div class="block-title">
                            <span class="menu-icon">
                                <span class="line-1"></span>
                                <span class="line-2"></span>
                                <span class="line-3"></span>
                            </span>
                            <span class="menu-title">All departments</span>
                            <span class="angle" data-tgleclass="fa fa-caret-down"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                        </div>
                        <div class="wrap-menu">
                            <ul class="menu clone-main-menu">

                                @foreach ($categories as $category)
                                <li class="menu-item menu-item-has-children has-megamenu">
                                    <a href="#" class="menu-name" data-title="Fruit & Nut Gifts">
                                       <i class="biolife-icon icon-fruits"></i>
                                       {{$category->name}}</a>
                                        @if ($category->subCategories->count()>0)
                                        <div class="wrap-megamenu lg-width-900 md-width-640">
                                            <div class="mega-content">
                                                <div class="row">
                                                    @foreach ($category->subCategories as $subCategory)
                                                    <div class="col-lg-3 col-md-4 col-sm-12 xs-margin-bottom-25 md-margin-bottom-0">
                                                        <div class="wrap-custom-menu vertical-menu">
                                                            <h4 class="menu-title">{{$subCategory->name}}</h4>
                                                            <ul class="menu">
                                                                <li><a href="#">Fruit & Nut Gifts</a></li>
                                                                <li><a href="#">Mixed Fruits</a></li>
                                                                <li><a href="#">Oranges</a></li>
                                                                <li><a href="#">Bananas & Plantains</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    
                                                </div>
                                                <!-- there was brand -->
                                            </div>
                                        </div>
                                        @endif
                                </li>
                                @endforeach
                                
                                
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 padding-top-2px">
                    <div class="header-search-bar layout-01">
                        <form action="#" class="form-search" name="desktop-seacrh" method="get">
                            <input type="text" name="s" class="input-text" value="" placeholder="Search here...">
                            <select name="category">
                                <option value="-1" selected>All Categories</option>
                                <option value="vegetables">Vegetables</option>
                            </select>
                            <button type="submit" class="btn-submit"><i class="biolife-icon icon-search"></i></button>
                        </form>
                    </div>
                    <div class="live-info">
                        <p class="telephone"><i class="fa fa-phone" aria-hidden="true"></i><b class="phone-number">{{$contact->phone}}</b></p>
                        <p class="working-time">{{$contact->store_open}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>