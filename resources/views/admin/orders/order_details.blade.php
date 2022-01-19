@extends('admin.layouts.app')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-body">
        <div class="col-md-6">
          <a href="{{route('admin.allOrder')}}" class="btn btn-primary">All Product</a>
          <br>
          <div class="card">
            <div class="card-header">
              <h4><strong>Order Details</strong></h4>
            </div>
            <div class="card-body col-md-4">
                <h5><strong> Product Name</strong></h5>
                <h5><strong> Order Number</strong></h5>
                <h5><strong> Total Product</strong></h5>
                <h5><strong> Total Cost</strong></h5>
                <h5><strong> Size      </strong></h5>
                <h5><strong> Color</strong></h5>
                <h5><strong> Order Date</strong></h5>
                <h5><strong> Payment Status</strong></h5>
            </div>
            <div class="col-md-2">
                <h5><strong>:</strong></h5>
                <h5><strong>:</strong></h5>
                <h5><strong>:</strong></h5>
                <h5><strong>:</strong></h5>
                <h5><strong>:</strong></h5>
                <h5><strong>:</strong></h5>
                <h5><strong>:</strong></h5>
                <h5><strong>:</strong></h5>
            </div>
            <div class="col-md-6">
                <h5> {{$view->product->name}}</h5>
                <h5> {{$view->order_number}}</h5>
                <h5> {{$view->quantity}}</h5>
                <h5> {{$view->total_cost}}</h5>
                <h5> {{$view->size}}</h5>
                <h5> {{$view->color}}</h5>
                <h5> {{$view->created_at->format('d-M-Y')}}</h5>
                <h5> {{$view->payment_status}}</h5>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <br>
          <div class="card">
            <div class="card-header">
                <strong>Shipping Details</strong>
            </div>
            <div class="card-body col-md-4">
                <h5><strong>Name</strong></h5>
                <h5><strong>Email</strong></h5>
                <h5><strong>Phone</strong></h5>
                <h5><strong>District</strong></h5>
                <h5><strong>Zip</strong></h5>
                <h5><strong>Address</strong></h5>
            </div>
            <div class="col-md-2">
                <h5><strong>:</strong></h5>
                <h5><strong>:</strong></h5>
                <h5><strong>:</strong></h5>
                <h5><strong>:</strong></h5>
                <h5><strong>:</strong></h5>
                <h5><strong>:</strong></h5>
            </div>
            <div class="col-md-6">
                <h5>{{$view->user->name}}</h5>
                <h5>{{$view->user->email}}</h5>
                <h5>{{$view->user->phone}}</h5>
                <h5>{{$view->user->district}}</h5>
                <h5>{{$view->user->zip}}</h5>
                <h5>{{$view->user->address}}</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('breadcrumb')
<a href="{{url('/admin/order/invoice/'.$view->id)}}" class="btn btn-warning" style="float: right;" > @lang('View Invoice')</a>

@endpush