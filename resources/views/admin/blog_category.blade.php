@extends('admin.layouts.app')
@section('content')

    <section class="content-header">
      <h1>
        Blog Categories
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
      <div class="row" style="border-radius: 10px; background-color: white; padding: 9px; margin: 10px;">
        <!-- <div class="col-md-3"></div> -->
        <h4 style="padding-left: 32px; padding-bottom: 10px; font-weight: bold;">Add Category</h4>
        <div class="col-md-12">
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
          <form action="{{route('admin.blogcategoryinsert')}}" method="post">
            @csrf

              <div class="form-group col-md-6">
                <label for="exampleFormControlFile1">Category Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="exampleFormControlFile1" placeholder="Category Name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputPassword1">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="exampleInputPassword1" placeholder="Slug">
                @error('slug')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
              </div>
              
            </form>
        </div>
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row" style="border-radius: 10px; background-color: white; padding: 9px; margin: 10px;">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- /.nav-tabs-custom -->

          <div class="card">
            <div class="card-header">List</div>
            <table class="table card-body">
                <thead>
                  <tr>
                    <th scope="col" style="width: 79px;">SL</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col" style="width: 79px;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($categories as $category)
                  <tr>
                    <th scope="row">{{ ++$loop->index}}</th>
                    <td>{{ $category->name}}</td>
                    <td>{{ $category->slug}}</td>
                    <td>
                      <a href="{{url('/admin/blog-category/delete/'.$category->id)}}" style="color: white; background-color: #ff0000; padding: 8px; border-radius: 24px;" OnClick='return (confirm("Are you sure Delete {{ $category->name}}"));'><i class="fa fa-trash"></i></a>
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

  @endsection
