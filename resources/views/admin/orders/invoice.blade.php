@extends('admin.layouts.app')
@section('content')
<div class="row" id="invoicePrint">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-body">
          <div class="col-md-12">
              <img src="{{asset($general->logo)}}" height="50" width="200" alt="">
              <br>
              <button type="submit" onclick="printme()" class="btn btn-warning" style="float: right;"><i class="fa fa-print"></i> @lang('Print Out')</button>
              {{-- <a href="" type="submit" onclick="printme()"    ></a> --}}
          </div>
          <div class="col-md-12">
              <h4><strong>Order Details</strong></h4><br>
              <div class="col-md-6">
                  <h5><strong> Order Number &emsp;&emsp;&emsp; : {{$invoice->order_number}}</strong></h5>
                  <h5><strong> Order Date &emsp;&emsp;&emsp;&emsp;&ensp; : {{$invoice->created_at->format('d-M-Y')}}</strong></h5>
                  <h5><strong> Shipping Method &emsp;&emsp;: 1</strong></h5>
                  <h5><strong> Payment Method &emsp;&emsp;: 1</strong></h5>
              </div>
          </div>
          <br>
        <div class="col-md-6">
          <br>
          <div class="card">
            <div class="card-header">
              <h4><strong>Product Details</strong></h4>
            </div>
            <div class="card-body col-md-12">
                <h5><strong> Product Name &emsp;&emsp;: {{$invoice->product->name}}</strong></h5>
                <h5><strong> Peoduct SKU &emsp;&emsp;&ensp;&nbsp;: {{$invoice->product->sku}}</strong></h5>
                <h5><strong> Total Product &emsp;&emsp;&nbsp; : {{$invoice->quantity}}</strong></h5>
                <h5><strong> Total Cost &emsp;&emsp;&emsp;&ensp;&ensp;: 	&pound;{{$invoice->total_cost}}</strong></h5>
                <h5><strong> Size &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;: {{$invoice->size}}</strong></h5>
                <h5><strong> Color &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: {{$invoice->color}}</strong></h5>
                <h5><strong> Brand Name &emsp;&emsp;&ensp;&ensp;: {{$invoice->product->brand->name}}</strong></h5>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <br>
          <div class="card">
            <div class="card-header">
                <strong>Shipping Details</strong>
            </div>
            <div class="card-body col-md-12">
                <h5><strong>Name &emsp;&emsp; : {{$invoice->user->name}}</strong></h5>
                <h5><strong>Email &emsp;&emsp; : {{$invoice->user->email}}</strong></h5>
                <h5><strong>Phone &emsp;&ensp;&nbsp; : {{$invoice->user->phone}}</strong></h5>
                <h5><strong>District &emsp;&nbsp; : {{$invoice->user->district}}</strong></h5>
                <h5><strong>Zip &emsp;&emsp;&emsp; : {{$invoice->user->zip}}</strong></h5>
                <h5><strong>Address &emsp; : {{$invoice->user->address}}</strong></h5>
            </div>
          </div>
        </div>
        <hr>
      
      <div class="total_Cost col-md-12">
        <strong style="float: right"> Total Bill : ${{$invoice->total_cost + 50 +10}}</strong>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('breadcrumb')
<a href="{{url('admin/order/view/'.$invoice->id)}}" class="btn btn-primary" style="float: right;">Back</a>

@endpush