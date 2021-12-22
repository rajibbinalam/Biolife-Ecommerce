@extends('layouts.admin-layout')
@section('admin_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Partner
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
          <form action="/admin/partner/update/{{$edits->id}}" method="post" enctype="multipart/form-data">
            @csrf
              
            
              @if($edits->logo)
                <img src="{{$edits->logo}}" alt="" height="100px" width="150px">
                @endif
              <div class="form-group col-md-6">
                <label for="exampleFormControlFile1">Feature Image</label>
                <input type="file" class="form-control-file @error('logo') is-invalid @enderror" name="logo" id="exampleFormControlFile1">
                @error('logo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group col-md-6">
                <label for="exampleInputPassword1">Web Link</label>
                <input type="text" class="form-control @error('links') is-invalid @enderror" name="links" value="{{$edits->links}}" id="exampleInputPassword1" placeholder="Web Link">
                @error('links')
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
