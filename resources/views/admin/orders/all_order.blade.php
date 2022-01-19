@extends('admin.layouts.app')
@section('content')

<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-body">
        <table id="data_table" class="table card-body" style="margin-top: 34px;">
          <thead>
            <tr>
              <th scope="col" style="width: 79px;">Customer</th>
              <th scope="col">Name <small class="text-muted">Order Number</small></th>
              <th scope="col">Price</th>
              <th scope="col">Quantity</th>
              <th scope="col" class="widgth-50">Status</th>
              <th scope="col" class="widgth-60">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
            <tr>
              <th scope="row">{{ $order->user->name}}</th>
              <td>{{ $order->product->name}}<small class="text-muted">  {{ $order->order_number}}</small></td>
              <td>${{ $order->total_cost}}</td>
              <td>{{ $order->quantity}}</td>
              <td>
                <form action="{{url('/admin/order/status/update/'.$order->id)}}" method="post">
                  @csrf
                  <label class="switch">
                      <input type="hidden" name="status" value="@if($order->status == 1) 0 @else 1 @endif">
                    <button type="submit" class="check-submit">
                      <input type="checkbox" @if($order->status == 1) checked @else @endif>
                      <span class="slider round"></span>
                    </button>
                  </label>
                </form>
                
              </td>
              <td>
                <a href="{{url('/admin/order/view/'.$order->id)}}" class="edit" ><i class="fa fa-eye"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
@push('breadcrumb')
<a href="" class="btn btn-warning" style="float: right;" > @lang('Export Data')</a>

@endpush
