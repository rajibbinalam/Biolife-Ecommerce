@extends('layouts.admin-layout')
@section('admin_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
          @if($contacts->count()<1)
          <form action="{{route('admin.addcontact')}}" method="post">
            @csrf

              <div class="form-group col-md-6">
                  <label for="inputEmail">Address</label>
                  <textarea class="ckeditor form-control" name="address" value="{{ old('address') }}" id="inputEmail" rows="3"></textarea>
                  @error('address')
                      <div class="alert alert-danger">{{$message}}</div>
                  @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="exampleFormControlFile1">Phone</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="exampleFormControlFile1" placeholder="Phone">
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputPassword1">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="exampleInputPassword1" placeholder="Email">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputPassword1">Map Link</label>
                <input type="text" class="form-control @error('map_link') is-invalid @enderror" name="map_link" id="exampleInputPassword1" placeholder="Google Link">
                @error('map_link')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputPassword1">Store Open</label>
                <input type="text" class="form-control @error('store_open') is-invalid @enderror" name="store_open" id="exampleInputPassword1" placeholder="Ex: 8am - 08pm, Mon - Sat">
                @error('store_open')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group col-md-12">
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
            
            @foreach($contacts as $contact)
            <div class="card-header" style="padding: 21px 19px 14px 14px;">
              <h3 style="display: contents;">Contact</h3>
              <a href="{{url('/admin/contact/delete/'.$contact->id)}}" style="color: white; background-color: #ff0000; padding: 7px 16px 6px 16px; border-radius: 15px; float: right;" ><i class="fa fa-trash"></i></a>
              <a href="{{url('/admin/contact/edit/'.$contact->id)}}" style="color: white; background-color: #00a65a; padding: 7px 16px 6px 16px; border-radius: 15px; float: right;" ><i class="fa fa-edit"></i>Edit</a>
            </div>
            
              
            <div>
              
              <div class="col-md-6">
                <h4>Address</h4>
                <p>{{ $contact->address}}</p>
              </div>
              <div class="col-md-6">
                <h4>Phone</h4>
                <p>{{ $contact->phone}}</p>
              </div>
              <div class="col-md-6">
                <h4>Email</h4>
                <p>{{ $contact->email}}</p>
              </div>
              <div class="col-md-6">
                <h4>Store Open</h4>
                <p>{{ $contact->store_open}}</p>
              </div>
              <div class="col-md-6">
                <h4>Map Link</h4>
                <p>{{ $contact->map_link}}</p>
              </div>
              
            </div>
            @endforeach
            
          </div>
          

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>

  @endsection
