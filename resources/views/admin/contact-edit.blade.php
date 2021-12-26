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
          <form action="/admin/contact/update/{{$edits->id}}" method="post">
            @csrf

              <div class="form-group col-md-6">
                  <label for="inputEmail">Address</label>
                  <textarea class="ckeditor form-control" name="address" value="{{ old('address') }}" id="inputEmail" rows="3">{{$edits->address}}</textarea>
                  @error('address')
                      <div class="alert alert-danger">{{$message}}</div>
                  @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="exampleFormControlFile1">Phone</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{$edits->phone}}" name="phone" id="exampleFormControlFile1" placeholder="Phone">
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputPassword1">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{$edits->email}}" name="email" id="exampleInputPassword1" placeholder="Email">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputPassword1">Map Link</label>
                <input type="text" class="form-control @error('map_link') is-invalid @enderror" value="{{$edits->map_link}}" name="map_link" id="exampleInputPassword1" placeholder="Google Link">
                @error('map_link')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputPassword1">Store Open</label>
                <input type="text" class="form-control @error('store_open') is-invalid @enderror" value="{{$edits->store_open}}" name="store_open" id="exampleInputPassword1" placeholder="Ex: 8am - 08pm, Mon - Sat">
                @error('store_open')
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
      
      <!-- /.row (main row) -->

    </section>

  @endsection
