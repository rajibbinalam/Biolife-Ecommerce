@extends('admin.layouts.app')
@section('content')
 
    <section class="content-header">
      <h1>
        Top Banner
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
          <form action="{{route('admin.partnerinsert')}}" method="post" enctype="multipart/form-data">
            @csrf

              <div class="form-group col-md-6">
                <label for="exampleFormControlFile1">Feature Image</label>
                <input type="file" class="form-control-file @error('logo') is-invalid @enderror" name="logo" id="exampleFormControlFile1">
                @error('logo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputPassword1">Web Link</label>
                <input type="text" class="form-control @error('links') is-invalid @enderror" name="links" id="exampleInputPassword1" placeholder="Web Link">
                @error('links')
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
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- /.nav-tabs-custom -->

          <div class="card">
            <div class="card-header">List</div>
            <table class="table card-body">
                <thead>
                  <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Feature Image</th>
                    <th scope="col">Link</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($partners as $partner)
                  <tr>
                    <th scope="row">{{ ++$loop->index}}</th>
                    <td><img src="{{ $partner->logo}}" height="45px" width="100px" alt="Logo image"></td>
                    <td><a href="{{ $partner->links}}" style="text-decoration: none;">{{ $partner->links}}</a></td>
                    <td>
                      <a href="{{url('/admin/partner/edit/'.$partner->id)}}" style="color: white; background-color: #00a65a; padding: 8px; border-radius: 24px;" ><i class="fa fa-edit"></i>Edit</a>
                      <a href="{{url('/admin/partner/delete/'.$partner->id)}}" style="color: white; background-color: #ff0000; padding: 8px; border-radius: 24px;" OnClick='return (confirm("Are you sure Delete "));'><i class="fa fa-trash"></i></a>
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
