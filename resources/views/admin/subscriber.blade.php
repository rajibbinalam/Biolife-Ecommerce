@extends('layouts.admin-layout')
@section('admin_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Subscribers
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
            <div class="card-header">Subscriber List</div>
            <table class="table card-body">
                <thead>
                  <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($subscribers as $subscriber)
                  <tr>
                    <th scope="row">{{ ++$loop->index}}</th>
                    <td>{{ $subscriber->email}}</td>
                    <td>
                      <a href="{{url('/admin/subscriber/delete/'.$subscriber->id)}}" style="color: white; background-color: #ff0000; padding: 8px; border-radius: 24px;" OnClick='return (confirm("Are you sure to Delete"));'><i class="fa fa-trash"></i></a>
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
