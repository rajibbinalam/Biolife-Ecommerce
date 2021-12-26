@extends('admin.layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-body">
                <form action="{{route('admin.setting.store')}}" class="row" id="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-md-6 text-center mt-8">
                        <img src="{{asset($general->logo)}}" alt="Logo" height="60px" width="200px"><br>
                        <label for="">@lang('Logo')</label>
                        <input type="file" class="form-control file" name="logo">
                    </div>
                    <div class="form-group col-md-6 text-center">
                        <img src="{{asset($general->favicon)}}" alt="favicon" height="80px" width="80px"><br>
                        <label for="">@lang('Favicon')</label>
                        <input type="file" class="form-control file" name="favicon">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">@lang('Sitename')</label>
                        <input required type="text" value="{{$general->site_name}}" class="form-control" name="sitename">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">@lang('Address')</label>
                        <input  value="{{$general->address}}" type="text" class="form-control" name="address">
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary">@lang('Update')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>




@endsection