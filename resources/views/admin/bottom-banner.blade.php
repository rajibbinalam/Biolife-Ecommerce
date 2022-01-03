@extends('admin.layouts.app')
@section('content')

<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-body">
        <table id="data_table" class="table card-body">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">First Tag</th>
              <th scope="col">Second Tag</th>
              <th scope="col">price</th>
              <th scope="col">Image</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($banners as $banner)
            <tr>
              <th scope="row">{{ ++$loop->index}}</th>
              <td>{{ $banner->name}}</td>
              <td>{{ $banner->first_tag_line}}</td>
              <td>{{ $banner->second_tag_line}}</td>
              <td>{{ $banner->price}}</td>
              <td><img src="{{ $banner->image}}" height="45px" width="100px" alt="Bottom Banner image"></td>
              <td>
                <a href="{{url('/admin/bottom-banner/edit/'.$banner->id)}}" style="color: white; background-color: #00a65a; padding: 8px; border-radius: 24px;" ><i class="fa fa-edit"></i></a>
                <a href="{{url('/admin/bottom-banner/delete/'.$banner->id)}}" style="color: white; background-color: #ff0000; padding: 8px; border-radius: 24px;" OnClick='return (confirm("Are you sure Delete Bottom Banner {{ $banner->name}}"));'><i class="fa fa-trash"></i></a>
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
        <h4 class="modal-title" id="exampleModalLabel">@lang('Add New Top Banner')</h4>
        <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('admin.bottombannerinsert')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Banner Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputPassword1">First Tag Line</label>
            <input type="text" class="form-control @error('first_tag_line') is-invalid @enderror" name="first_tag_line" id="exampleInputPassword1" placeholder="First Tag Line">
            @error('first_tag_line')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputPassword1">Second Tag Line</label>
            <input type="text" class="form-control @error('second_tag_line') is-invalid @enderror" name="second_tag_line" id="exampleInputPassword1" placeholder="Second Tag Line">
            @error('second_tag_line')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputPassword1">Price</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="exampleInputPassword1" placeholder="Price">
            @error('price')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="exampleFormControlFile1">Banner Image</label>
            <input type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" id="exampleFormControlFile1">
            @error('image')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <input type="hidden" value="{{auth()->guard('admin')->user()->name}}" name="add_by" id="">
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

<button type="button" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#exampleModalCenter">
  @lang('Add Bottom Banner')
</button>


@endpush