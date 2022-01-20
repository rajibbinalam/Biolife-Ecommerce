@extends('admin.layouts.app')
@section('content')

<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-body">
        <table id="data_table" class="table card-body" style="margin-top: 34px;">
          <thead>
            <tr>
              <th scope="col" style="width: 79px;">SL</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col" class="widgth-120">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($customers as $customer)
            <tr>
              <th scope="row">{{ ++$loop->index}}</th>
              <td>{{ $customer->name}}</td>
              <td>{{ $customer->email}}</td>
              <td>{{ $customer->phone}}</td>
              <td>
                <a href="{{url('/admin/customer/delete/'.$customer->id)}}" class="delete"
                  OnClick='return (confirm("Are you sure Delete"));'><i class="fa fa-trash"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection