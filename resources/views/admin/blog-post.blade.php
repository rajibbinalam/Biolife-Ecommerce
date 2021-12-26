@extends('admin.layouts.app')
@section('content')

    <section class="content-header">
      <h1>
        Blog Post
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
          
        </div>
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row" style="border-radius: 10px; background-color: white; padding: 9px; margin: 10px;">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- /.nav-tabs-custom -->

          <div class="card">
            <a href="{{route('admin.addblogpost')}}" class="btn btn-primary" style="float: right;">Add Post</a>
            <div class="card-header">List</div>
            <table class="table card-body">
                <thead>
                  <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Feature Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Viewed</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($blogposts as $blogpost)
                  <tr>
                    <th scope="row">{{ ++$loop->index}}</th>
                    <td><img src="{{ $blogpost->image}}" height="45px" width="100px" alt="Logo image"></td>
                    <td>{{ $blogpost->title}}</td>
                    <td>{{ $blogpost->blogcategory->name}}</td>
                    <td>
                      @if(isset(explode(',',$blogpost->tags)[0]))
                      <span class="badge badge-light">{{explode(',',$blogpost->tags)[0]}}</span>
                      @endif
                      @if(isset(explode(',',$blogpost->tags)[1]))
                      <span class="badge badge-light">{{explode(',',$blogpost->tags)[1]}}</span>
                      @endif
                      @if(isset(explode(',',$blogpost->tags)[2]))
                      <span class="badge badge-light">{{explode(',',$blogpost->tags)[2]}}</span>
                      @endif
                      @if(isset(explode(',',$blogpost->tags)[3]))
                      <span class="badge badge-light">{{explode(',',$blogpost->tags)[3]}}</span>
                      @endif

                    </td>
                    <td>{{ $blogpost->view}}</td>
                    <td>
                      <a href="{{url('/admin/blog-post/edit/'.$blogpost->id)}}" style="color: white; background-color: #00a65a; padding: 8px; border-radius: 24px;" ><i class="fa fa-edit"></i>Edit</a>
                      <a href="{{url('/admin/blog-post/delete/'.$blogpost->id)}}" style="color: white; background-color: #ff0000; padding: 8px; border-radius: 24px;" OnClick='return (confirm("Are you sure Delete "));'><i class="fa fa-trash"></i></a>
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
