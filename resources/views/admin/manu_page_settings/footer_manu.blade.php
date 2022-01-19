@extends('admin.layouts.app')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-body">
        <div class="col-md-6">
          <strong>UseFull Link Column 1 </strong>
          <form action="{{route('admin.footerManuAdd1st')}}" method="post">
            @csrf
            <div class="col-md-4 form-group">
              <label for="">Name</label>
              <input type="text" class="form-control" value="{{$footer1->name1}}" name="name1" id="" placeholder="Name">
            </div>
            <div class="col-md-8 form-group">
              <label for="">Link</label>
              <input type="text" class="form-control" value="{{$footer1->link1}}" name="link1" id="" placeholder="ex: http://www.example.com">
            </div>
            <div class="col-md-4 form-group">
              <label for="">Name</label>
              <input type="text" class="form-control" value="{{$footer1->name2}}" name="name2" id="" placeholder="Name">
            </div>
            <div class="col-md-8 form-group">
              <label for="">Link</label>
              <input type="text" class="form-control" value="{{$footer1->link2}}" name="link2" id="" placeholder="ex: http://www.example.com">
            </div>
            <div class="col-md-4 form-group">
              <label for="">Name</label>
              <input type="text" class="form-control" value="{{$footer1->name3}}" name="name3" id="" placeholder="Name">
            </div>
            <div class="col-md-8 form-group">
              <label for="">Link</label>
              <input type="text" class="form-control" value="{{$footer1->link3}}" name="link3" id="" placeholder="ex: http://www.example.com">
            </div>
            <div class="col-md-4 form-group">
              <label for="">Name</label>
              <input type="text" class="form-control" value="{{$footer1->name4}}" name="name4" id="" placeholder="Name">
            </div>
            <div class="col-md-8 form-group">
              <label for="">Link</label>
              <input type="text" class="form-control" value="{{$footer1->link4}}" name="link4" id="" placeholder="ex: http://www.example.com">
            </div>
            <div class="col-md-4 form-group">
              <label for="">Name</label>
              <input type="text" class="form-control" value="{{$footer1->name5}}" name="name5" id="" placeholder="Name">
            </div>
            <div class="col-md-8 form-group">
              <label for="">Link</label>
              <input type="text" class="form-control" value="{{$footer1->link5}}" name="link5" id="" placeholder="ex: http://www.example.com">
            </div>
            <div class="col-md-4 form-group">
              <label for="">Name</label>
              <input type="text" class="form-control" value="{{$footer1->name6}}" name="name6" id="" placeholder="Name">
            </div>
            <div class="col-md-8 form-group">
              <label for="">Link</label>
              <input type="text" class="form-control" value="{{$footer1->link6}}" name="link6" id="" placeholder="ex: http://www.example.com">
            </div>
            <input type="hidden" class="form-control" name="add_by" value="{{auth()->guard('admin')->user()->name}}">
            <div class="col-md-6">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
        <div class="col-md-6">
          <strong>UseFull Link Column 2 </strong>
          <p></p>
          <form action="{{route('admin.footerManuAdd2nd')}}" method="post">
            @csrf
            <div class="col-md-4 form-group">
              <label for="">Name</label>
              <input type="text" class="form-control" value="{{$footer2->name1}}" name="name1" id="" placeholder="Name">
            </div>
            <div class="col-md-8 form-group">
              <label for="">Link</label>
              <input type="text" class="form-control" value="{{$footer2->link1}}" name="link1" id="" placeholder="ex: http://www.example.com">
            </div>
            <div class="col-md-4 form-group">
              <label for="">Name</label>
              <input type="text" class="form-control" value="{{$footer2->name2}}" name="name2" id="" placeholder="Name">
            </div>
            <div class="col-md-8 form-group">
              <label for="">Link</label>
              <input type="text" class="form-control" value="{{$footer2->link2}}" name="link2" id="" placeholder="ex: http://www.example.com">
            </div>
            <div class="col-md-4 form-group">
              <label for="">Name</label>
              <input type="text" class="form-control" value="{{$footer2->name3}}" name="name3" id="" placeholder="Name">
            </div>
            <div class="col-md-8 form-group">
              <label for="">Link</label>
              <input type="text" class="form-control" value="{{$footer2->link3}}" name="link3" id="" placeholder="ex: http://www.example.com">
            </div>
            <div class="col-md-4 form-group">
              <label for="">Name</label>
              <input type="text" class="form-control" value="{{$footer2->name4}}" name="name4" id="" placeholder="Name">
            </div>
            <div class="col-md-8 form-group">
              <label for="">Link</label>
              <input type="text" class="form-control" value="{{$footer2->link4}}" name="link4" id="" placeholder="ex: http://www.example.com">
            </div>
            <div class="col-md-4 form-group">
              <label for="">Name</label>
              <input type="text" class="form-control" value="{{$footer2->name5}}" name="name5" id="" placeholder="Name">
            </div>
            <div class="col-md-8 form-group">
              <label for="">Link</label>
              <input type="text" class="form-control" value="{{$footer2->link5}}" name="link5" id="" placeholder="ex: http://www.example.com">
            </div>
            <div class="col-md-4 form-group">
              <label for="">Name</label>
              <input type="text" class="form-control" value="{{$footer2->name6}}" name="name6" id="" placeholder="Name">
            </div>
            <div class="col-md-8 form-group">
              <label for="">Link</label>
              <input type="text" class="form-control" value="{{$footer2->link6}}" name="link6" id="" placeholder="ex: http://www.example.com">
            </div>
            <input type="hidden" class="form-control" name="add_by" value="{{auth()->guard('admin')->user()->name}}">
            <div class="col-md-6">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
          
          
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
