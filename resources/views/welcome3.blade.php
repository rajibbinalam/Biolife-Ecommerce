@extends('partials.app')

@section('content')
<div class=""> <h1>Wlcome 3</h1></div>
<div class="main-slide block-slider">
    <ul class="biolife-carousel nav-none-on-mobile" data-slick='{"arrows": true, "dots": false, "slidesMargin": 0, "slidesToShow": 1, "infinite": true, "speed": 800}'>
       @foreach($sliders as $slider)
        <li>
            <div class="slide-contain slider-opt03__layout01">
                <div class="media">
                    <div class="child-elememt">
                        <a href="" class="link-to">
                            <img src="{{$slider->image}}" width="604" height="580" alt="">
                        </a>
                    </div>
                </div>
                <div class="text-content">
                    <i class="first-line">{{$slider->first_tag_line}}</i>
                    <h3 class="second-line">{{$slider->name}}</h3>
                    <p class="third-line">{{$slider->second_tag_line}}</p>
                    <p class="buttons">
                        <a href="" class="btn btn-bold">Shop now</a>
                        <a href="" class="btn btn-thin">View lookbook</a>
                    </p>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>

<!--Block 02: Top Banner-->
<div class="special-slide">
    <div class="container">
        <ul class="biolife-carousel dots_ring_style" data-slick='{"arrows": false, "dots": true, "slidesMargin": 30, "slidesToShow": 1, "infinite": true, "speed": 800, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 1}},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":20, "dots": false}},{"breakpoint":480, "settings":{ "slidesToShow": 1}}]}'>
            @foreach($banner_product as $bannerpsoduct)
            <li>
                <div class="slide-contain biolife-banner__special">
                    <div class="banner-contain">
                        <div class="media">
                            <a href="" class="bn-link">
                                <figure><img src="{{asset(explode('|',$bannerpsoduct->image)[0])}}" width="616" height="483" alt=""></figure>
                            </a>
                        </div>
                        <div class="text-content">
                            <b class="first-line">Pomegranate</b>
                            <span class="second-line">Organic Heaven Made</span>
                            <span class="third-line">Easy <i>Healthy, Happy Life</i></span>
                            <div class="product-detail">
                                <h4 class="product-name">{{$bannerpsoduct->name}}</h4>
                                <div class="price price-contain">
                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>{{$bannerpsoduct->new_price}}</span></ins>
                                    <del><span class="price-amount"><span class="currencySymbol">£</span>{{$bannerpsoduct->old_price}}</span></del>
                                </div>
                                <div class="buttons">
                                    <a href="#" class="btn add-to-cart-btn">add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
        <div class="biolife-service type01 biolife-service__type01 sm-margin-top-0 xs-margin-top-45px">
            <b class="txt-show-01">100%Nature</b>
            <i class="txt-show-02">Fresh Fruits</i>
            <ul class="services-list">
                <li>
                    <div class="service-inner">
                        <span class="number">1</span>
                        <span class="biolife-icon icon-beer"></span>
                        <a class="srv-name" href="#">full stamped product</a>
                    </div>
                </li>
                <li>
                    <div class="service-inner">
                        <span class="number">2</span>
                        <span class="biolife-icon icon-schedule"></span>
                        <a class="srv-name" href="#">place and delivery on time</a>
                    </div>
                </li>
                <li>
                    <div class="service-inner">
                        <span class="number">3</span>
                        <span class="biolife-icon icon-car"></span>
                        <a class="srv-name" href="#">Free shipping in the city</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<!--Block 03: Product Tab-->
