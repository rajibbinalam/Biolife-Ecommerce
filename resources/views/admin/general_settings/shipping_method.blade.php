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
              <th scope="col">Title</th>
              <th scope="col">Price</th>
              <th scope="col">Duration</th>
              <th scope="col" class="widgth-120">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($shippings as $shipping)
            <tr>
              <th scope="row">{{ ++$loop->index}}</th>
              <td>{{ $shipping->title}}</td>
              <td>{{ $shipping->price}}</td>
              <td>{{ $shipping->duration}}</td>
              <td>
                <a href="{{url('/admin/shipping/delete/'.$shipping->id)}}" class="delete"
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
        <h4 class="modal-title" id="exampleModalLabel">@lang('Add New Brand')</h4>
        <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  action="{{route('admin.shippingMethodInsert')}}" id="form" method="POST">
          @csrf
          <div class="form-group">
            <label for="">@lang('Title')</label>
            <input type="text" class="form-control" name="title" required placeholder="Title">
            <input type="hidden" value="{{auth()->guard('admin')->user()->name}}" name="add_by" id="">
          </div>
          <div class="form-group">
            <label for="">@lang('Duration')</label>
            <input type="text" class="form-control" name="duration" required placeholder="Duration">
          </div>
          <div class="form-group">
            <label for="">@lang('Price')</label>
            <input type="text" class="form-control" name="price" required placeholder="Price">
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
@lang('Add New Method')
</button>


@endpush