@extends('admin.layouts.app')
@section('content')

<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-body">
        <table class="table card-body" style="margin-top: 34px;">
          <thead>
            <tr>
              <th scope="col" style="width: 79px;">SL</th>
              <th scope="col">Name <small class="text-muted">SKU</small></th>
              <th scope="col">Price</th>
              <th scope="col">Stock</th>
              <th scope="col" style="width: 100px;">Status</th>
              <th scope="col" class="widgth-120">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $product)
            <tr>
              <th scope="row">{{ ++$loop->index}}</th>
              <td>{{ $product->name}}<small class="text-muted">  SKU:{{ $product->sku}}</small></td>
              <td>{{ $product->new_price}}</td>
              <td>{{ $product->quantity}}</td>
              <td>
                @if($product->status == 1)
                  @lang('Active')
                @else
                  @lang('Inactive')
                @endif
              </td>
              <td>
                <a href="{{url('/admin/product/edit/'.$product->id)}}" class="edit" ><i
                    class="fa fa-edit"></i></a>
                <a href="{{url('/admin/product/delete/'.$product->id)}}" class="delete" OnClick='return (confirm("Are you sure Delete {{ $product->name}}"));'><i
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





@endsection
@push('breadcrumb')

<a href="{{route('admin.products.create')}}" class="btn btn-primary" style="float: right;" >
@lang('Add New Product')
</a>


@endpush
