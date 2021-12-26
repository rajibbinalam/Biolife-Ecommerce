@extends('admin.layouts.app')
@section('content')

<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-body">
        <form action="/admin/top-banner/update/{{$edits->id}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$edits->name}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputPassword1">First Tag</label>
            <input type="text" class="form-control @error('first_tag_line') is-invalid @enderror" name="first_tag_line" value="{{$edits->first_tag_line}}" id="exampleInputPassword1" placeholder="First Tag">
            @error('first_tag_line')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputPassword1">Second Tag</label>
            <input type="text" class="form-control @error('second_tag_line') is-invalid @enderror" name="second_tag_line" value="{{$edits->second_tag_line}}" id="exampleInputPassword1" placeholder="Second Tag">
            @error('second_tag_line')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputPassword1">Price</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{$edits->price}}" id="exampleInputPassword1" placeholder="Price">
            @error('price')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          @if($edits->image)
          <img src="{{$edits->image}}" alt="" height="100px" width="150px">
          @endif
          <div class="form-group col-md-6">
            <label for="exampleFormControlFile1">Banner Image</label>
            <input type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" id="exampleFormControlFile1">
            @error('image')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>

@endsection