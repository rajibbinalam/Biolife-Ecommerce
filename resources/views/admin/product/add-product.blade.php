@extends('admin.layouts.app')
@section('content')

<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-body">
      	 @if(session()->has('success'))
            <div class="alert alert-success">
                {{session()->get('success')}}
            </div>
         @endif
         @if(session()->has('error'))
            <div class="alert alert-danger">
                {{session()->get('error')}}
            </div>
         @endif

        <form  action="{{route('admin.productAdd')}}" id="form" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="form-group col-md-6">
            <label for="">@lang('Name')</label>
            <input type="text" class="form-control" name="name" placeholder="Product Name">
            @error('name')
      			    <div class="text-danger">{{ $message }}</div>
      			@enderror
          </div>
          <div class="form-group col-md-6">
            <label for="">@lang('SKU Code')</label>
            <input type="text" class="form-control" name="sku" placeholder="SKU Code">
            @error('sku')
      			    <div class="text-danger">{{ $message }}</div>
      			@enderror
           </div>

          <div class="form-group col-md-3">
            <label for="">@lang('New Price')</label>
            <input type="number" class="form-control" name="new_price" placeholder="Product Price">
            @error('new_price')
      			    <div class="text-danger">{{ $message }}</div>
      			@enderror

          </div>
          <div class="form-group col-md-3">
            <label for="">@lang('Old Price')</label>
            <input type="number" class="form-control" name="old_price" placeholder="Product Price">
            @error('old_price')
      			    <div class="text-danger">{{ $message }}</div>
      			@enderror
          </div>

          <div class="form-group col-md-6">
            <label for="">@lang('Quantity')</label>
            <input type="number" class="form-control" name="quantity" placeholder="Product Quantity">
            @error('quantity')
      			    <div class="text-danger">{{ $message }}</div>
      			@enderror
          </div>
          <div class="form-group col-md-6">
              <label for="exampleFormControlSelect1">Select Category</label>
              <select class="form-control" id="category" name="category_id">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                  <option value="{{ $category->id}}">{{ $category->name}}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group col-md-6">
            <label for="exampleFormControlSelect1">Select Sub Category</label>
            <select class="form-control" id="subCategory" name="sub_category_id">
              <option value="">Select Sub Category</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="exampleFormControlSelect1">Select Child Category</label>
            <select class="form-control" id="childCategory" name="child_categories_id">
              <option value="">Select Child Category</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="exampleFormControlSelect1">Select Size</label>
            <select class="form-control" id="size" name="size">
              <option value="">Select Child Category</option>
              <option value="SM">SM</option>
              <option value="S">S</option>
              <option value="M">M</option>
              <option value="L">L</option>
              <option value="XL">XL</option>
              <option value="XXL">XXL</option>
              <option value="XXXL">XXXL</option>
            </select>
            @error('size')
			    <div class="text-danger">{{ $message }}</div>
			@enderror
          </div>
          <div class="form-group col-md-12">
	          <label for="inputEmail">Details</label>
	          <textarea class="ckeditor form-control" name="details" id="inputEmail" rows="3"></textarea>
	          @error('details')
	              <div class="text-danger">{{$message}}</div>
	          @enderror
	      </div>
		 <div class="form-group col-md-6">
            <label for="">@lang('Image')</label>
            <input type="file" multiple class="form-control" name="image">
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

@push('postscript')
  <script>
      
      $(document).ready(function () {
          $('#category').on('change', function () {
          
              let action="{{route('admin.category.wise.sub.category',':id')}}";
              console.log(action)
              $.ajax({
                  url:action.replace(':id',this.value),
                  type: "GET",
                  success: function (resp) {
                    if(resp.success){
                      let html="";
                      $.each(resp.subCategories,function(i,ele){
                          html+=`<option value="${ele.id}">${ele.name}</option>`
                      });
                     $('#subCategory').html(html)
                    }
                  }
              })
          });

      });


  </script>
  <script>
      
      $(document).ready(function () {
          $('#subCategory').on('change', function () {
          
              let action="{{route('admin.category.wise.child.category',':id')}}";
              console.log(action)
              $.ajax({
                  url:action.replace(':id',this.value),
                  type: "GET",
                  success: function (resp) {
                    if(resp.success){
                      let html="";
                      $.each(resp.childCategories,function(i,ele){
                          html+=`<option value="${ele.id}">${ele.name}</option>`
                      });
                     $('#childCategory').html(html)
                    }
                  }
              })
          });

      });


  </script>

  @endpush

