@extends('admin.layouts.app')
@section('content')

<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-body">
        <table id="data_table" class="table card-body" style="margin-top: 34px;">
          <thead>
            <tr>
              <th scope="form-group col-md-6">#</th>
              <th scope="form-group col-md-6">Name</th>
              <th scope="form-group col-md-6">First Tag Line</th>
              <th scope="form-group col-md-6">Second Tag Line</th>
              <th scope="form-group col-md-6">Image</th>
              <th scope="form-group col-md-6">Status</th>
              <th scope="form-group col-md-6" class="widgth-120">Action</th>
            </tr>
          </thead>
          
          <tbody>
            @foreach($sliders as $slider)
            <tr>
              <th scope="row">{{ ++$loop->index}}</th>
              <td>{{ $slider->name}}</td>
              <td>{{ $slider->first_tag_line}}</td>
              <td>{{ $slider->second_tag_line}}</td>
              <td><img src="{{ $slider->image}}" height="45px" width="100px" alt="Logo image"></td>
              <td>{{ $slider->status}}</td>
              <td>
                <a href="{{url('/admin/slider/delete/'.$slider->id)}}" class="delete" OnClick='return (confirm("Are you sure Delete Logo"));'><i class="fa fa-trash"></i></a>
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
      <div class="modal-body row">
        <form  action="{{route('admin.sliderinsert')}}" id="form" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group col-md-6">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" id="exampleFormControlFile1" placeholder="Name">
          @error('name')
              <div class="text-danger">{{ $message }}</div>
          @enderror
          </div>
          <div class="form-group col-md-6">
            <input type="text" name="first_tag_line" class="form-control @error('first_tag_line') is-invalid @enderror" value="{{old('first_tag_line')}}" id="exampleFormControlFile1" placeholder="First Tag Line">
          @error('first_tag_line')
              <div class="text-danger">{{ $message }}</div>
          @enderror
          </div>
          <div class="form-group col-md-6">
            <input type="text" name="second_tag_line" class="form-control @error('second_tag_line') is-invalid @enderror" value="{{old('second_tag_line')}}" id="exampleFormControlFile1" placeholder="Second Tag Line">
          @error('second_tag_line')
              <div class="text-danger">{{ $message }}</div>
          @enderror
          </div>
          <div class="form-group col-md-6">
            <input type="file" name="image" class="form-control-file @error('image') is-invalid @enderror" id="exampleFormControlFile1">
          @error('image')
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
@lang('Add New Slider')
</button>


@endpush

 