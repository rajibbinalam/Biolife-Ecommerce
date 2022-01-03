@extends('admin.layouts.app')
@section('content')

<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-body">
        <table id="data_table" class="table card-body" style="margin-top: 34px;">
          <thead>
            <tr>
              <th scope="col" style="width: 79px;">SL</th>
              <th scope="col">Name</th>
              <th scope="col">SKU</th>
              <th scope="col" class="widgth-120">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($best_products as $best_product)
            <tr>
              <th scope="row">{{ ++$loop->index}}</th>
              <td>{{ $best_product->product->name}}</td>
              <td>{{ $best_product->product->sku}}</td>
              <td>
                <a href="{{url('/admin/brand/delete/')}}" class="delete"
                  OnClick='return (confirm("Are you sure Delete"));'><i
                    class="fa fa-trash"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">@lang('Add Product')</h4>
        <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  action="{{route('admin.bestSellerIput')}}" id="form" method="POST">
          @csrf

            <div class="form-group col-md-6">
                <label for="exampleFormControlSelect1">Select Product</label>
                <select class="form-control" name="best_product_id">
                <option value="">Select Product</option>
                @foreach($products as $product)
                <option value="{{ $product->id}}">{{ $product->name}} sku:{{ $product->sku}}</option>
                @endforeach
                </select>
                <input type="hidden" name="add_by" id="" value="{{auth()->guard('admin')->user()->name}}">
            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
        <button type="submit" form="form" class="btn btn-primary">@lang('Save')</button>
      </div>
    </div>
  </div>
</div>


@endsection

@push('breadcrumb')

<button type="button" class="btn btn-primary" style="float: right;" data-toggle="modal"
  data-target="#exampleModalCenter">
@lang('Add Product')
</button>


@endpush