@extends('layouts.admin-layout')
@section('admin_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Middle Banner
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
          <form action="{{route('admin.middlebannerinsert')}}" method="post" enctype="multipart/form-data">
            @csrf
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
                @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputPassword1">First Tag Line</label>
                <input type="text" class="form-control @error('first_tag_line') is-invalid @enderror" name="first_tag_line" id="exampleInputPassword1" placeholder="First Tag">
                @error('first_tag_line')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputPassword1">Second Tag Line</label>
                <input type="text" class="form-control @error('second_tag_line') is-invalid @enderror" name="second_tag_line" id="exampleInputPassword1" placeholder="Second Tag">
                @error('second_tag_line')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputPassword1">Price</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="exampleInputPassword1" placeholder="Price">
                @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="exampleFormControlFile1">Banner Image</label>
                <input type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" id="exampleFormControlFile1">
                @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
              </div>
              <div class="form-group col-md-6">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              
            </form>
        </div>
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- /.nav-tabs-custom -->

          <div class="card">
            <div class="card-header">List</div>
            <table class="table card-body">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">First Tag</th>
                    <th scope="col">Second Tag</th>
                    <th scope="col">price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($banners as $banner)
                  <tr>
                    <th scope="row">{{ ++$loop->index}}</th>
                    <td>{{ $banner->name}}</td>
                    <td>{{ $banner->first_tag_line}}</td>
                    <td>{{ $banner->second_tag_line}}</td>
                    <td>{{ $banner->price}}</td>
                    <td><img src="{{ $banner->image}}" height="45px" width="100px" alt="Middle Banner image"></td>
                    <td>
                      <a href="{{url('/admin/middle-banner/edit/'.$banner->id)}}" style="color: white; background-color: #00a65a; padding: 8px; border-radius: 24px;" ><i class="fa fa-edit"></i></a>
                      <a href="{{url('/admin/middle-banner/delete/'.$banner->id)}}" style="color: white; background-color: #ff0000; padding: 8px; border-radius: 24px;" OnClick='return (confirm("Are you sure Delete Middle Banner {{ $banner->name}}"));'><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
          

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>

  @endsection
