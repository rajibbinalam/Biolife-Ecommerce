@extends('partials.app')

@section('content')
<div class="container">
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="{{route('home')}}" class="permal-link">Home</a></li>
            <li class="nav-item"><span class="current-page">ShoppingCart</span></li>
        </ul>
    </nav>
</div>

<div class="page-contain checkout">

    <!-- Main content -->
    <div id="main-content" class="main-content">
        <div class="container sm-margin-top-37px">
            <div class="row">

                <!--checkout progress box-->
                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                    <div class="checkout-progress-wrap">
                        <ul class="steps">
                            <li class="step 1st">
                                <div class="checkout-act active">
                                    <h3 class="title-box"><span class="number">1</span>Customer</h3>
                                    <div class="box-content">
                                        <p class="txt-desc">Checking out as a <a class="pmlink" href="#">Guest?</a> You’ll be able to save your details to create an account with us later.</p>
                                        <div class="login-on-checkout">
                                            @guest
                                            <form action="" name="frm-login" method="post">
                                                @csrf
                                                <p class="form-row">
                                                    <label for="input_email">Email Address</label>
                                                    <input type="email" name="email" id="input_email" value="" placeholder="Your email">
                                                    <button type="submit" name="btn-sbmt" class="btn">Continue As Guest</button>
                                                </p>
                                                <p class="form-row">
                                                    <input type="checkbox" name="subcribe" id="input_subcribe" >
                                                    <label for="input_subcribe">Subscribe to our newsletter</label>
                                                </p>
                                                <p class="msg">Already have an account? <a href="{{url('/login')}}" class="link-forward">Sign in now</a></p>
                                            </form>
                                            @else
                                            @endguest
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="step 2nd">
                                <div class="checkout-act"><h3 class="title-box"><span class="number">2</span>Shipping</h3></div>
                            </li>
                            <li class="step 3rd">
                                <div class="checkout-act"><h3 class="title-box"><span class="number">3</span>Billing</h3></div>
                            </li>
                            <li class="step 4th">
                                <div class="checkout-act"><h3 class="title-box"><span class="number">4</span>Payment</h3></div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!--Order Summary-->
                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 sm-padding-top-48px sm-margin-bottom-0 xs-margin-bottom-15px">
                    <div class="order-summary sm-margin-bottom-80px">
                        <div class="title-block">
                            <h3 class="title">Order Summary</h3>
                             <a href="" class="link-forward">Edit Cart</a>
                        </div>
                        <div class="cart-list-box short-type">
                            <span class="number">{{$count}} items</span>
                            <ul class="cart-list">
                                @foreach ($carts as $cart)
                                    
                                <li class="cart-elem">
                                    <div class="cart-item">
                                        <a href="{{url('/cart-remove/'.$cart->rowId)}}" class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        <div class="product-thumb">
                                            
                                            <a class="prd-thumb" href="{{url('/product/'.$cart->id.'/'.$cart->name)}}">
                                                {{-- use $image = ; --}}
                                                <figure><img src="{{asset(explode('|',App\Models\Product::find($cart->id)->image)[0])}}" width="80" height="60" alt="shop-cart" ></figure>
                                            </a>
                                        </div>
                                        <div class="info">
                                            <span class="txt-quantity">{{$cart->qty}}X</span>
                                            <a href="{{url('/product/'.$cart->id.'/'.$cart->name)}}" class="pr-name">{{$cart->name}}</a>
                                        </div>
                                        <div class="price price-contain">
                                            <ins><span class="price-amount"><span class="currencySymbol">£</span> {{$cart->price}}</span></ins>
                                            {{-- <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del> --}}
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            <ul class="subtotal">
                                <li>
                                    <div class="subtotal-line">
                                        <b class="stt-name">Subtotal</b>
                                        <span class="stt-price">£{{$subTotal}}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="subtotal-line">
                                        <b class="stt-name">Shipping</b>
                                        <span class="stt-price">£00.00</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="subtotal-line">
                                        <b class="stt-name">Tax</b>
                                        <span class="stt-price">£{{$tex}}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="subtotal-line">
                                        <a href="#" class="link-forward">Promo/Gift Certificate</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="subtotal-line">
                                        <b class="stt-name">total:</b>
                                        <span class="stt-price">£{{$subTotal + $tex}}</span>
                                    </div>
                                </li>
                            </ul>
                            
                        </div>
                            <button type="submit" name="btn-sbmt" class="btn checkout-btn">Check Out</button>
                        

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection