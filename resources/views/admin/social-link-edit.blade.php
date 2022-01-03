@extends('admin.layouts.app')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-body">
        <form action="/admin/social/update/{{$edits->id}}" method="post">
          @csrf

            <div class="form-group col-md-6">
                <label for="inputEmail">Website Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$edits->name}}" name="name" id="exampleFormControlFile1" placeholder="Website Name">
                @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="exampleFormControlFile1">Link</label>
              <input type="text" class="form-control @error('link') is-invalid @enderror" value="{{$edits->link}}" name="link" id="exampleFormControlFile1" value="https://">
              @error('link')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="exampleFormControlFile1">Icon Class</label>
              <input type="text" class="form-control @error('icon_class') is-invalid @enderror" value="{{$edits->icon_class}}" name="icon_class" id="exampleFormControlFile1" placeholder="Ex: fa fa-youtube">
              @error('icon_class')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
              <input type="hidden" value="{{auth()->guard('admin')->user()->name}}" name="add_by" id="">
            </div>
            <div class="form-group col-md-6" style="padding-top: 24px;">
              <button type="submit" class="btn btn-primary" name="submit" style="float: right;">Submit</button>
            </div>
            
          </form>
      </div>
    </div>
  </div>
</div>
   
  @endsection
