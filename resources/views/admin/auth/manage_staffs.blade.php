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
              <th scope="col" class="widgth-50" style="width: 111px;">Status</th>
              <th scope="col" class="widgth-60">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($staffs as $staff)
            <tr>
              <th scope="row">{{ ++$loop->index}}</th>
              <td>{{ $staff->name}}</td>
              <td>
                    <div class="form-group">
                        <div class="dropdown">
                            <span>@if($staff->roll == 1) Admin @elseif($staff->roll == 2) Modertore @elseif($staff->roll == 3) Editor @else Staff @endif</span>
                            <div class="dropdown-content">
                                <form action="{{url('/admin/staff/status/update/'.$staff->id)}}" method="post">
                                    @csrf
                                    <button class="admin-status-btn" type="submit"><input type="hidden" name="roll" value="1" id="">Admin</button>
                                </form>
                                <form action="{{url('/admin/staff/status/update/'.$staff->id)}}" method="post">
                                    @csrf
                                    <button class="admin-status-btn" type="submit"><input type="hidden" name="roll" value="2" id="">Modertore</button>
                                </form>
                                <form action="{{url('/admin/staff/status/update/'.$staff->id)}}" method="post">
                                    @csrf
                                    <button class="admin-status-btn" type="submit"><input type="hidden" name="roll" value="3" id="">Editor</button>
                                </form>
                            </div>
                      </div>
                  </div>
              </td>
              <td>
                {{-- <a href="{{url('/admin/staff/edit/'.$staff->id)}}" class="edit" ><i
                    class="fa fa-edit"></i></a> --}}
                <a href="{{url('/admin/staff/delete/'.$staff->id)}}" class="delete" OnClick='return (confirm("Are you sure Delete {{ $staff->name}}"));'><i class="fa fa-trash"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">@lang('Add New Staff')</h4>
          <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form  action="{{route('admin.newStaff')}}" id="form" method="POST">
            @csrf
            <div class="form-group">
              <label for="">@lang('Name')</label>
              <input required type="text" class="form-control" name="name" placeholder="Name">
            </div>
            <div class="form-group">
              <label for="">@lang('Email')</label>
              <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="">@lang('Phone')</label>
              <input type="text" class="form-control" name="phone" placeholder="Phone">
            </div>
            <div class="form-group">
              <label for="">@lang('Password')</label>
              <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Admin Roll</label>
                <select class="form-control" id="exampleFormControlSelect1" name="roll">
                    <option value="1">Admin</option>
                    <option value="2">Moderatore</option>
                    <option value="3">Editor</option>
                    <option value="4">Staff</option>
                </select>
              </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
          <button type="submit" form="form" class="btn btn-primary">@lang('Save')</button>
        </div>
      </div>
    </div>
  </div>
  
  




@endsection
@push('breadcrumb')
<button type="button" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#exampleModalCenter">
@lang('Add New Staff')
</button>
@endpush
