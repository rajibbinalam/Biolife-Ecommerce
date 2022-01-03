@extends('admin.layouts.app')
@section('content')

      
<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-body">
        <table id="data_table" class="table card-body" style="margin-top: 34px;">
          <thead>
            <tr>
              <th scope="col" style="width: 79px;">SL</th>
              <th scope="col">Name</th>
              <th scope="col">Slug</th>
              <th scope="col">Category</th>
              <th scope="col" style="width: 79px;">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($subcategories as $subcategory)
            <tr>
              <th scope="row">{{ ++$loop->index}}</th>
              <td>{{ $subcategory->name}}</td>
              <td>{{ $subcategory->slug}}</td> 
              <td>{{ $subcategory->category->name}}</td> 
              <td>
                <a href="{{url('/admin/subcategory/edit/'.$subcategory->id)}}"
                  style="color: white; background-color: #ff0000; padding: 8px; border-radius: 24px;"><i
                    class="fa fa-edit"></i></a>
                <a href="{{url('/admin/subcategory/delete/'.$subcategory->id)}}"
                  style="color: white; background-color: #ff0000; padding: 8px; border-radius: 24px;"
                  OnClick='return (confirm("Are you sure Delete"));'><i
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
          <!-- Button trigger modal -->
          

          <!-- Modal -->
          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle"> @lang('Add New Sub Category')</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                   
                   <form action="{{route('admin.Sub_Category.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                      <div class="form-group col-md-6">
                          <label for="exampleFormControlSelect1">Select Category</label>
                          <select class="form-control" name="category_id">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id}}">{{ $category->name}}</option>
                            @endforeach
                          </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleFormControlFile1">Sub Category Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="exampleFormControlFile1" placeholder="Category Name">
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
                        <input type="hidden" value="{{auth()->guard('admin')->user()->name}}" name="add_by" id="">
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
  @lang('Add New Sub Category')
  </button>


@endpush

  