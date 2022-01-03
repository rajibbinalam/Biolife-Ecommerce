@extends('admin.layouts.app')
@section('content')

<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-body">
      <table id="data_table" class="table card-body">
          <thead>
            <tr>
              <th scope="col">SL</th>
              <th scope="col">Feature Image</th>
              <th scope="col">Link</th>
              <th scope="col" class="widgth-120">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($partners as $partner)
            <tr>
              <th scope="row">{{ ++$loop->index}}</th>
              <td><img src="{{ $partner->logo}}" height="45px" width="100px" alt="Logo image"></td>
              <td><a href="{{ $partner->links}}" style="text-decoration: none;">{{ $partner->links}}</a></td>
              <td>
                <a href="{{url('/admin/partner/edit/'.$partner->id)}}" class="edit" ><i class="fa fa-edit"></i></a>
                <a href="{{url('/admin/partner/delete/'.$partner->id)}}" class="delete" OnClick='return (confirm("Are you sure Delete "));'><i class="fa fa-trash"></i></a>
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
        <h4 class="modal-title" id="exampleModalLabel">@lang('Add New Partner')</h4>
        <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('admin.partnerinsert')}}" id="form" method="post" enctype="multipart/form-data">
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
            <input type="hidden" value="{{auth()->guard('admin')->user()->name}}" name="add_by" id="">
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

<button type="button" class="btn btn-primary" style="float: right;" data-toggle="modal"
  data-target="#exampleModalCenter">
@lang('Add New Partner')
</button>


@endpush