<div class="product-tab z-index-20 sm-margin-top-193px xs-margin-top-30px">
    <div class="container">
        <div class="biolife-title-box">
            <span class="subtitle">@lang('All the best item for You')</span>
            <h3 class="main-title">@lang('Products')</h3>
        </div>
        <div class="biolife-tab biolife-tab-contain sm-margin-top-34px">
            <!-- <div class="tab-head tab-head__icon-top-layout icon-top-layout">
                <ul class="tabs md-margin-bottom-35-im xs-margin-bottom-40-im">
                    <li class="tab-element active">
                        <a href="#tab01_1st" class="tab-link"><span class="biolife-icon icon-lemon"></span>Oranges</a>
                    </li>
                    <li class="tab-element">
                        <a href="#tab01_2nd" class="tab-link"><span class="biolife-icon icon-grape2"></span>Grapes</a>
                    </li>
                    <li class="tab-element">
                        <a href="#tab01_3rd" class="tab-link"><span class="biolife-icon icon-blueberry"></span>Blueberries</a>
                    </li>
                    <li class="tab-element">
                        <a href="#tab01_4th" class="tab-link"><span class="biolife-icon icon-orange"></span>Lemon</a>
                    </li>
                    <li class="tab-element">
                        <a href="#tab01_5th" class="tab-link"><span class="biolife-icon icon-broccoli"></span>Vegetables</a>
                    </li>
                </ul>
            </div> -->
            <div class="tab-content">
                <div id="tab01_1st" class="tab-contain active row">
                    <!-- <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile eq-height-contain" data-slick='{"rows":2 ,"arrows":true,"dots":false,"infinite":true,"speed":400,"slidesMargin":10,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":25 }},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":15}}]}'> -->
                    @foreach($products as $product)
                        <!-- <li class="product-item"> -->
                            <div class="contain-product layout-default col-md-3">
                                <div class="product-thumb">
                                    <a href="#" class="link-to-product">
                                        <img src="{{asset(explode('|',$product->image)[0])}}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                    </a>
                                    <a class="lookup btn_call_quickview" href="#"><i class="biolife-icon icon-search"></i></a>
                                </div>
                                <div class="info">
                                    <b class="categories">Vegetables</b>
                                    <h4 class="product-title"><a href="#" class="pr-name">{{$product->name}}</a></h4>
                                    <div class="price ">
                                        <ins><span class="price-amount"><span class="currencySymbol">£</span>{{$product->new_price}}</span></ins>
                                        <del><span class="price-amount"><span class="currencySymbol">£</span>{{$product->old_price}}</span></del>
                                    </div>
                                    <div class="slide-down-box">
                                        <p class="message">All products are carefully selected to ensure food safety.</p>
                                        <div class="buttons">
                                            <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                            <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                            <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- </li> -->
                        @endforeach
                    <!-- </ul> -->
                </div>
             
            </div>
        </div>
    </div>
</div>

<!--Block 04: Banner Promotion 01 -->
<div class="banner-promotion-01 xs-margin-top-50px sm-margin-top-11px">
    <div class="biolife-banner promotion biolife-banner__promotion">
        <div class="banner-contain">
            <!-- <div class="media background-biolife-banner__promotion">
                <div class="img-moving position-1">
                    <img src="assets/images/home-03/img-moving-pst-1.png" width="149" height="139" alt="img msv">
                </div>
                <div class="img-moving position-2">
                    <img src="assets/images/home-03/img-moving-pst-2.png" width="185" height="265" alt="img msv">
                </div>
                <div class="img-moving position-3">
                    <img src="assets/images/home-03/img-moving-pst-3-cut.png" width="384" height="151" alt="img msv">
                </div>
                <div class="img-moving position-4">
                    <img src="assets/images/home-03/img-moving-pst-4.png" width="198" height="269" alt="img msv">
                </div>
            </div> -->
            <div class="text-content">
                <div class="container text-wrap">
                    @foreach($middle_banners as $middle_banner)
                    <i class="first-line">{{$middle_banner->first_tag_line}}</i>
                    <span class="second-line">{{$middle_banner->name}}</span>
                    <p class="third-line">{{$middle_banner->second_tag_line}}</p>
                    <div class="product-detail">
                        <p class="txt-price"><span>Only:</span> £{{$middle_banner->price}}</p>
                        <a href="#" class="btn add-to-cart-btn">Shop Now</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!--Block 05: Banner Chef-->
