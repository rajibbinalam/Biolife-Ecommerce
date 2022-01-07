@extends('admin.layouts.app')
@section('content')

<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-body">
          <a href="{{route('admin.category.index')}}" type="button" class="btn btn-light">Back</a>
      	 
        <form  action="/admin/category/update/{{ $edit->id }}" id="form" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="form-group col-md-6">
            <label for="">@lang('Name')</label>
            <input type="text" class="form-control" name="name" value="{{$edit->name}}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="">@lang('Slug')</label>
            <input type="text" class="form-control" name="slug" value="{{$edit->slug}}">
            @error('slug')
                <div class="text-danger">{{ $message }}</div>
            @enderror
           </div>
         
		 <div class="form-group col-md-6">
            <label for="">@lang('Icon')</label>
            <input type="file" class="form-control" name="icon">
          </div>
          <div class="form-group col-md-6">
            <img src="{{ asset($edit->icon)}}" style="height: 50px; width: 90px;"/>
          </div>
            <input type="hidden" class="form-control" value="{{auth()->guard('admin')->user()->id}}" name="add_by">

          <div class="form-group col-md-6">
            <button type="submit" class="btn btn-primary" name="submit" style="float: right; margin-top: 25px;">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>


@endsection


