@extends('admin.layouts.app')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-body">
        <div class="card">
            @if ($return_policies)
                <div class="card-header" style="padding: 21px 19px 14px 14px;">
                <h3 style="display: contents;">Return Policy</h3>
                <a href="{{url('/admin/return_policy/delete/'.$return_policies->id)}}" style="color: white; background-color: #ff0000; padding: 7px 16px 6px 16px; border-radius: 15px; float: right;" ><i class="fa fa-trash"></i></a>

                <a href="{{url('/admin/return_policy/edit/'.$return_policies->id)}}" style="color: white; background-color: #00a65a; padding: 7px 16px 6px 16px; border-radius: 15px; float: right;" ><i class="fa fa-edit"></i>Edit</a>
                </div>
                <div>
                <div class="col-md-6">
                    <p>@php
                        echo $return_policies->descriptions;
                    @endphp
                      </p>
                </div>
                </div>
            @endif
          </div>
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
        <h4 class="modal-title" id="exampleModalLabel">@lang('Add Return Policy')</h4>
        <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  action="{{route('admin.returnPolicyInsert')}}" id="form" method="POST">
          @csrf
          <div class="form-group">
            <label for="">@lang('Description')</label>
	          <textarea class="ckeditor form-control" name="descriptions" id="inputEmail" rows="3"></textarea>
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

@if (App\Models\ReturnPolicy::count()<1)
    <button type="button" class="btn btn-primary" style="float: right;" data-toggle="modal"
    data-target="#exampleModalCenter">
    @lang('Add Return Ploicy')
    </button>
@endif

@endpush