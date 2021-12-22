@extends('layouts.admin-layout')
@section('admin_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Post
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
      <div class="row" style="border-radius: 10px; background-color: white; padding: 21px 5px 25px 5px; margin: 10px;">
        <!-- <div class="col-md-3"></div> -->
        
        <div class="col-md-12">
          <a href="{{route('admin.blogpostcreate')}}" class="btn btn-primary" style="margin: 0 0 18px 15px;">Back</a>
          @if(session()->has('success'))
            <div class="alert alert-success">
                {{session()->get('success')}}
            </div>
            @endif
            @if(session()->has('error'))
              <div class="alert alert-danger">
                  {{session()->get('error')}}
              </div>
              @endif
          <form action="{{route('admin.blogpostinsert')}}" method="post" enctype="multipart/form-data">
            @csrf

              <div class="form-group col-md-6">
                <label >Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="exampleFormControlFile1" placeholder="Title">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="exampleFormControlFile1">Category</label>
                  <select class="form-control" name="blog_categories_id">
                      <option value="{{ old('blog_categories_id') }}" selected disable>Default select</option>
                  @foreach($categories as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
              </div>
              

              <div class="form-group col-md-6">
                  <label for="inputEmail">Details</label>
                  <textarea class="form-control" name="details" value="{{ old('details') }}" id="inputEmail" rows="3"></textarea>
                  @error('details')
                      <div class="alert alert-danger">{{$message}}</div>
                  @enderror
              </div>
              <div class="form-group col-md-6">
                
                 <label for="inputEmail">Tags   <small class="text-muted"> ( use (,) for Separate )</small></label>
                 <!-- <textarea class="form-control" name="tags" value="{{ old('tags') }}" id="inputEmail" rows="3"></textarea> -->
                  <input type="text" class="form-control ui-widget-content ui-autocomplete-input" name="tags" id="exampleFormControlFile1" autocomplete="off">
                 @error('tags')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label>Author</label>
                <input type="text" class="form-control" name="auth_name" value="{{Auth::user()->name}}" id="exampleFormControlFile1" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="exampleFormControlFile1">Feature Image</label>
                <input type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" id="exampleFormControlFile1">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
              </div>
              
            </form>
        </div>
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>

  @endsection
