@extends('layouts.admin-layout')
@section('admin_content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Logo
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Admin</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="container">
      <div class="row">
        <section class="col-md-10 connectedSortable">

          <div class="col-md-6" style="background-color: gainsboro; padding:38px 0px 35px 22px;  margin: 35px 0px 0 37px; border-radius: 23px;">
            @if(session()->has('success'))
                  <div class="alert alert-success">
                      {{session()->get('success')}}
                  </div>
                  @endif
            <div class="card">
              <div class="card-header">Logo</div>
            <div class="card-body">
              
              @if(session()->has('error'))
                  <div class="text-danger">
                      {{session()->get('error')}}
                  </div>
                  @endif
               <div class="card" style="width: 18rem;">
                
                  <div class="card-body">
                    
                    <form method="POST" action="{{route('admin.sliderinsert')}}" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group row">
                        <div class="col">
                          <input type="text" name="name" class="form-control-file @error('name') is-invalid @enderror" value="{{old('name')}}" id="exampleFormControlFile1" placeholder="Name">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="col">
                          <input type="text" name="first_tag_line" class="form-control-file @error('first_tag_line') is-invalid @enderror" value="{{old('first_tag_line')}}" id="exampleFormControlFile1" placeholder="First Tag Line">
                        @error('first_tag_line')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="col">
                          <input type="text" name="second_tag_line" class="form-control-file @error('second_tag_line') is-invalid @enderror" value="{{old('second_tag_line')}}" id="exampleFormControlFile1" placeholder="Second Tag Line">
                        @error('second_tag_line')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="col">
                          <input type="file" name="image" class="form-control-file @error('image') is-invalid @enderror" id="exampleFormControlFile1">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        
                      </div>
                      <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                    </form>
                  </div>
                

                </div>
              
              
            </div>

            

            </div>
          </div>
<div >
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">First Tag Line</th>
                    <th scope="col">Second Tag Line</th>
                    <th scope="col">Image</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($sliders as $slider)
                  <tr>
                    <th scope="row">{{ ++$loop->index}}</th>
                    <td>{{ $slider->name}}</td>
                    <td>{{ $slider->first_tag_line}}</td>
                    <td>{{ $slider->second_tag_line}}</td>
                    <td><img src="{{ $slider->image}}" height="45px" width="100px" alt="Logo image"></td>
                    <td>{{ $slider->status}}</td>
                    <td><a href="{{url('/admin/slider/delete/'.$slider->id)}}" style="color: white; background-color: #ff0000; padding: 8px; border-radius: 24px;" OnClick='return (confirm("Are you sure Delete Logo"));'><i class="fa fa-trash"></i></a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </section>




      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>




  
@endsection