<div class="banner-promotion-02 z-index-20">
    <div class="biolife-banner promotion2 biolife-banner__promotion2">
        <div class="banner-contain">
            <div class="container">
                <div class="media"></div>
                <div class="text-content">
                    <b class="first-line">Food Heaven Made</b>
                    <span class="second-line">Easy <i>Healthy, Happy Life</i></span>
                    <p class="third-line">Food Heaven Made Easy sounds like the name of an amazingly delicious food delivery service, but don't be fooled. The blog is actually a compilation of recipes, cooking videos, and nutrition tips.</p>
                    <p class="buttons">
                        <a href="#" class="btn btn-bold">Read More</a>
                        <a href="#" class="btn btn-thin">View Menu Now</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Block 06: Products-->
<div class="Product-box sm-margin-top-96px xs-margin-top-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5 col-sm-6">
                <div class="advance-product-box">
                    <div class="biolife-title-box bold-style biolife-title-box__bold-style">
                        <h3 class="title">@lang('Deals of the day')</h3>
                    </div>
                    <ul class="products biolife-carousel nav-top-right nav-none-on-mobile" data-slick='{"arrows":true, "dots":false, "infinite":false, "speed":400, "slidesMargin":30, "slidesToShow":1}'>
                        @foreach($deals as $deal)
                        <li class="product-item">
                            <div class="contain-product deal-layout contain-product__deal-layout">
                                <div class="product-thumb">
                                    <a href="" class="link-to-product">
                                        <img src="{{asset(explode('|',$deal->image)[0])}}" alt="dd" width="330" height="330" class="product-thumnail">
                                    </a>
                                    <div class="labels">
                                        <span class="sale-label">@lang('-50%')</span>
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="biolife-countdown" data-datetime="2020/02/18 00:00:00"></div>
                                    <b class="categories">{{$deal->category->name}}</b>
                                    <h4 class="product-title"><a href="" class="pr-name">{{$deal->name}}</a></h4>
                                    <div class="price ">
                                        <ins><span class="price-amount"><span class="currencySymbol">£</span>{{$deal->new_price}}</span></ins>
                                        <del><span class="price-amount"><span class="currencySymbol">£</span>{{$deal->old_price}}</span></del>
                                    </div>
                                    <div class="slide-down-box">
                                        <p class="message">All products are carefully selected to ensure food safety.</p>
                                        <div class="buttons">
                                            <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                            <a href="#" class="btn add-to-cart-btn">add to cart</a>
                                            <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-8 col-md-7 col-sm-6">
                <div class="advance-product-box">
                    <div class="biolife-title-box bold-style biolife-title-box__bold-style">
                        <h3 class="title">@lang('Top Rated Products')</h3>
                    </div>
                    <ul class="products biolife-carousel eq-height-contain nav-center-03 nav-none-on-mobile row-space-29px" data-slick='{"rows":2,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":2,"responsive":[{"breakpoint":1200,"settings":{ "rows":2, "slidesToShow": 2}},{"breakpoint":992, "settings":{ "rows":2, "slidesToShow": 1}},{"breakpoint":768, "settings":{ "rows":2, "slidesToShow": 2}},{"breakpoint":500, "settings":{ "rows":2, "slidesToShow": 1}}]}'>
                        @foreach($top_products as $top_product)
                        <li class="product-item">
                            <div class="contain-product right-info-layout contain-product__right-info-layout">
                                <div class="product-thumb">
                                    <a href="#" class="link-to-product">
                                        <img src="{{asset(explode('|',$top_product->image)[0])}}" alt="dd" width="270" height="270" class="product-thumnail">
                                    </a>
                                </div>
                                <div class="info">
                                    <b class="categories">{{$top_product->category->name}}</b>
                                    <h4 class="product-title"><a href="" class="pr-name">{{$top_product->name}}</a></h4>
                                    <div class="price ">
                                        <ins><span class="price-amount"><span class="currencySymbol">£</span>{{$top_product->new_price}}</span></ins>
                                        <del><span class="price-amount"><span class="currencySymbol">£</span>{{$top_product->old_price}}</span></del>
                                    </div>
                                    <div class="rating">
                                        <p class="star-rating"><span class="width-80percent"></span></p>
                                        <span class="review-count">(05 Reviews)</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <!-- <div class="biolife-banner style-01 biolife-banner__style-01 xs-margin-top-80px-im sm-margin-top-30px-im">
                        <div class="banner-contain">
                            <a href="#" class="bn-link"></a>
                            <div class="text-content">
                                <span class="first-line">Daily Fresh</span>
                                <b class="second-line">Natural</b>
                                <i class="third-line">Fresh Food</i>
                                <span class="fourth-line">Premium Quality</span>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>

