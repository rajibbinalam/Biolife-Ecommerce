@extends('admin.layouts.app')
@section('content')

 
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
        <section class="col-md-6 connectedSortable">

          <div class="col-6" style="background-color: gainsboro; padding:38px 0px 35px 22px;  margin: 35px 0px 0 37px; border-radius: 23px;">
            @if(session()->has('success'))
                  <div class="alert alert-danger">
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
                    
                    <form method="POST" action="{{route('admin.logoinsert')}}" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group row">
                        <div class="col">
                          <input type="text" name="name" class="form-control-file @error('name') is-invalid @enderror" value="{{old('name')}}" id="exampleFormControlFile1">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="col">
                          <select class="form-control form-control-sm" name="status">
                            <option value="Top Logo">Top Logo</option>
                            <option value="Bottom Logo">Bottom Logo</option>
                        </select>
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
            <div>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($logoo as $logo)
                  <tr>
                    <th scope="row">{{ ++$loop->index}}</th>
                    <td>{{ $logo->name}}</td>
                    <td><img src="{{ $logo->image}}" height="45px" width="100px" alt="Logo image"></td>
                    <td>{{ $logo->status}}</td>
                    <td><a href="{{url('/admin/logo/delete/'.$logo->id)}}" style="color: white; background-color: #ff0000; padding: 8px; border-radius: 24px;" OnClick='return (confirm("Are you sure Delete Logo"));'><i class="fa fa-trash"></i></a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </section>




      </div>
      <!-- /.row (main row) -->

    </section> 




  
@endsection
