@extends('admin.layouts.app')
@section('content')
 
<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-body">
      <form action="/admin/partner/update/{{$edits->id}}" method="post" enctype="multipart/form-data">
          @csrf
           
            <div class="form-group col-md-6">
              <label for="exampleFormControlFile1">Feature Image</label>
              <input type="file" class="form-control-file @error('logo') is-invalid @enderror" name="logo" id="exampleFormControlFile1">
              @error('logo')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group col-md-6">
               @if($edits->logo)
              <img src="{{$edits->logo}}" alt="" height="100px" width="150px">
              @endif
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputPassword1">Web Link</label>
              <input type="text" class="form-control @error('links') is-invalid @enderror" name="links" value="{{$edits->links}}" id="exampleInputPassword1" placeholder="Web Link">
              @error('links')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
              <input type="hidden" value="{{auth()->guard('admin')->user()->name}}" name="add_by" id="">
            </div>
            <div class="form-group col-md-6">
              <button type="submit" class="btn btn-primary float-right mt-4">Update</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>
        
  @endsection
