@extends('admin.layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-body">
                <div class="col-md-3"></div>
                <div class="col-md-6 text-center">
                    <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                    <h2>{{auth()->guard('admin')->user()->name}}</h2>
                    <p>- Web Developer</p>
                    <div class="profile">
                        <h4>Name : {{auth()->guard('admin')->user()->name}}</h4>
                        <h4>Email : {{auth()->guard('admin')->user()->email}}</h4>
                        <h4>Phone : {{auth()->guard('admin')->user()->phone}}</h4>
                        <h4><a href="">Change Password</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">@lang('Add New Category')</h4>
          <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form  action="{{url('/admin/profile/update/'.auth()->guard('admin')->user()->id)}}" id="form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="">@lang('Name')</label>
              <input required type="text" class="form-control" name="name" value="{{auth()->guard('admin')->user()->name}}">
            </div>
            <div class="form-group">
              <label for="">@lang('Email')</label>
              <input type="email" class="form-control" name="email" value="{{auth()->guard('admin')->user()->email}}">
            </div>
            <div class="form-group">
              <label for="">@lang('Phone')</label>
              <input type="text" class="form-control" name="phone" value="{{auth()->guard('admin')->user()->phone}}">
              <input type="hidden" class="form-control" value="{{auth()->guard('admin')->user()->id}}">
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
@lang('Edit Profile')
</button>


@endpush