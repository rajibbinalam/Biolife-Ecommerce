@extends('partials.app')

@section('content')
<!--Hero Section-->
<div class="hero-section hero-background">
    <h1 class="page-title">Find Your Favourite Products</h1>
</div>

<!--Navigation section-->
<div class="container">
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="{{route('home')}}" class="permal-link">Home</a></li>
            <li class="nav-item"><span class="current-page">Fresh Fruit</span></li>
        </ul>
    </nav>
</div>

<div class="page-contain category-page no-sidebar" style="padding-bottom: 38px;">
    <div class="container">
        <div class="row">

            <!-- Main content -->
            <div id="main-content" class="main-content col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="product-category grid-style">

                    <div id="top-functions-area" class="top-functions-area" >
                        <div class="flt-item to-left group-on-mobile">
                            <span class="flt-title">Refine</span>
                            
                            <div class="wrap-selectors">
                                <form action="#" name="frm-refine" method="get">
                                    <span class="title-for-mobile">Refine Products By</span>
                                    <div data-title="Price:" class="selector-item">
                                        <select name="price" class="selector">
                                            <option value="all">Price</option>
                                            <option value="class-1st">Less than 5$</option>
                                            <option value="class-2nd">$5-10$</option>
                                            <option value="class-3rd">$10-20$</option>
                                            <option value="class-4th">$20-45$</option>
                                            <option value="class-5th">$45-100$</option>
                                            <option value="class-6th">$100-150$</option>
                                            <option value="class-7th">More than 150$</option>
                                        </select>
                                    </div>
                                    <div data-title="Brand:" class="selector-item">
                                        <select name="brad" class="selector">
                                            <option value="">Top Brands</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                       
                    </div>

                    <div class="row">
                        <ul class="products-list">
                            @foreach ($products as $product)
                                
                            
                                <li class="product-item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                    <div class="contain-product layout-default">
                                        <div class="product-thumb">
                                            <a href="{{url('/product/'.$product->id.'/'.$product->name)}}" class="link-to-product">
                                                <img src="{{asset(explode('|',$product->image)[0])}}" alt="product Image" width="270" height="270" class="product-thumnail">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <b class="categories">{{$product->category->name}}</b>
                                            <h4 class="product-title"><a href="{{url('/product/'.$product->id.'/'.$product->name)}}" class="pr-name">{{$product->name}}</a></h4>
                                            <div class="price">
                                                <ins><span class="price-amount"><span class="currencySymbol">£</span>{{$product->new_price}}</span></ins>
                                                <del><span class="price-amount"><span class="currencySymbol">£</span>{{$product->old_price}}</span></del>
                                            </div>
                                            <div class="shipping-info">
                                                <p class="shipping-day">3-Day Shipping</p>
                                                {{-- <p class="for-today">Pree Pickup Today</p> --}}
                                            </div>
                                            <div class="slide-down-box">
                                                <p class="message">All products are carefully selected to ensure food safety.</p>
                                                <div class="buttons">
                                                    <a href="" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                    <a href="" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                                    <a href="" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- <div class="biolife-panigations-block">
                        <ul class="panigation-contain">
                            <li><span class="current-page">1</span></li>
                            <li><a href="#" class="link-page">2</a></li>
                            <li><a href="#" class="link-page">3</a></li>
                            <li><span class="sep">....</span></li>
                            <li><a href="#" class="link-page">20</a></li>
                            <li><a href="#" class="link-page next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                        </ul>
                    </div> --}}

                </div>

            </div>

        </div>
    </div>
</div>
@endsection