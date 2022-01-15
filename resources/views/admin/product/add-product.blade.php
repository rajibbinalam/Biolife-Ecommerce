@extends('admin.layouts.app')
@section('content')

<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-body">
          <!-- Modal For BULK Product Upload -->
          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Choose Your File</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{route('admin.BulkProductImport')}}" id="BulkForm" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <input type="file" name="bulk_product" class="form-control" id="">
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" form="BulkForm" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
      	 
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
              <label><strong>Size :</strong></label><br>
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
              <select class="form-control" id="brand" name="brand_id">
                <option value="">Select Brand</option>
                @foreach($brands as $brand)
                  <option value="{{ $brand->id}}">{{ $brand->name}}</option>
                @endforeach
              </select>
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
          <!-- <div class="form-group col-md-6">
            <label for="exampleFormControlSelect1">Select Child Category</label>
            <select class="form-control" id="childCategory" name="child_categories_id">
              <option value="">Select Child Category</option>
            </select>
          </div> -->
          <div class="form-group col-md-6">
            <label><strong>Colors :</strong></label><br>
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
              <option value="Kilogram">Kilogram</option>
              <option value="Gram">Gram</option>
              <option value="Meter">Meter</option>
              <option value="Pound">Pound</option>
              <option value="Inch">Inch</option>
              <option value="Foot">Foot</option>
              <option value="Litter">Litter</option>
            </select>
            @error('measurement')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="">@lang('Estimate Shipping Time')</label>
            <input type="text" class="form-control" name="shipping_time" placeholder="Estimate Shipping Time">
            @error('shipping_time')
      			    <div class="text-danger">{{ $message }}</div>
      			@enderror
          </div>
          <div class="form-group col-md-6">
            <label for="">@lang('Whole Sell Quantity')</label>
            <input type="number" class="form-control" name="whole_sell_quantity" placeholder="Whole Sell Quantity">
            @error('whole_sell_quantity')
      			    <div class="text-danger">{{ $message }}</div>
      			@enderror
          </div>
          <div class="form-group col-md-6">
            <label for="">@lang('Whole Sell Persentage')</label>
            <input type="number" class="form-control" name="whole_sell_persentage" placeholder="Whole Sell Persentage">
            @error('whole_sell_persentage')
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
            <input type="file" multiple class="form-control" name="image[]">
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
          
              let action="{{route('admin.product.category.wise.sub.category',':id')}}";
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
 
  @endpush
  @push('breadcrumb')
    <button type="button" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#exampleModalCenter">@lang('Add Bulk Product')</button>
  @endpush

