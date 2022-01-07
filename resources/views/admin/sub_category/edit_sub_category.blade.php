@extends('admin.layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-12">
      <div class="box box-primary">
        <div class="box-body">
            <a href="{{route('admin.Sub_Category.index')}}" type="button" class="btn btn-light">Back</a>
             
          <form  action="/admin/Sub_Category/update/{{ $edit->id }}" id="form" method="POST">
            @csrf
            
            <div class="form-group col-md-6">
                <label for="exampleFormControlSelect1">Select Category</label>
                <select class="form-control" name="category_id">
                  <option value="">Select Category</option>
                  @foreach($categories as $category)
                    <option value="{{ $category->id}}" @if($category->id == $edit->category_id) selected @endif>{{ $category->name}}</option>
                  @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
              <label for="">@lang('Name')</label>
              <input type="text" class="form-control" name="name" value="{{$edit->name}}">
              @error('name')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="">@lang('Slug')</label>
              <input type="text" class="form-control" name="slug" value="{{$edit->slug}}">
              @error('slug')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
             </div>
              <input type="hidden" class="form-control" value="{{auth()->guard('admin')->user()->id}}" name="add_by">
  
            <div class="form-group col-md-6">
              <button type="submit" class="btn btn-primary" name="submit" style="float: right; margin-top: 25px;">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  
  </div>
  
  @endsection

  