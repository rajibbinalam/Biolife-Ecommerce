@extends('admin.layouts.app')
@section('content')

<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-body">
      <table id="data_table" class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Link</th>
            <th scope="col">Icon</th>
            <th scope="col" class="widgth-120">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($socials as $social)
          <tr>
            <th scope="row">{{ ++$loop->index}}</th>
            <td>{{ $social->name}}</td>
            <td>{{ $social->link}}</td>
            <td><i class="{{ $social->icon_class}}"></i></td>
            <td>
              <a href="{{url('/admin/social/edit/'.$social->id)}}" class="edit"><i class="fa fa-edit"></i></a>
              <a href="{{url('/admin/social/delete/'.$social->id)}}" class="delete" OnClick='return (confirm("Are you sure"));'><i class="fa fa-trash"></i></a>
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
        <h4 class="modal-title" id="exampleModalLabel">@lang('Add New Social Link')</h4>
        <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      @if($socials->count()<5)
      <form action="{{route('admin.addsocial')}}" id="form" method="post">
        @csrf

          <div class="form-group col-md-6">
            <label for="inputEmail">Website Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="exampleFormControlFile1" placeholder="Website Name">
            @error('name')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="exampleFormControlFile1">Link</label>
            <input type="text" class="form-control @error('link') is-invalid @enderror" name="link" id="exampleFormControlFile1" value="https://">
            @error('link')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="exampleFormControlFile1">Icon Class</label>
            <input type="text" class="form-control @error('icon_class') is-invalid @enderror" name="icon_class" id="exampleFormControlFile1" placeholder="Ex: fa fa-youtube">
            @error('icon_class')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <input type="hidden" value="{{auth()->guard('admin')->user()->name}}" name="add_by" id="">
          </div>
          
        </form>
        @else
        <h3>Your Social Link Is Fillup</h3>
        @endif

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
@lang('Add Social Link')
</button>


@endpush