<!--Block 07: Brands-->
<div class="brand-slide sm-margin-top-100px background-fafafa xs-margin-top-80px xs-margin-bottom-80px">
    <div class="container">
        <ul class="biolife-carousel nav-center-bold nav-none-on-mobile" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3}},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":10}},{"breakpoint":450, "settings":{ "slidesToShow": 1, "slidesMargin":10}}]}'>
            @foreach($partiners as $partiner)
            <li>
                <div class="biolife-brd-container">
                    <a href="{{$partiner->links}}" class="link">
                        <figure><img src="{{asset($partiner->logo)}}" width="200" height="120" alt="Partners Logo"></figure>
                    </a>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>

<!--Block 08: Blog Posts-->
<div class="blog-posts sm-margin-top-93px sm-padding-top-72px xs-padding-bottom-50px">
    <div class="container">
        <div class="biolife-title-box">
            <span class="subtitle">@lang('The freshest and most exciting news')</span>
            <h3 class="main-title">@lang('From the Blog')</h3>
        </div>
        <ul class="biolife-carousel nav-center nav-none-on-mobile xs-margin-top-36px" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":3, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 3}},{"breakpoint":992, "settings":{ "slidesToShow": 2}},{"breakpoint":768, "settings":{ "slidesToShow": 2}},{"breakpoint":600, "settings":{ "slidesToShow": 1}}]}'>
            @foreach($blog_posts as $blog_post)
            <li>
                <div class="post-item effect-01 style-bottom-info layout-02 ">
                    <div class="thumbnail">
                        <a href="" class="link-to-post"><img src="{{asset($blog_post->image)}}" width="370" height="270" alt=""></a>
                    </div>
                    <div class="post-content">
                        <h4 class="post-name"><a href="#" class="linktopost">{{$blog_post->name}}</a></h4>
                        <div class="post-meta">
                            <a href="#" class="post-meta__item author">
                            @if(1==0)
                                <img src="" width="28" height="28" alt="">
                            @else
                            <img src="assets/images/home-03/post-author.png" width="28" height="28" alt="">
                            @endif
                                <span>{{$blog_post->auth_name}}</span></a>
                            <a href="#" class="post-meta__item btn liked-count">2<span class="biolife-icon icon-comment"></span></a>
                            <a href="#" class="post-meta__item btn comment-count">6<span class="biolife-icon icon-like"></span></a>
                            <div class="post-meta__item post-meta__item-social-box">
                                <span class="tbn"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
                                <div class="inner-content">
                                    <ul class="socials">
                                        <li><a href="#" title="twitter" class="socail-btn"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#" title="facebook" class="socail-btn"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#" title="pinterest" class="socail-btn"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                        <li><a href="#" title="youtube" class="socail-btn"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                        <li><a href="#" title="instagram" class="socail-btn"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <p class="excerpt">{{!! $blog_post->details !!}}</p>
                        <div class="group-buttons">
                            <a href="" class="btn readmore">continue reading</a>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>

@endsection