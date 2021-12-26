@extends('admin.layouts.app')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-body">
      <table class="table card-body">
        <thead>
          <tr>
            <th scope="col">SL</th>
            <th scope="col">Name</th>
            <th scope="col">Message</th>
            <th scope="col" class="widgth-120">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($messages as $message)
          <tr>
            <th scope="row">{{ ++$loop->index}}</th>
            <td>{{ $message->name}}</td>
            <td>{{ $message->message}}</td>
            <td>
              <a href="{{url('/admin/message/view/'.$message->id)}}" class="edit" ><i class="fa fa-edit"></i>Edit</a>
              <a href="{{url('/admin/message/delete/'.$message->id)}}" class="delete" OnClick='return (confirm("Are you sure Delete "));'><i class="fa fa-trash"></i></a>
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
