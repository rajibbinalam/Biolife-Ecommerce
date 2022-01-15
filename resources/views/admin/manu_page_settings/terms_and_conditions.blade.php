@extends('admin.layouts.app')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-body">
        
        <form action="{{url('/admin/terms-and-conditons/'.$terms->id)}}" method="post">
            @csrf

            <div class="form-group col-md-2">
                <label for="exampleFormControlSelect1">Action</label>
                <select class="form-control" name="position" id="exampleFormControlSelect1">
                  <option value="1" @if (App\Models\TermsAndCondition::first()->position == 1)  selected @endif>Header</option>
                  <option value="2" @if (App\Models\TermsAndCondition::first()->position == 2)  selected @endif>Footer</option>
                  <option value="3" @if (App\Models\TermsAndCondition::first()->position == 3)  selected @endif>Both</option>
                </select>
              </div>
            <div class="col-md-6 form-group">
                <label for="">@lang('Title')</label>
                <input type="text" class="form-control" name="title" id="" value="{{$terms->title}}" placeholder="Title">
            </div>
            <div class="col-md-4 form-group">
                <label for="">@lang('Slug')</label>
                <input type="text" class="form-control" name="slug" id="" value="{{$terms->slug}}" placeholder="Slug">
            </div>
            <div class="form-group col-md-12">
              <label for="">@lang('Answer')</label>
                <textarea class="ckeditor form-control" name="descripton" id="inputEmail" rows="3">{{$terms->descripton}}</textarea>
                <input type="hidden" value="{{auth()->guard('admin')->user()->name}}" name="add_by" id="">
            </div>
            <div class="col-md-6 form-group">
                <input type="submit" class="btn btn-primary" name="submit" id="" value="Submit">
            </div>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection
