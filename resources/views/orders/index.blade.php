@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials.sessions')
    <form action="{{route('order.index')}}" method="GET" class="form-inline">
        <div class="form-group mx-sm-3 mb-2">
            <label for="search" class="sr-only">Search</label>
            <input type="text" class="form-control" id="search" name="search" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
        @if(Request::has('search'))
        <div class="ml-2">
            <a href="/order">go back ?</a>
        </div>
        @endif
    </form>
    <div class="row">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="text-center">
                        orders
                    </h3>
                </div>
                <div class="card-body">
                    @if($orders->count() > 0)
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>client name</th>
                                <th>Order Products</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <?php $client = $order->Client?>
                                <td>{{$order->id}}</td>
                                <td>{{$client->name}}</td>
                                <td><button class="btn btn-primary btn-sm order-products"
                                        data-url="{{ route('order.product' , $order->id) }}" data-method="get">view
                                        products
                                    </button></td>

                                <td>{{$order->created_at->toFormattedDateString()}}</td>

                                <td>
                                    <form action="{{route('order.destroy' , $order->id)}}" method="POST"
                                        style="display: inline-block;">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>

                                        <a href="{{route('client.order.edit',[$client->id,$order->id])}}"
                                            class="btn btn-info btn-sm">update</a>



                                </td>



                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="text-center d-flex justify-content-center">
                        {{$orders->links()}}
                    </div>
                    @else
                    <h4 class="text-center">
                        no search results were found
                    </h4>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card text-white bg-dark mb-3">
                <div class="card-header">
                    Order Details
                </div>
                <div class="card-body" id="orderProductList">

                </div>
            </div>
        </div>
    </div>
</div>

@endsection