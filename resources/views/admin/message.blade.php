@extends('admin.layouts.app')
@section('content')
 
    <section class="content-header">
      <h1>
        Messages
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
            <div class="card-header">Message List</div>
            <table class="table card-body">
                <thead>
                  <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Name</th>
                    <th scope="col">Message</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($messages as $message)
                  <tr>
                    <th scope="row">{{ ++$loop->index}}</th>
                    <td>{{ $message->name}}</td>
                    <td>{{ $message->message}}</td>
                    <td>
                      <a href="{{url('/admin/message/view/'.$message->id)}}" style="color: white; background-color: #00a65a; padding: 8px; border-radius: 24px;" ><i class="fa fa-edit"></i>Edit</a>
                      <a href="{{url('/admin/message/delete/'.$message->id)}}" style="color: white; background-color: #ff0000; padding: 8px; border-radius: 24px;" OnClick='return (confirm("Are you sure Delete "));'><i class="fa fa-trash"></i></a>
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
