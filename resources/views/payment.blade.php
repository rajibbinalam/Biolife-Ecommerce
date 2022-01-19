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


    <button class="your-button-class" id="sslczPayBtn"
        token="if you have any token validation"
        postdata="your javascript arrays or objects which requires in backend"
        order="If you already have the transaction generated for current order"
        endpoint="/pay-via-ajax"> Pay Now
</button>

    <div class="page-contain checkout">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-lg-6 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                                <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                    <li class="nav-item">
                                        <a data-toggle="pill" href="#credit-card" class="nav-link active ">
                                            <i class="fas fa-credit-card mr-2"></i>
                                            Credit Card
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="pill" href="#paypal" class="nav-link ">
                                            <i class="far fa-handshake"></i>
                                            Cash On Delivery
                                        </a>
                                        </li>
                                    <li class="nav-item"> <a data-toggle="pill" href="#net-banking"
                                            class="nav-link "> <i class="fas fa-mobile-alt mr-2"></i> Net Banking </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div id="credit-card" class="tab-pane fade show active pt-3">
                                    <form role="form" onsubmit="event.preventDefault()">
                                        <div class="form-group"> <label for="username">
                                                <h6>Card Owner</h6>
                                            </label> <input type="text" name="username" placeholder="Card Owner Name"
                                                required class="form-control "> </div>
                                        <div class="form-group"> <label for="cardNumber">
                                                <h6>Card number</h6>
                                            </label>
                                            <div class="input-group"> <input type="text" name="cardNumber"
                                                    placeholder="Valid card number" class="form-control " required>
                                                <div class="input-group-append"> <span class="input-group-text text-muted">
                                                        <i class="fab fa-cc-visa mx-1"></i> <i
                                                            class="fab fa-cc-mastercard mx-1"></i> <i
                                                            class="fab fa-cc-amex mx-1"></i> </span> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="form-group"> <label><span class="hidden-xs">
                                                            <h6>Expiration Date</h6>
                                                        </span></label>
                                                    <div class="input-group"> <input type="number" placeholder="MM"
                                                            name="" class="form-control" required> <input type="number"
                                                            placeholder="YY" name="" class="form-control" required> </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-4"> <label data-toggle="tooltip"
                                                        title="Three digit CV code on the back of your card">
                                                        <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                    </label> <input type="text" required class="form-control"> </div>
                                            </div>
                                        </div>
                                        <div class="card-footer"> <button type="button"
                                                class="subscribe btn btn-primary btn-block shadow-sm"> Confirm Payment
                                            </button>
                                    </form>
                                </div>
                            </div>
                            <div id="paypal" class="tab-pane fade pt-3">
                                <h6 class="pb-2">Cash On Delivery</h6>
                                <p class="text-muted"> Note: After clicking on the button, you will be directed to a
                                    secure gateway for payment. After completing the payment process, you will be redirected
                                    back to the website to view details of your order. 
                                </p>
                                <p>
                                    <button type="button" class="btn btn-primary ">Confirm Order</button>
                                </p>
                            </div>
                            <div id="net-banking" class="tab-pane fade pt-3">
                                <div class="form-group "> <label for="Select Your Bank">
                                        <h6>Select your Mobile Banking</h6>
                                    </label> <select class="form-control" id="ccmonth">
                                        <option value="" selected disabled>Mobile Banking</option>
                                        <option>Bkash</option>
                                        <option>Nagad</option>
                                        <option>Upay</option>
                                        <option>DBBL Mobile</option>
                                        <option>Nexus</option>
                                    </select> </div>
                                <div class="form-group">
                                    <p> <button type="button" class="btn btn-primary "><i
                                                class="fas fa-mobile-alt mr-2"></i> Proceed Payment</button> </p>
                                </div>
                                <p class="text-muted">Note: After clicking on the button, you will be directed to a
                                    secure gateway for payment. After completing the payment process, you will be redirected
                                    back to the website to view details of your order. </p>
                            </div> <!-- End -->
                            <!-- End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
