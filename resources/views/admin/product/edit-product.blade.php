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
            <label><strong>Size :</strong><span class="text-muted">( Selected :{{$edit->size}} )</span></label><br>
            <label><input style="margin: 6px;" type="checkbox" name="size[]" value="M"> M</label>
            <label><input style="margin: 6px;" type="checkbox" name="size[]" value="S"> S</label>
            <label><input style="margin: 6px;" type="checkbox" name="size[]" value="L"> L</label>
            <label><input style="margin: 6px;" type="checkbox" name="size[]" value="XL"> XL</label>
            <label><input style="margin: 6px;" type="checkbox" name="size[]" value="XXL"> XXL</label>
            <label><input style="margin: 6px;" type="checkbox" name="size[]" value="XXXL"> XXXL</label>
            <label><input style="margin: 6px;" type="checkbox" name="size[]" value="4XL"> 4XL</label>
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
            <label><strong>Colors :</strong><span class="text-muted">( Selected :{{$edit->colors}} )</span></label><br>
            <label><input style="margin: 6px;" type="checkbox" name="colors[]" value="Blue"> Blue</label>
            <label><input style="margin: 6px;" type="checkbox" name="colors[]" value="White"> White</label>
            <label><input style="margin: 6px;" type="checkbox" name="colors[]" value="Red"> Red</label>
            <label><input style="margin: 6px;" type="checkbox" name="colors[]" value="Purple"> Purple</label>
            <label><input style="margin: 6px;" type="checkbox" name="colors[]" value="Green"> Green</label>
            <label><input style="margin: 6px;" type="checkbox" name="colors[]" value="Black"> Black</label>
            <label><input style="margin: 6px;" type="checkbox" name="colors[]" value="Yollow"> Yollow</label>
            <label><input style="margin: 6px;" type="checkbox" name="colors[]" value="Sky"> Sky</label>
        </div>
        <div class="form-group col-md-6">
          <label for="exampleFormControlSelect1">Select Measurement</label>
          <select class="form-control" id="size" name="measurement">
            <option value="">Select Measurement</option>
            <option value="Kilogram" @if($edit->measurement == "Kilogram") selected @endif>Kilogram</option>
            <option value="Gram" @if($edit->measurement == "Gram") selected @endif>Gram</option>
            <option value="Meter" @if($edit->measurement == "Meter") selected @endif>Meter</option>
            <option value="Pound" @if($edit->measurement == "Pound") selected @endif>Pound</option>
            <option value="Inch" @if($edit->measurement == "Inch") selected @endif>Inch</option>
            <option value="Foot" @if($edit->measurement == "Foot") selected @endif>Foot</option>
            <option value="Litter" @if($edit->measurement == "Litter") selected @endif>Litter</option>
          </select>
          @error('measurement')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        @if(isset($edit->shipping_time))
          <div class="form-group col-md-6">
            <label for="">@lang('Estimate Shipping Time')</label>
            <input type="text" class="form-control" name="shipping_time" value="{{$edit->shipping_time}}">
            @error('shipping_time')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
        @endif
        @if(isset($edit->whole_sell_quantity))
          <div class="form-group col-md-6">
            <label for="">@lang('Whole Sell Quantity')</label>
            <input type="number" class="form-control" name="whole_sell_quantity"  value="{{$edit->whole_sell_quantity}}">
            @error('whole_sell_quantity')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
        @endif
        @if(isset($edit->whole_sell_persentage))
        <div class="form-group col-md-6">
          <label for="">@lang('Whole Sell Persentage')</label>
          <input type="number" class="form-control" name="whole_sell_persentage" value="{{$edit->whole_sell_persentage}}">
          @error('whole_sell_persentage')
              <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        @endif
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

