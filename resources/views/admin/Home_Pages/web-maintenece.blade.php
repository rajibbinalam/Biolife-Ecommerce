@extends('admin.layouts.app')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-body">
        <div class="col-md-12">
            <div class="float-right">
                <form action="{{url('/admin/web-maintenence/status/update/')}}" method="post">
                    @csrf
                    <label class="switch">
                        <input type="hidden" name="status" value="@if($maintenence->status == 1) 0 @else 1 @endif">
                      <button type="submit" class="check-submit">
                        <input type="checkbox" @if($maintenence->status == 1) checked @else @endif>
                        <span class="slider round"></span>
                      </button>
                    </label>
                  </form>
            </div>
          <div>
            <form action="{{url('/admin/web-maintenence/update/')}}" method="post">
              @csrf
              <div class="form-group col-md-12">
                <label for="inputEmail">Code</label>
                <textarea class="ckeditor form-control" name="code" id="inputEmail" rows="3">{{$maintenence->code}}</textarea>
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
