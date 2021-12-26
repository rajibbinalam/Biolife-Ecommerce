@extends('admin.layouts.app')
@section('content')
 
    <section class="content-header">
      <h1>
        Contact
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Admin</li>
      </ol>
    </section>
        
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row" style="border-radius: 10px; background-color: white; padding: 9px; margin: 10px;">
        <!-- <div class="col-md-3"></div> -->
        <div class="col-md-12">
          
            <form action="/admin/social/update/{{$edits->id}}" method="post">
              @csrf

                <div class="form-group col-md-6">
                    <label for="inputEmail">Website Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$edits->name}}" name="name" id="exampleFormControlFile1" placeholder="Website Name">
                    @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleFormControlFile1">Link</label>
                  <input type="text" class="form-control @error('link') is-invalid @enderror" value="{{$edits->link}}" name="link" id="exampleFormControlFile1" value="https://">
                  @error('link')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleFormControlFile1">Icon Class</label>
                  <input type="text" class="form-control @error('icon_class') is-invalid @enderror" value="{{$edits->icon_class}}" name="icon_class" id="exampleFormControlFile1" placeholder="Ex: fa fa-youtube">
                  @error('icon_class')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-6" style="padding-top: 24px;">
                  <button type="submit" class="btn btn-primary" name="submit" style="float: right;">Submit</button>
                </div>
                
              </form>

        </div>
      </div>
    </section> 

  @endsection
