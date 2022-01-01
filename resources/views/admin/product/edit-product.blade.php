@extends('admin.layouts.app')
@section('content')

<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-body">
      	 
        <form  action="/admin/product/update/{{ $edit->id }}" id="form" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="form-group col-md-6">
            <label for="">@lang('Name')</label>
            <input type="text" class="form-control" name="name" value="{{$edit->name}}" placeholder="Product Name">
            @error('name')
      			    <div class="text-danger">{{ $message }}</div>
      			@enderror
          </div>
          <div class="form-group col-md-6">
            <label for="">@lang('SKU Code')</label>
            <input type="text" class="form-control" name="sku" value="{{$edit->sku}}" placeholder="SKU Code">
            @error('sku')
      			    <div class="text-danger">{{ $message }}</div>
      			@enderror
           </div>

          <div class="form-group col-md-3">
            <label for="">@lang('New Price')</label>
            <input type="number" class="form-control" name="new_price" value="{{$edit->new_price}}" placeholder="Product Price">
            @error('new_price')
      			    <div class="text-danger">{{ $message }}</div>
      			@enderror

          </div>
          <div class="form-group col-md-3">
            <label for="">@lang('Old Price')</label>
            <input type="number" class="form-control" name="old_price" value="{{$edit->old_price}}" placeholder="Product Price">
            @error('old_price')
      			    <div class="text-danger">{{ $message }}</div>
      			@enderror
          </div>

          <div class="form-group col-md-6">
            <label for="">@lang('Quantity')</label>
            <input type="number" class="form-control" name="quantity" value="{{$edit->quantity}}" placeholder="Product Quantity">
            @error('quantity')
      			    <div class="text-danger">{{ $message }}</div>
      			@enderror
          </div>
          <div class="form-group col-md-6">
              <label for="exampleFormControlSelect1">Select Brand</label>
              <select class="form-control" id="editcategory" name="brand_id">
                <option value="">Select Brand</option>
                @foreach($brands as $brand)
                  <option value="{{ $brand->id}}" @if($brand->id == $edit->brand_id) selected @endif>{{ $brand->name}}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group col-md-6">
              <label for="exampleFormControlSelect1">Select Category</label>
              <select class="form-control" id="editcategory" name="category_id">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                  <option value="{{ $category->id}}" @if($category->id == $edit->category_id) selected @endif>{{ $category->name}}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group col-md-6">
            <label for="exampleFormControlSelect1">Select Sub Category</label>
            <select class="form-control" id="editsubCategory" name="sub_category_id">
              <option value="">Select Sub Category</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="exampleFormControlSelect1">Select Size</label>
            <select class="form-control" id="size" name="size">
              <option value=""></option>
              <option value="SM" @if($edit->size == 'SM') selected @endif>SM</option>
              <option value="S" @if($edit->size == 'S') selected @endif>S</option>
              <option value="M" @if($edit->size == 'M') selected @endif>M</option>
              <option value="L" @if($edit->size == 'L') selected @endif>L</option>
              <option value="XL" @if($edit->size == 'XL') selected @endif>XL</option>
              <option value="XXL" @if($edit->size == 'XXL') selected @endif>XXL</option>
              <option value="XXXL" @if($edit->size == 'XXXL') selected @endif>XXXL</option>
            </select>
            @error('size')
			    <div class="text-danger">{{ $message }}</div>
			@enderror
          </div>
          <div class="form-group col-md-12">
	          <label for="inputEmail">Details</label>
	          <textarea class="ckeditor form-control" name="details" id="inputEmail" rows="3">{{$edit->details}}</textarea>
	          @error('details')
	              <div class="text-danger">{{$message}}</div>
	          @enderror
	      </div>
		 <div class="form-group col-md-6">
            <label for="">@lang('Image')</label>
            <input type="file" multiple class="form-control" name="image[]">
          </div>
          <div class="form-group col-md-6">
          @if(isset($images[0]))
              <img src="{{ asset($images[0])}}" style="height: 150px; width: 200px;"/>
            @endif
            @if(isset($images[1]))
              <img src="{{ asset($images[1])}}" style="height: 150px; width: 200px;"/>
            @endif
            @if(isset($images[2]))
              <img src="{{ asset($images[2])}}" style="height: 150px; width: 200px;"/>
            @endif
            @if(isset($images[3]))
              <img src="{{ asset($images[3])}}" style="height: 150px; width: 200px;"/>
            @endif
            @if(isset($images[4]))
              <img src="{{ asset($images[4])}}" style="height: 150px; width: 200px;"/>
            @endif
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
@push('breadcrumb')

<a href="{{route('admin.products.index')}}" class="btn btn-primary" style="float: right;" >
@lang('All Product')
</a>
@endpush

@push('postscript')
  <script>
      
      $(document).ready(function () {
          $('#editcategory').on('change', function () {
          
              let action="{{route('admin.editcategory.wise.sub.category',':id')}}";
              console.log(action)
              $.ajax({
                  url:action.replace(':id',this.value),
                  type: "GET",
                  success: function (resp) {
                    if(resp.success){
                      let html="";
                      $.each(resp.editsubCategories,function(i,ele){
                          html+=`<option value="${ele.id}">${ele.name}</option>`
                      });
                     $('#editsubCategory').html(html)
                    }
                  }
              })
          });

      });


  </script>
  

  @endpush

