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
              <th scope="col">Slug</th>
              <th scope="col">Icon</th>
              <th scope="col" class="widgth-120">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($categories as $category)
            <tr>
              <th scope="row">{{ ++$loop->index}}</th>
              <td>{{ $category->name}}</td>
              <td>{{ $category->slug}}</td>
              <td>
                @if(!$category->icon)
                <p>No Icon</p>
                @else
                <img src="{{ $category->icon}}" alt="No category icon" style="height: 41px; width: 50px;">
                @endif
              </td>
              <td>
                <a href="{{url('/admin/category/edit/'.$category->id)}}"
                  class="edit"><i
                    class="fa fa-edit"></i></a>
                <a href="{{url('/admin/category/delete/'.$category->id)}}"
                  class="delete"
                  OnClick='return (confirm("Are you sure Delete {{ $category->name}}"));'><i
                    class="fa fa-trash"></i></a>
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
        <h4 class="modal-title" id="exampleModalLabel">@lang('Add New Category')</h4>
        <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  action="{{route('admin.category.store')}}" id="form" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="">@lang('Name')</label>
            <input required type="text" class="form-control" name="name">
          </div>
          <div class="form-group">
            <label for="">@lang('Slug')</label>
            <input type="text" class="form-control" name="slug">
          </div>
          <div class="form-group">
            <label for="">@lang('Icon')</label>
            <input type="file" class="form-control" name="icon">
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
<button type="button" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#exampleModalCenter">
@lang('Add New Category')
</button>
@endpush