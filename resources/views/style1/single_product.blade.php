@extends('partials.app')

@section('content')
 <!--Hero Section-->
 <div class="hero-section hero-background">
    <h1 class="page-title">Your Feavourite One</h1>
</div>

<!--Navigation section-->
<div class="container">
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="{{route('home')}}" class="permal-link">Home</a></li>
            <li class="nav-item"><span class="current-page">{{$single_product->name}}</span></li>
        </ul>
    </nav>
</div>
<div>
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
</div>

<div class="page-contain single-product">
    <div class="container">

        <!-- Main content -->
        <div id="main-content" class="main-content">
            
            <!-- summary info -->
            <div class="sumary-product single-layout">
                <div class="media">
                    <ul class="biolife-carousel slider-for" data-slick='{"arrows":false,"dots":false,"slidesMargin":30,"slidesToShow":1,"slidesToScroll":1,"fade":true,"asNavFor":".slider-nav"}'>
                        @if(isset($product_image[0]))
                            <li><img src="{{asset($product_image[0])}}" alt="Product Image" width="500" height="500"></li>
                        @endif
                        @if(isset($product_image[1]))
                            <li><img src="{{asset($product_image[1])}}" alt="Product Image" width="500" height="500"></li>
                        @endif
                        @if(isset($product_image[2]))
                            <li><img src="{{asset($product_image[2])}}" alt="Product Image" width="500" height="500"></li>
                        @endif
                        @if(isset($product_image[3]))
                            <li><img src="{{asset($product_image[3])}}" alt="Product Image" width="500" height="500"></li>
                        @endif
                        @if(isset($product_image[4]))
                            <li><img src="{{asset($product_image[4])}}" alt="Product Image" width="500" height="500"></li>
                        @endif
                        @if(isset($product_image[5]))
                            <li><img src="{{asset($product_image[5])}}" alt="Product Image" width="500" height="500"></li>
                        @endif
                    </ul>
                    <ul class="biolife-carousel slider-nav" data-slick='{"arrows":false,"dots":false,"centerMode":false,"focusOnSelect":true,"slidesMargin":10,"slidesToShow":4,"slidesToScroll":1,"asNavFor":".slider-for"}'>
                        @if(isset($product_image[0]))
                            <li><img src="{{asset($product_image[0])}}" alt="" width="88" height="88"></li>
                        @endif
                        @if(isset($product_image[1]))
                            <li><img src="{{asset($product_image[1])}}" alt="" width="88" height="88"></li>
                        @endif
                        @if(isset($product_image[2]))
                            <li><img src="{{asset($product_image[2])}}" alt="" width="88" height="88"></li>
                        @endif
                        @if(isset($product_image[3]))
                            <li><img src="{{asset($product_image[3])}}" alt="" width="88" height="88"></li>
                        @endif
                        @if(isset($product_image[4]))
                            <li><img src="{{asset($product_image[4])}}" alt="" width="88" height="88"></li>
                        @endif
                        @if(isset($product_image[5]))
                            <li><img src="{{asset($product_image[5])}}" alt="" width="88" height="88"></li>
                        @endif
                        
                    </ul>
                </div>

                <div class="product-attribute">
                    <h3 class="title">{{$single_product->name}}</h3>
                    <div class="rating">
                        <p class="star-rating"><span class="width-80percent"></span></p>
                        <span class="review-count">(04 Reviews)</span>
                        <span class="qa-text">Q&amp;A</span>
                        <b class="category">By: {{$single_product->added->name}}</b>
                    </div>
                    <span class="sku">Sku: {{$single_product->sku}}</span>
                    <p class="excerpt">{{ Str::limit(strip_tags(htmlspecialchars_decode($single_product->details)), 120, ' ...') }}</p>
                    <div class="price">
                        <ins>
                            <span class="price-amount"><span class="currencySymbol">Price : £</span>{{$single_product->new_price}}</span>
                        </ins>
                        <br><br><br>
                        
                    </div>
                    <br><br>
                    <div class="shipping-info" style="margin-top:20px; ">
                        <br>
                        <p class="shipping-day">3-Day Shipping</p>
                        <p class="for-today">Pree Pickup Today</p>
                    </div>
                </div>
                <div class="action-form">
                    <div class="quantity-box row">
                        
                        <div class="col-md-12">

                            <form action="{{route('addToCart')}}" id="form" method="post">
                                @csrf
                                <span class="title">Quantity: ( {{$single_product->quantity}} Item in stock)</span>
                                <div class="col-md-12">
                                    <input class="quantity" type="number" value="1" name="quantity">
                                </div>
                                <input type="hidden" value="{{$single_product->id}}" name="pid">
                                <input type="hidden" value="{{$single_product->name}}" name="name">
                                <input type="hidden" value="{{$single_product->new_price}}" name="new_price">
                                <input type="hidden" value="{{$single_product->image}}" name="imgae[]">
                                {{-- <label>Select Size</label> --}}
                                <div class="col-md-6">
                                    <label for="">Size: </label>
                                    <select name="size" class="form-control">
                                        <option value="">Available Size</option>
                                        @foreach ($product_size as $p_size)
                                            <option value="{{$p_size}}">{{$p_size}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Color: </label>
                                    <select name="colors" class="form-control">
                                        <option value="">Available Color</option>
                                        @foreach ($product_color as $p_color)
                                            <option value="{{$p_color}}">{{$p_color}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <br> --}}
                                <hr>
                                <br>
                                <div class="">
                                    <button type="submit" form="form" class="btn add-cart-btn">add to cart</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="buttons">
                        <p class="pull-row">
                            <a href="" class="btn wishlist-btn">wishlist</a>
                            <a href="" class="btn compare-btn">compare</a>
                        </p>
                    </div>
                    <div class="acepted-payment-methods">
                        <ul class="payment-methods">
                            <li><img src="assets/images/card1.jpg" alt="" width="51" height="36"></li>
                            <li><img src="assets/images/card2.jpg" alt="" width="51" height="36"></li>
                            <li><img src="assets/images/card3.jpg" alt="" width="51" height="36"></li>
                            <li><img src="assets/images/card4.jpg" alt="" width="51" height="36"></li>
                        </ul>
                    </div>
                </div>


            </div>

            <!-- Tab info -->
            <div class="product-tabs single-layout biolife-tab-contain">
                <div class="tab-head">
                    <ul class="tabs">
                        <li class="tab-element active"><a href="#tab_1st" class="tab-link">Products Descriptions</a></li>
                        <li class="tab-element" ><a href="#tab_2nd" class="tab-link">Addtional information</a></li>
                        <li class="tab-element" ><a href="#tab_3rd" class="tab-link">Shipping & Delivery</a></li>
                        <li class="tab-element" ><a href="#tab_4th" class="tab-link">Customer Reviews <sup>(3)</sup></a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div id="tab_1st" class="tab-contain desc-tab active">
                        <p class="desc"> 
                            @php
                                echo $single_product->details;
                            @endphp
                        
                        </p>
                    </div>
                    <div id="tab_2nd" class="tab-contain addtional-info-tab">
                        <table class="tbl_attributes">
                            <tbody>
                            <tr>
                                <th>Brand</th>
                                <td><p>{{$single_product->brand->name}}</p></td>
                            </tr>
                            <tr>
                                <th>Size</th>
                                <td><p>{{$single_product->size}}</p></td>
                            </tr>
                            <tr>
                                <th>Colors</th>
                                <td><p>{{$single_product->colors}}</p></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="tab_3rd" class="tab-contain shipping-delivery-tab">
                        <div class="accodition-tab biolife-accodition">
                            <p>@php
                                echo App\Models\ReturnPolicy::first()->descriptions;
                            @endphp</p>
                        </div>
                    </div>
                    <div id="tab_4th" class="tab-contain review-tab">
                        <div class="container">
                            <div class="row">
                                
                                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                    <div class="rating-info">
                                        <p class="index"><strong class="rating">4.4</strong>out of 5</p>
                                        <div class="rating"><p class="star-rating"><span class="width-80percent"></span></p></div>
                                        <p class="see-all">See all 68 reviews</p>
                                        <ul class="options">
                                            <li>
                                                <div class="detail-for">
                                                    <span class="option-name">5stars</span>
                                                    <span class="progres">
                                                        <span class="line-100percent"><span class="percent width-90percent"></span></span>
                                                    </span>
                                                    <span class="number">90</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="detail-for">
                                                    <span class="option-name">4stars</span>
                                                    <span class="progres">
                                                        <span class="line-100percent"><span class="percent width-30percent"></span></span>
                                                    </span>
                                                    <span class="number">30</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="detail-for">
                                                    <span class="option-name">3stars</span>
                                                    <span class="progres">
                                                        <span class="line-100percent"><span class="percent width-40percent"></span></span>
                                                    </span>
                                                    <span class="number">40</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="detail-for">
                                                    <span class="option-name">2stars</span>
                                                    <span class="progres">
                                                        <span class="line-100percent"><span class="percent width-20percent"></span></span>
                                                    </span>
                                                    <span class="number">20</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="detail-for">
                                                    <span class="option-name">1star</span>
                                                    <span class="progres">
                                                        <span class="line-100percent"><span class="percent width-10percent"></span></span>
                                                    </span>
                                                    <span class="number">10</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                @guest
                                @else
                                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                                    <div class="review-form-wrapper">
                                        
                                        <span class="title">Submit your review</span>
                                        <form action="{{route('productReview')}}" name="frm-review" method="post">
                                            @csrf
                                            <div class="comment-form-rating">
                                                <p style="display: inline-block; ">1. Your rating of this products:</p>
                                                <div class="rate bg-success py-3 text-white mt-3">
                                                    <div class="rating">
                                                        <input type="radio" name="star" value="5" id="5"><label for="5">☆</label>
                                                        <input type="radio" name="star" value="4" id="4"><label for="4">☆</label>
                                                        <input type="radio" name="star" value="3" id="3"><label for="3">☆</label>
                                                        <input type="radio" name="star" value="2" id="2"><label for="2">☆</label>
                                                        <input type="radio" name="star" value="1" id="1"><label for="1">☆</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}" id="">
                                            <input type="hidden" name="product_id" value="{{$single_product->id}}" id="">
                                            <p class="form-row">
                                                <textarea name="comment" id="txt-comment" cols="30" rows="10" placeholder="Write your review here..."></textarea>
                                            </p>
                                            <p class="form-row">
                                                <button type="submit" name="submit">Submit Review</button>
                                            </p>
                                        </form>
                                        
                                    </div>
                                </div>
                                @endguest
                            </div>
                            <div id="comments">
                                <ol class="commentlist">
                                    <li class="review">
                                        <div class="comment-container">
                                           
                                                
                                            <div class="row">
                                                <div class="comment-content col-lg-8 col-md-9 col-sm-8 col-xs-12">

                                                    <p class="comment-in"><span class="post-name">Quality is our way of life</span></p>
                                                    @foreach ($product_reviews as $product_review)
                                                        <div class="stars text-center">
                                                            @if ($product_review->star == 5)
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            @endif
                                                            @if ($product_review->star == 4)
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            @endif
                                                            @if ($product_review->star == 3)
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            @endif
                                                            @if ($product_review->star == 2)
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            @endif
                                                            @if ($product_review->star == 1)
                                                                <i class="fa fa-star"></i>
                                                            @endif
                                                            
                                                        </div>
            
                                                        {{-- <div class="rating">
                                                            <p class="star-rating">
                                                                <span class="width-80percent"></span>
                                                            </p>
                                                        </div> --}}
                                                        <p class="author">by: <b>{{$product_review->user->name}}</b>
                                                            <span style="font-size: 11px; margin-left: 10px;" class="post-date">{{ $product_review->created_at->format('d-M-Y') }}</span></p>
                                                        <p class="comment-text">{{$product_review->comment}}</p>
                                                    @endforeach
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </li>
                                </ol>

                                {{-- <div class="biolife-panigations-block version-2">
                                    <ul class="panigation-contain">
                                        <li><span class="current-page">1</span></li>
                                        <li><a href="#" class="link-page">2</a></li>
                                        <li><a href="#" class="link-page">3</a></li>
                                        <li><span class="sep">....</span></li>
                                        <li><a href="#" class="link-page">20</a></li>
                                        <li><a href="#" class="link-page next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                    </ul>
                                    <div class="result-count">
                                        <p class="txt-count"><b>1-5</b> of <b>126</b> reviews</p>
                                        <a href="#" class="link-to">See all<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                    </div>
                                </div> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- related products -->
            <div class="product-related-box single-layout">
                <div class="biolife-title-box lg-margin-bottom-26px-im">
                    <span class="biolife-icon icon-organic"></span>
                    <span class="subtitle">All the best item for You</span>
                    <h3 class="main-title">Related Products</h3>
                </div>
                <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":0,"slidesToShow":5, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":20 }},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":10}}]}'>
                    @foreach ($releted_products as $releted_product)
                        <li class="product-item">
                            <div class="contain-product layout-default">
                                <div class="product-thumb">
                                    <a href="{{url('/product/'.$releted_product->id.'/'.$releted_product->name)}}" class="link-to-product">
                                        <img src="{{asset(explode('|',$releted_product->image)[0])}}" alt="dd" width="270" height="270" class="product-thumnail">
                                    </a>
                                </div>
                                <div class="info">
                                    <b class="categories">{{$releted_product->category->name}}</b>
                                    <h4 class="product-title"><a href="{{url('/product/'.$releted_product->id.'/'.$releted_product->name)}}" class="pr-name">{{$releted_product->name}}</a></h4>
                                    <div class="price">
                                        <ins><span class="price-amount"><span class="currencySymbol">£</span>{{$releted_product->new_price}}</span></ins>
                                        <del><span class="price-amount"><span class="currencySymbol">£</span>{{$releted_product->old_price}}</span></del>
                                    </div>
                                    <div class="slide-down-box">
                                        <p class="message">All products are carefully selected to ensure food safety.</p>
                                        <div class="buttons releted-product-btn">
                                            <form action="{{route('addWishlist')}}" method="POST">
                                                @csrf
                                                @if(isset(Auth::user()->id))
                                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" id="">
                                                @endif
                                                <input type="hidden" name="product_id" value="{{$releted_product->id}}" id="">
                                                <button class="wishlist-button" type="submit"><i class="fa fa-heart" aria-hidden="true"></i></button>
                                            </form>
                                            {{-- <a href="" style="color: #333;" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a> --}}
                                            
                                            <form action="{{route('addToCart')}}" method="post">
                                                @csrf
                                                <input type="hidden" value="{{$releted_product->id}}" name="pid">
                                                <input type="hidden" value="{{$releted_product->name}}" name="name">
                                                <input type="hidden" value="{{$releted_product->new_price}}" name="new_price">
                                                <input type="hidden" value="{{$releted_product->image}}" name="imgae[]">
                                                <input type="hidden" value="1" name="quantity">
                                                <input type="hidden" value="" name="size">
                                                <div class="cart-btn-div">
                                                    <button type="submit" class="btn releted-product-add-to-cart">@lang('add to cart')</button>
                                                </div>
                                                {{-- <a href="" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a> --}}

                                            </form>
                                            
                                            <a href="" style="color: #333;" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>
            
        </div>
    </div>
</div>

@endsection