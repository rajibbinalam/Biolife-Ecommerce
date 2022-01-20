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

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Product Name <span class="text-muted"> :SKU</span></th>
                        <th scope="col">Order Number</th>
                        <th scope="col">Price</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($myOrders as $myOrder)
                        <tr>
                            <th scope="row">{{++$loop->index}}</th>
                            <td><img src="{{asset(explode('|',$myOrder->product->image)[0])}}" height="50" width="50" alt=""></td>
                            <td>{{$myOrder->product->name}} <br><span class="text-muted">{{$myOrder->product->sku}}</span></td>
                            <td>{{$myOrder->order_number}}</td>
                            <td>{{$myOrder->total_cost}}</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

            </div>
        </div>
    </div>
</div>

@endsection