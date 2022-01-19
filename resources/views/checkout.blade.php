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
                                <div class="checkout-act">
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
                            <li class="step 2nd row">
                                <div class="checkout-act col-md-6">
                                    <h3 class="title-box"><span class="number">2</span>Shipping Methods</h3>
                                </div>
                                <div class="fomt-control col-md-6">
                                    <select class="form-control" id="exampleFormControlSelect1">
                                    @foreach ($shipping_methods as $shipping_method)
                                        <option class="option" style="margin: 0 !important;" value="{{$shipping_method->id}}">{{$shipping_method->title}} + £ {{$shipping_method->price}}</option>
                                    @endforeach
                                </select>
                                </div>
                                
                            </li>
                            <li class="step 3rd">
                                <div class="checkout-act"><h3 class="title-box" style="margin-bottom: 20px;"><span class="number">3</span>Billing</h3></div>
                                <form action="{{url('/customer/update-billing/'.Auth::user()->id)}}" method="post">
                                    @csrf
                                    <div class="form-group col-md-6">
                                        <label for=""> Name</label>
                                        <input type="text" class="form-control" name="name" id="" value="{{Auth::user()->name}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for=""> Phone</label>
                                        <input type="text" class="form-control" name="phone" id="" value="{{Auth::user()->phone}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for=""> Email Address</label>
                                        <input type="email" class="form-control" name="email" id="" value="{{Auth::user()->email}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for=""> District</label>
                                        <input type="text" class="form-control" name="district" id="" value="{{Auth::user()->district}}">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="address">Billing Address</label>
                                        <textarea name="address" id="address" cols="80" rows="4" placeholder="Billing Address">{{Auth::user()->address}}</textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </li>
                            <li class="step 4th">
                                <div class="checkout-act"><h3 class="title-box" style="margin-top: 30px; "><span class="number">4</span>Let's Check Out</h3></div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!--Order Summary-->
                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 sm-padding-top-48px sm-margin-bottom-0 xs-margin-bottom-15px">
                    <div class="order-summary sm-margin-bottom-80px">
                        <div class="title-block">
                            <h3 class="title">Order Summary</h3>
                            
                             {{-- <a href="" class="link-forward">Edit Cart</a> --}}
                        </div>
                        <div class="cart-list-box short-type" style="margin: 14px 3px 12px 6px;">
                            <span class="number">{{$count}} items</span>
                            <div class="" style="display: block; float: right;">
                                <button type="submit" class="btn btn-primary" form="cartUpdate">Save</button>
                            </div>
                            <ul class="cart-list">
                                @foreach ($carts as $cart)
                                <li class="cart-elem">
                                    <div class="cart-item row">
                                        <a href="{{url('/cart-remove/'.$cart->rowId)}}" class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        <div class="product-thumb">
                                            
                                            <a class="prd-thumb" href="{{url('/product/'.$cart->id.'/'.$cart->name)}}">
                                                <figure><img src="{{asset(explode('|',App\Models\Product::find($cart->id)->image)[0])}}" width="80" height="60" alt="shop-cart" ></figure>
                                            </a>
                                        </div>
                                        <div class="info col-md-6">
                                            <form action="{{route('UpdateCart')}}" method="post" id="cartUpdate">
                                                @csrf
                                                <span class="txt-quantity">
                                                    <input type="number" class="form-control" name="quantity" value="{{$cart->qty}}">
                                                </span>
                                                <span class="txt-quantity">
                                                    <input type="hidden" class="form-control" name="size" value="{{$cart->options['size']}}">
                                                </span>
                                                <span class="txt-quantity">
                                                    <input type="hidden" class="form-control" name="colors" value="{{$cart->options['colors']}}">
                                                </span>
                                                <input type="hidden" value="{{$cart->id}}" name="pid">
                                                <input type="hidden" value="{{$cart->name}}" name="name">
                                                <input type="hidden" value="{{$cart->new_price}}" name="new_price">
                                                <input type="hidden" value="{{$cart->size}}" name="size">
                                                <input type="hidden" value="{{$cart->image}}" name="imgae[]">
                                            </form>
                                            <a href="{{url('/product/'.$cart->id.'/'.$cart->name)}}" class="pr-name">{{$cart->name}}</a>
                                        </div>
                                        <div class="price price-contain">
                                            <ins><span class="price-amount"><span class="currencySymbol">£</span> {{$cart->price}}</span></ins>
                                        </div>
                                    </div>
                                    
                                </li>
                                @endforeach
                                
                            </ul>
                            <ul class="subtotal">
                                <li>
                                    <div class="subtotal-line">
                                        <b class="stt-name">Subtotal</b>
                                        <span class="stt-price">£{{Cart::subtotal()}}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="subtotal-line">
                                        <b class="stt-name">Shipping</b>
                                        <span class="stt-price">£{{(int)$shipping = 10}}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="subtotal-line">
                                        <b class="stt-name">Tax</b>
                                        <span class="stt-price">£{{Cart::tax()}}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="subtotal-line">
                                        <a href="" class="link-forward">Promo/Gift</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="subtotal-line">
                                        <b class="stt-name">total:</b>
                                        <span class="stt-price">£{{Cart::subtotal() }}</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        
                        {{-- <button type="submit" name="btn-sbmt" form="checkOut" class="btn checkout-btn">Check Out</button> --}}
                        
                        <a class="btn checkout-btn" href="{{route('orderProduct')}}">Check Out</a>
                        {{-- <a href="{{route('paymentMethod')}}">Check Out</a> --}}
                            
                        

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection