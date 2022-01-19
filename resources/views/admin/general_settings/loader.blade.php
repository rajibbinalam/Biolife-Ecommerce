@extends('admin.layouts.app')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-body">
        <div class="col-md-6">
          <strong>Web Site Loader</strong>
          <p></p>
          <div>
            <form action="{{url('/admin/loader/update/')}}" method="post">
              @csrf
              <div class="form-group col-md-12">
                <label for="inputEmail">HTML</label>
                <textarea class="ckeditor form-control" name="html" id="inputEmail" rows="3">{{$loader->html}}</textarea>
                <input type="hidden" class="form-control" value="{{auth()->guard('admin')->user()->id}}" name="add_by">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            </form>
          </div>
        </div>
        <div class="col-md-6"></div>
      </div>
    </div>
  </div>
</div>

@endsection
