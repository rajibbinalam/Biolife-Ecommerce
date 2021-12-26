@extends('admin.layouts.app')
@section('content')

 
    <section class="content-header">
      <h1>
        Favicon
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Admin</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="container">
      <div class="row">
        <section class="col-md-6 connectedSortable" style="background-color: gainsboro; padding: 49px 0px 64px 209px;  margin: 35px 0px 0 37px; border-radius: 23px;">

          

          <!-- Calendar -->
          <div class="col-6">
            <div class="card">
              <div class="card-header">Favicon</div>
            <div class="card-body">
              @if(session()->has('error'))
                  <div class="text-danger">
                      {{session()->get('error')}}
                  </div>
                  @endif
               <div class="card" style="width: 18rem;">
                @foreach($icon as $icn)
                  <img class="card-img-top" src="{{asset($icn->icon)}}" alt="Card image cap">
                @endforeach
                  <div class="card-body">
                    
                    <form method="POST" action="{{route('admin.faviconinsert')}}" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Favicon</label>
                        <input type="file" name="icon" class="form-control-file @error('icon') is-invalid @enderror" id="exampleFormControlFile1">
                        @error('icon')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                    </form>
                  </div>
                

                </div>
              
              
            </div>


            </div>
          </div>
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section> 




  
@endsection
