@extends('admin.layouts.app')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-body">
        <div class="col-md-6">
          <strong>Admin panal</strong>
          <p></p>
          <div class="col-md-6">
            <form action="{{route('admin.adminColorUpdate')}}" method="post">
              @csrf
              <input type="color" name="admin_color" id="color" value="{{App\Models\ThemeColor::first()->admin}}" >
              <input type="hidden" name="add_by" value="{{auth()->guard('admin')->user()->name}}">
              <button id="colorButton" class="btn btn-primary" onclick="ChangeColor()">Change</button>
            </form>
          </div>
          <div class="col-md-6">
            <p style="padding: 25px 15px 25px 15px;background-color: {{App\Models\ThemeColor::first()->admin}};"></p>
          </div>
          <strong>Admin Side Bar</strong>
          <p></p>
          <div class="col-md-6">
            <form action="{{route('admin.adminSidebarUpdate')}}" method="post">
              @csrf
              <input type="color" name="adminSideBar" id="color" value="{{App\Models\ThemeColor::first()->adminSideBar}}" >
              <input type="hidden" name="add_by" value="{{auth()->guard('admin')->user()->name}}">
              <button id="colorButton" class="btn btn-primary" onclick="ChangeColor()">Change</button>
            </form>
          </div>
          <div class="col-md-6">
            <p style="padding: 25px 15px 25px 15px;background-color: {{App\Models\ThemeColor::first()->adminSideBar}};"></p>
          </div>
        </div>
        <div class="col-md-6">
          <strong>Web Site</strong>
          <p></p>
          <div class="col-md-6">
            <form action="{{route('admin.webColorUpdate')}}" method="post">
              @csrf
              <input type="color" name="web_color" id="color" value="{{App\Models\ThemeColor::first()->WebPage}}">
              <input type="hidden" name="add_by" value="{{auth()->guard('admin')->user()->name}}">
              <button id="colorButton" class="btn btn-primary" onclick="ChangeColor()">Change</button>
            </form>
          </div>
          <div class="col-md-6">
            <p style="padding: 25px 15px 25px 15px;background-color: {{App\Models\ThemeColor::first()->WebPage}};"></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
