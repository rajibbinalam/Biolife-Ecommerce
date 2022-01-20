@extends('admin.layouts.app')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-body">
        <div class="col-md-12">
          <strong>Web Site Loader</strong>
          <p></p>
          <form action="{{url('/admin/loader/status/update/')}}" method="post" class="float-right">
            @csrf
            <label class="switch">
                <input type="hidden" name="status" value="@if($loader->status == 1) 0 @else 1 @endif">
              <button type="submit" class="check-submit">
                <input type="checkbox" @if($loader->status == 1) checked @else @endif>
                <span class="slider round"></span>
              </button>
            </label>
          </form>
          <div>
            <form action="{{url('/admin/loader/update/')}}" method="post">
              @csrf
              <div class="form-group col-md-12">
                <label for="inputEmail">HTML Code</label>
                <textarea class="ckeditor form-control" name="html" id="inputEmail" rows="3">{{$loader->html}}</textarea>
                <input type="hidden" class="form-control" value="{{auth()->guard('admin')->user()->id}}" name="add_by">
            <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
          </div>
        </div>
        <div class="col-md-6"></div>
      </div>
    </div>
  </div>
</div>

@endsection
