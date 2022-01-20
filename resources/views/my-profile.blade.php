@extends('partials.app')

@section('content')


<div class="container">
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="{{route('home')}}" class="permal-link">Home</a></li>
            <li class="nav-item"><span class="current-page">My Order List</span></li>
        </ul>
    </nav>
</div>

<div class="page-contain checkout">
    
    <!-- Main content -->
    <div id="main-content" class="main-content">
        <div class="container sm-margin-top-37px">
            <div class="row">

                <div class="col-md-6">                    
                    <div>
                        <img src="{{asset(Auth::user()->image)}}" height="200" width="200" style="border-radius: 110px" alt="">
                        <h4>Name : <strong>{{Auth::user()->name}}</strong></h4>
                        <h4>Phone : <strong>{{Auth::user()->phone}}</strong></h4>
                        <h4>Email : <strong>{{Auth::user()->email}}</strong></h4>
                        <h4>District : <strong>{{Auth::user()->district}}</strong></h4>
                        <h4>Address : <strong>{{Auth::user()->address}}</strong></h4>
                        <h4>Zip : <strong>{{Auth::user()->zip}}</strong></h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <form action="{{url('/customer/update-billing/'.Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-6">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" id="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}" id="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}" id="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">District</label>
                            <input type="text" class="form-control" name="district" value="{{Auth::user()->district}}" id="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Zip</label>
                            <input type="text" class="form-control" name="zip" value="{{Auth::user()->zip}}" id="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Avater</label>
                            <input type="file" class="form-control-file" name="image" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea name="address" id="" cols="100" rows="5">{{Auth::user()->address}}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection