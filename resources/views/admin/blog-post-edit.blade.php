@extends('admin.layouts.app')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-body">
      <a href="{{route('admin.blogpostcreate')}}" class="btn btn-primary" style="margin: 0 0 18px 15px;">Back</a>
      <form action="/admin/blog-post/update/{{$edits->id}}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="form-group col-md-6">
            <label>Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{$edits->title}}" name="title" id="exampleFormControlFile1" placeholder="Title">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="exampleFormControlFile1">Category</label>
              <select class="form-control" name="blog_categories_id" value="{{$edits->blog_categories_id}}">
                  <option value="{{$edits->blog_categories_id}}" disable>{{$edits->blogcategory->name}}</option>
              @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-md-12">
              <label for="inputEmail">Details</label>
              <textarea class="ckeditor form-control" name="details" value="{{ old('details') }}" id="inputEmail" rows="3">{{$edits->details}}</textarea>
              @error('details')
                  <div class="alert alert-danger">{{$message}}</div>
              @enderror
          </div>
          <div class="form-group col-md-6">
              <label for="inputEmail">Tags</label>
              <!-- <textarea class="form-control" name="tags" value="{{ old('tags') }}" id="inputEmail" rows="3"></textarea> -->
              <input type="text" class="form-control ui-widget-content ui-autocomplete-input" name="tags" id="exampleFormControlFile1" value="{{$edits->tags}}" autocomplete="off">
              @error('tags')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label>Author</label>
            <input type="text" class="form-control" name="auth_name" value="{{$edits->auth_name}}" id="exampleFormControlFile1" readonly>
          </div>
          <div class="form-group col-md-6">
            @if(isset($edits->image))
                <img src="{{$edits->image}}" alt="" height="100px" width="150px" class="mb-2">
            @endif
            <label for="exampleFormControlFile1">Feature Image</label>
            <input type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" id="exampleFormControlFile1">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group col-md-12">
            <button type="submit" class="btn btn-primary" style="float: right;">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
  @endsection
