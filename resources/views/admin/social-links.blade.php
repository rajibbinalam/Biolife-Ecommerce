@extends('admin.layouts.app')
@section('content')
 
    <section class="content-header">
      <h1>
        Contact
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
          @if($socials->count()<5)
          <form action="{{route('admin.addsocial')}}" method="post">
            @csrf

              <div class="form-group col-md-6">
                  <label for="inputEmail">Website Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="exampleFormControlFile1" placeholder="Website Name">
                  @error('name')
                      <div class="alert alert-danger">{{$message}}</div>
                  @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="exampleFormControlFile1">Link</label>
                <input type="text" class="form-control @error('link') is-invalid @enderror" name="link" id="exampleFormControlFile1" value="https://">
                @error('link')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="exampleFormControlFile1">Icon Class</label>
                <input type="text" class="form-control @error('icon_class') is-invalid @enderror" name="icon_class" id="exampleFormControlFile1" placeholder="Ex: fa fa-youtube">
                @error('icon_class')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6" style="padding-top: 24px;">
                <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
              </div>
              
            </form>
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
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Link</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($socials as $social)
                  <tr>
                    <th scope="row">{{ ++$loop->index}}</th>
                    <td>{{ $social->name}}</td>
                    <td>{{ $social->link}}</td>
                    <td><i class="{{ $social->icon_class}}"></i></td>
                    <td>
                      <a href="{{url('/admin/social/edit/'.$social->id)}}" style="color: white; background-color: #00a65a; padding: 8px; border-radius: 24px;"><i class="fa fa-edit"></i></a>
                      <a href="{{url('/admin/social/delete/'.$social->id)}}" style="color: white; background-color: #ff0000; padding: 8px; border-radius: 24px;" OnClick='return (confirm("Are you sure"));'><i class="fa fa-trash"></i></a>
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
