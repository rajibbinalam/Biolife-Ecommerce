@extends('layouts.admin-layout')
@section('admin_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Banner
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Admin</li>
      </ol>
    </section>
        
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <form action="/admin/bottom-banner/update/{{$edits->id}}" method="post" enctype="multipart/form-data">
            @csrf
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$edits->name}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
                @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputPassword1">First Tag</label>
                <input type="text" class="form-control @error('first_tag_line') is-invalid @enderror" name="first_tag_line" value="{{$edits->first_tag_line}}" id="exampleInputPassword1" placeholder="First Tag">
                @error('first_tag_line')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputPassword1">Second Tag</label>
                <input type="text" class="form-control @error('second_tag_line') is-invalid @enderror" name="second_tag_line" value="{{$edits->second_tag_line}}" id="exampleInputPassword1" placeholder="Second Tag">
                @error('second_tag_line')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputPassword1">Price</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{$edits->price}}" id="exampleInputPassword1" placeholder="Price">
                @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
              </div>
              @if($edits->image)
                <img src="{{$edits->image}}" alt="" height="100px" width="150px">
                @endif
              <div class="form-group col-md-6">
                <label for="exampleFormControlFile1">Banner Image</label>
                <input type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" id="exampleFormControlFile1">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
              
            </form>
        </div>
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>

  @endsection
