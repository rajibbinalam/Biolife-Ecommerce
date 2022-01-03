@extends('admin.layouts.app')
@section('content')

<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-body">
       
        <div class="col-md-4">
          <h3>Homage Page 1</h3>
          <img src="{{asset(explode('|',$features->Feature)[0])}}" alt="" height="300px" width="200px"><br>
          <form action="{{url('/admin/home-pages/1')}}" method="post">
            @csrf
            <input type="hidden" name="web_page" id="" value="1">
            <input type="submit" name="submit" id="" value="@if($page_no==1) activate @else  active @endif">
            <input type="hidden" value="{{auth()->guard('admin')->user()->name}}" name="add_by" id="">
          </form>
        </div>
        <div class="col-md-4">
          <h3>Homage Page 2</h3>
          <img src="{{asset(explode('|',$features->Feature)[1])}}" alt="" height="300px" width="200px"><br>
          <form action="{{route('admin.homepage2')}}" method="post">
            @csrf
            <input type="hidden" name="web_page" id="" value="2">
            <input type="submit" name="submit" id="" value="@if($page_no==2) activate @else  active @endif">
            <input type="hidden" value="{{auth()->guard('admin')->user()->name}}" name="add_by" id="">
          </form>
        </div>
        <div class="col-md-4">
          <h3>Homage Page 3</h3>
          <img src="{{asset(explode('|',$features->Feature)[2])}}" alt="" height="300px" width="200px"><br>
          <form action="{{route('admin.homepage3')}}" method="post">
            @csrf
            <input type="hidden" name="web_page" id="" value="3">
            <input type="submit" name="submit" id="" value="@if($page_no==3) activate @else  active @endif">
            <input type="hidden" value="{{auth()->guard('admin')->user()->name}}" name="add_by" id="">
          </form>
        </div>
        <div class="col-md-4">
          <h3>Homage Page 4</h3>
          <img src="{{asset(explode('|',$features->Feature)[3])}}" alt="" height="300px" width="200px"><br>
          <form action="{{url('/admin/home-pages/4')}}" method="post">
            @csrf
            <input type="hidden" name="web_page" id="" value="4">
            <input type="submit" name="submit" id="" value="@if($page_no==4) activate @else  active @endif">
            <input type="hidden" value="{{auth()->guard('admin')->user()->name}}" name="add_by" id="">
          </form>
        </div>
        <div class="col-md-4">
          <h3>Homage Page 5</h3>
          <img src="{{asset(explode('|',$features->Feature)[4])}}" alt="" height="300px" width="200px"><br>
          <form action="{{url('/admin/home-pages/5')}}" method="post">
            @csrf
            <input type="hidden" name="web_page" id="" value="5">
            <input type="submit" name="submit" id="" value="@if($page_no==5) activate @else  active @endif">
            <input type="hidden" value="{{auth()->guard('admin')->user()->name}}" name="add_by" id="">
          </form>
        </div>
        
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">@lang('Add Home Page')</h4>
        <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  action="{{route('admin.homePagesinsert')}}" id="form" method="POST" enctype="multipart/form-data">
          @csrf
          <!-- <div class="form-group">
            <label for="">@lang('Web Page')</label>
            <input type="number" class="form-control" name="web_page">
          </div> -->
          <div class="form-group">
            <label for="">@lang('Feature')</label>
            <input type="file" multiple class="form-control" name="Feature[]">
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
@lang('Add New Home Page')
</button>

@endpush
