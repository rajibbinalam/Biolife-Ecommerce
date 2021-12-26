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
              <th scope="col">Email Address</th>
              <th scope="col" class="widgth-120">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($subscribers as $subscriber)
            <tr>
              <th scope="row">{{ ++$loop->index}}</th>
              <td>{{ $subscriber->email}}</td>
              <td>
                <a href="{{url('/admin/subscriber/delete/'.$subscriber->id)}}" class="delete" OnClick='return (confirm("Are you sure to Delete"));'><i class="fa fa-trash"></i></a>
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
