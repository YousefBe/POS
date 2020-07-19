@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="card text-center bg-primary p-2 text-white rounded-circle">
                <div class="card-body">
                    <h3>Clients</h3>
                    <h4 class="display-4"><i class="fa fa-users mr-2" aria-hidden="true"></i>{{$clients->count()}}</h4>
                    <a href="{{route('client.index')}}" class="btn btn-outline-light ">View</a>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <div class="card text-center bg-success p-2 text-white rounded-circle">
                <div class="card-body">
                    <h3>Orders</h3>
                    <h4 class="display-4"><i class="fa fa-users mr-2" aria-hidden="true"></i>{{$orders->count()}}</h4>
                    <a href="{{route('order.index')}}" class="btn btn-outline-light ">View</a>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <div class="card text-center bg-warning p-2 text-white rounded-circle">
                <div class="card-body">
                    <h3>Categories</h3>
                    <h4 class="display-4"><i class="fa fa-folder mr-2" aria-hidden="true"></i>{{$categories->count()}}
                    </h4>
                    <a href="{{route('client.index')}}" class="btn btn-outline-light ">View</a>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <div class="card text-center bg-danger p-2 text-white rounded-circle">
                <div class="card-body">
                    <h3>Products</h3>
                    <h4 class="display-4"><i class="fa fa-hand-o-right mr-2"
                            aria-hidden="true"></i>{{$products->count()}}</h4>
                    <a href="{{route('client.index')}}" class="btn btn-outline-light ">View</a>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>
</div>
@endsection