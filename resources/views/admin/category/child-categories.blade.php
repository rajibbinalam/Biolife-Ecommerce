@extends('admin.layouts.app')
@section('content')
 
<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-body">
        <table class="table card-body" style="margin-top: 34px;">
          <thead>
            <tr>
              <th scope="col" style="width: 79px;">SL</th>
              <th scope="col">Name</th>
              <th scope="col">Slug</th>
              <th scope="col">Sub Catgeory</th>
              <th scope="col" style="width: 79px;">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($childCategory as $childcategory)
            <tr>
              <th scope="row">{{ ++$loop->index}}</th>
              <td>{{ $childcategory->name}}</td>
              <td>{{ $childcategory->slug}}</td> 
              <td>{{ $childcategory->name}}</td> 
              <td>
                <a href="{{url('/admin/childcategory/edit/'.$childcategory->id)}}"
                  style="color: white; background-color: #ff0000; padding: 8px; border-radius: 24px;"><i
                    class="fa fa-edit"></i></a>
                <a href="{{url('/admin/childcategory/delete/'.$childcategory->id)}}"
                  style="color: white; background-color: #ff0000; padding: 8px; border-radius: 24px;"
                  OnClick='return (confirm("Are you sure Delete {{ $childcategory->name}}"));'><i
                    class="fa fa-trash"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">@lang('Add New Child Category')</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               
                <form action="{{route('admin.Child_Category.store')}}" method="post" enctype="multipart/form-data">
                @csrf

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
                    <select class="form-control" id="subCategory" name="sub_categories_id">
                      <option value="">Select Sub Category</option>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleFormControlFile1">Child Category Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="exampleFormControlFile1" placeholder="Child Category Name">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="exampleInputPassword1" placeholder="Slug">
                    @error('slug')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group col-md-12" style="text-align: center;">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                  <div class="modal-footer">
                      
                    <!-- <button type="button" class="btn btn-primary">Submit</button> -->
                  </div>
                </form>
            </div>
            
          </div>
        </div>
      </div>

@endsection
@push('breadcrumb')

<button type="button" class="btn btn-primary" style="float: right;" data-toggle="modal"
  data-target="#exampleModalCenter">
@lang('Add New Child Category')
</button>

@endpush
@push('script')
  <script>
      
      $(document).ready(function () {
          $('#category').on('change', function () {
          
              let action="{{route('admin.Child_Category.category.wise.sub.category',':id')}}";
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

