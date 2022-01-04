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
                    <li><a href="login.html" class="login-link"><i class="biolife-icon icon-login"></i>Login/Register</a></li>
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
                            <a href="#" class="link-to">
                                <span class="icon-qty-combine">
                                    <i class="icon-heart-bold biolife-icon"></i>
                                    <span class="qty">4</span>
                                </span>
                            </a>
                        </div>
                        <div class="minicart-block">
                            <div class="minicart-contain">
                                <a href="{{route('checkout')}}" class="link-to">
                                    <span class="icon-qty-combine">
                                        <i class="icon-cart-mini biolife-icon"></i>
                                        <span class="qty">{{$count}}</span>
                                    </span>
                                    <span class="title">My Cart -</span>
                                    <span class="sub-total">£ {{$subTotal}}</span>
                                </a>
                                <div class="cart-content">
                                    <div class="cart-inner">
                                        <ul class="products">
                                            @foreach ($carts as $cart)
                                                
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
                                <li class="menu-item menu-item-has-children has-megamenu">
                                    <a href="#" class="menu-name" data-title="Fruit & Nut Gifts"><i class="biolife-icon icon-fruits"></i>Fruit & Nut Gifts</a>
                                    <div class="wrap-megamenu lg-width-900 md-width-640">
                                        <div class="mega-content">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 col-sm-12 xs-margin-bottom-25 md-margin-bottom-0">
                                                    <div class="wrap-custom-menu vertical-menu">
                                                        <h4 class="menu-title">Fresh Fuits</h4>
                                                        <ul class="menu">
                                                            <li><a href="#">Fruit & Nut Gifts</a></li>
                                                            <li><a href="#">Mixed Fruits</a></li>
                                                            <li><a href="#">Oranges</a></li>
                                                            <li><a href="#">Bananas & Plantains</a></li>
                                                            <li><a href="#">Fresh Gala Apples</a></li>
                                                            <li><a href="#">Berries</a></li>
                                                            <li><a href="#">Pears</a></li>
                                                            <li><a href="#">Produce</a></li>
                                                            <li><a href="#">Snack Foods</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-12 lg-padding-left-23 xs-margin-bottom-25 md-margin-bottom-0">
                                                    <div class="wrap-custom-menu vertical-menu">
                                                        <h4 class="menu-title">Nut Gifts</h4>
                                                        <ul class="menu">
                                                            <li><a href="#">Non-Dairy Coffee Creamers</a></li>
                                                            <li><a href="#">Coffee Creamers</a></li>
                                                            <li><a href="#">Mayonnaise</a></li>
                                                            <li><a href="#">Almond Milk</a></li>
                                                            <li><a href="#">Ghee</a></li>
                                                            <li><a href="#">Beverages</a></li>
                                                            <li><a href="#">Ranch Salad Dressings</a></li>
                                                            <li><a href="#">Hemp Milk</a></li>
                                                            <li><a href="#">Nuts & Seeds</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-4 col-sm-12 lg-padding-left-50 xs-margin-bottom-25 md-margin-bottom-0">
                                                    <div class="biolife-products-block max-width-270">
                                                        <h4 class="menu-title">Bestseller Products</h4>
                                                        <ul class="products-list default-product-style biolife-carousel nav-none-after-1k2 nav-center" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":1, "responsive":[{"breakpoint":767, "settings":{ "arrows": false}}]}'>
                                                            <!-- loop == itme 3 -->
                                                            <li class="product-item">
                                                                <div class="contain-product none-overlay">
                                                                    <div class="product-thumb">
                                                                        <a href="#" class="link-to-product">
                                                                            <img src="assets/images/products/p-08.jpg" alt="dd" width="270" height="270" class="product-thumnail">
                                                                        </a>
                                                                    </div>
                                                                    <div class="info">
                                                                        <b class="categories">Fresh Fruit</b>
                                                                        <h4 class="product-title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
                                                                        <div class="price">
                                                                            <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                                            <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- there was brand -->
                                        </div>
                                    </div>
                                </li>
                                <li class="menu-item menu-item-has-children has-megamenu">
                                    <a href="#" class="menu-name" data-title="Vegetables"><i class="biolife-icon icon-broccoli-1"></i>Vegetables</a>
                                    <div class="wrap-megamenu lg-width-900 md-width-640 background-mega-01">
                                        <div class="mega-content">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 col-sm-12 xs-margin-bottom-25 md-margin-bottom-0">
                                                    <div class="wrap-custom-menu vertical-menu">
                                                        <h4 class="menu-title">Vegetables</h4>
                                                        <ul class="menu">
                                                            <li><a href="#">Fruit & Nut Gifts</a></li>
                                                            <li><a href="#">Mixed Fruits</a></li>
                                                            <li><a href="#">Oranges</a></li>
                                                            <li><a href="#">Bananas & Plantains</a></li>
                                                            <li><a href="#">Fresh Gala Apples</a></li>
                                                            <li><a href="#">Berries</a></li>
                                                            <li><a href="#">Pears</a></li>
                                                            <li><a href="#">Produce</a></li>
                                                            <li><a href="#">Snack Foods</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-12 lg-padding-left-23 xs-margin-bottom-25 md-margin-bottom-0">
                                                    <div class="wrap-custom-menu vertical-menu">
                                                        <h4 class="menu-title">Gifts</h4>
                                                        <ul class="menu">
                                                            <li><a href="#">Non-Dairy Coffee Creamers</a></li>
                                                            <li><a href="#">Coffee Creamers</a></li>
                                                            <li><a href="#">Mayonnaise</a></li>
                                                            <li><a href="#">Almond Milk</a></li>
                                                            <li><a href="#">Ghee</a></li>
                                                            <li><a href="#">Beverages</a></li>
                                                            <li><a href="#">Ranch Salad Dressings</a></li>
                                                            <li><a href="#">Hemp Milk</a></li>
                                                            <li><a href="#">Nuts & Seeds</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="menu-item menu-item-has-children has-megamenu">
                                    <a href="#" class="menu-name" data-title="Fresh Berries"><i class="biolife-icon icon-grape"></i>Fresh Berries</a>
                                    <div class="wrap-megamenu lg-width-900 md-width-640 background-mega-02">
                                        <div class="mega-content">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 sm-col-12 md-margin-bottom-83 xs-margin-bottom-25">
                                                    <div class="wrap-custom-menu vertical-menu">
                                                        <h4 class="menu-title">Fresh Berries</h4>
                                                        <ul class="menu">
                                                            <li><a href="#">Fruit & Nut Gifts</a></li>
                                                            <li><a href="#">Mixed Fruits</a></li>
                                                            <li><a href="#">Oranges</a></li>
                                                            <li><a href="#">Bananas & Plantains</a></li>
                                                            <li><a href="#">Fresh Gala Apples</a></li>
                                                            <li><a href="#">Berries</a></li>
                                                            <li><a href="#">Pears</a></li>
                                                            <li><a href="#">Produce</a></li>
                                                            <li><a href="#">Snack Foods</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 sm-col-12 lg-padding-left-23 xs-margin-bottom-36px md-margin-bottom-0">
                                                    <div class="wrap-custom-menu vertical-menu">
                                                        <h4 class="menu-title">Gifts</h4>
                                                        <ul class="menu">
                                                            <li><a href="#">Non-Dairy Coffee Creamers</a></li>
                                                            <li><a href="#">Coffee Creamers</a></li>
                                                            <li><a href="#">Mayonnaise</a></li>
                                                            <li><a href="#">Almond Milk</a></li>
                                                            <li><a href="#">Ghee</a></li>
                                                            <li><a href="#">Beverages</a></li>
                                                            <li><a href="#">Ranch Salad Dressings</a></li>
                                                            <li><a href="#">Hemp Milk</a></li>
                                                            <li><a href="#">Nuts & Seeds</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-4 sm-col-12 lg-padding-left-25 md-padding-top-55">
                                                    <div class="biolife-banner layout-01">
                                                        <h3 class="top-title">Farm Fresh</h3>
                                                        <p class="content"> All the Lorem Ipsum generators on the Internet tend.</p>
                                                        <b class="bottomm-title">Berries Series</b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="menu-item"><a href="#" class="menu-name" data-title="Ocean Foods"><i class="biolife-icon icon-fish"></i>Ocean Foods</a></li>
                                <li class="menu-item menu-item-has-children has-child">
                                    <a href="#" class="menu-name" data-title="Butter & Eggs"><i class="biolife-icon icon-honey"></i>Butter & Eggs</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item"><a href="#">Breakfast Scrambles</a></li>
                                        <li class="menu-item menu-item-has-children has-child"><a href="#" class="menu-name" data-title="Eggs & other considerations">Eggs & other considerations</a>
                                            <ul class="sub-menu">
                                                <li class="menu-item"><a href="#">Bacon Avo Egg Sandwich</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item"><a href="#">Griddle</a></li>
                                        <li class="menu-item menu-item-has-children has-child"><a href="#" class="menu-name" data-title="Sides & Extras">Sides & Extras</a>
                                            <ul class="sub-menu">
                                                <li class="menu-item"><a href="#">Fruit & Yogurt Parfait</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item"><a href="#" class="menu-title"><i class="biolife-icon icon-fast-food"></i>Fastfood</a></li>
                                <li class="menu-item"><a href="#" class="menu-title"><i class="biolife-icon icon-beef"></i>Fresh Meat</a></li>
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