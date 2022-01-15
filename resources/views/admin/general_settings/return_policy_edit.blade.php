@extends('admin.layouts.app')
@section('content')

<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-body">
      	 
        <form  action="{{url('admin/return_policy/update/'.$edit->id)}}" id="form" method="POST">
          @csrf
          <div class="form-group col-md-12">
	          <label for="inputEmail">Descriptions</label>
	          <textarea class="ckeditor form-control" name="descriptions" id="inputEmail" rows="3">{{$edit->descriptions}}</textarea>
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
@push('breadcrumb')

<a href="{{route('admin.returnPolicy')}}" class="btn btn-primary" style="float: right;" >
@lang('Back')
</a>
@endpush
