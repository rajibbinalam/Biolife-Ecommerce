@extends('admin.layouts.app')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
      <div class="box-body">
      <a href="{{route('admin.addblogpost')}}" class="btn btn-primary" style="float: right;">Add Post</a>
      <table class="table card-body">
        <thead>
          <tr>
            <th scope="col">SL</th>
            <th scope="col">Feature Image</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">Tags</th>
            <th scope="col">Viewed</th>
            <th scope="col" class="widgth-120">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($blogposts as $blogpost)
          <tr>
            <th scope="row">{{ ++$loop->index}}</th>
            <td><img src="{{ $blogpost->image}}" height="45px" width="100px" alt="Logo image"></td>
            <td>{{ $blogpost->title}}</td>
            <td>{{ $blogpost->blogcategory->name}}</td>
            <td>
              @if(isset(explode(',',$blogpost->tags)[0]))
              <span class="badge badge-light">{{explode(',',$blogpost->tags)[0]}}</span>
              @endif
              @if(isset(explode(',',$blogpost->tags)[1]))
              <span class="badge badge-light">{{explode(',',$blogpost->tags)[1]}}</span>
              @endif
              @if(isset(explode(',',$blogpost->tags)[2]))
              <span class="badge badge-light">{{explode(',',$blogpost->tags)[2]}}</span>
              @endif
              @if(isset(explode(',',$blogpost->tags)[3]))
              <span class="badge badge-light">{{explode(',',$blogpost->tags)[3]}}</span>
              @endif

            </td>
            <td>{{ $blogpost->view}}</td>
            <td>
              <a href="{{url('/admin/blog-post/edit/'.$blogpost->id)}}" class="edit" ><i class="fa fa-edit"></i></a>
              <a href="{{url('/admin/blog-post/delete/'.$blogpost->id)}}" class="delete" OnClick='return (confirm("Are you sure Delete "));'><i class="fa fa-trash"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>

  @endsection
