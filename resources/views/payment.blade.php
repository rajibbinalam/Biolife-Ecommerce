@extends('partials.app')

@section('content')
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="{{ route('home') }}" class="permal-link">Home</a></li>
                <li class="nav-item"><span class="current-page">ShoppingCart</span></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain checkout">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your cart</span>
                        <span class="badge badge-secondary badge-pill">{{Cart::count()}}</span>
                    </h4>
                    <ul class="list-group mb-3">
                        @foreach (Cart::content() as $cart)
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Product name</h6>
                                    <small class="text-muted">{{$cart->name}}</small>
                                </div>
                                <span class="text-muted">£{{$cart->price}}</span>
                            </li>
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total</span>
                            <strong>£{{Cart::subtotal() }}</strong>
                        </li>
                    </ul>
                    <button type="submit" class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                                token="if you have any token validation"
                                postdata="your javascript arrays or objects which requires in backend"
                                order="If you already have the transaction generated for current order"
                                endpoint="{{ url('/pay-via-ajax') }}"> Pay Now
                        </button>
                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Billing address</h4>
                    <form method="POST" action="{{url('/customer/update-billing/'.Auth::user()->id)}}" class="needs-validation" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="firstName">Full name</label>
                                <input type="text" name="name" class="form-control" id="customer_name" placeholder=""
                                       value="{{Auth::user()->name}}" required>
                                <div class="invalid-feedback">
                                    Valid customer name is required.
                                </div>
                            </div>
                        </div>
        
                        <div class="mb-3">
                            <label for="mobile">Mobile</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+88</span>
                                </div>
                                <input type="text" name="phone" class="form-control" id="mobile" placeholder="Mobile"
                                       value="{{Auth::user()->phone}}" required>
                                <div class="invalid-feedback" style="width: 100%;">
                                    Your Mobile number is required.
                                </div>
                            </div>
                        </div>
        
                        <div class="mb-3">
                            <label for="email">Email <span class="text-muted">(Optional)</span></label>
                            <input type="email" name="email" class="form-control" id="email"
                                   placeholder="you@example.com" value="{{Auth::user()->email}}" required>
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>
        
                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="1234 Main St"
                                   value="{{Auth::user()->address}}" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>
        
                        <div class="mb-3">
                            <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                            <input type="text" name="address2" class="form-control" id="address2" placeholder="Apartment or suite">
                        </div>
        
                        <div class="row">
                            <div class="form gorup col-md-4 mb-3">
                                <label for="state">State</label>
                                <select class="form-control d-block w-100" id="state" required>
                                    <option value="">Choose...</option>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Dhaka">Rajshahi</option>
                                    <option value="Dhaka">Khulna</option>
                                    <option value="Dhaka">Chattagram</option>
                                    <option value="Dhaka">Sylhet</option>
                                    <option value="Dhaka">Rangpur</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="zip">Zip</label>
                                <input type="text" class="form-control" id="zip" value="{{Auth::user()->zip}}" placeholder="" required>
                                <div class="invalid-feedback">
                                    Zip code required.
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="save-info">
                            <label class="custom-control-label" for="save-info">Save this information for next time</label>
                        </div>
                        <hr class="mb-4">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>

    @endsection
