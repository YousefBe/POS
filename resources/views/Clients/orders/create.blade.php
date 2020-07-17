@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            @foreach ($categories as $category)
            @if($category->Product()->count() > 0 )
            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <a class="btn btn-link" data-toggle="collapse"
                                href="#{{str_replace(' ' , '-' , $category->name)}}" aria-expanded="true"
                                aria-controls="collapseOne">
                                {{$category->name }}
                            </a>
                        </h5>
                    </div>

                    <div id="{{str_replace(' ' , '-' , $category->name)}}" class="collapse" aria-labelledby="headingOne"
                        data-parent="#accordion">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>Add</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category->Product as $product)
                                    <tr>
                                        <td>{{$product->name}}</td>
                                        <td> {{$product->selling_price}}</td>
                                        <td> {{$product->stock}}</td>
                                        <td>
                                            <a href="" id="product{{$product->id}}" data-name="{{$product->name}}"
                                                data-id="{{$product->id}}" data-price="{{$product->selling_price}}"
                                                data-max="{{$product->stock}}"
                                                class="btn btn-success btn-sm add-product-btn">Add</a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>

        <div class="col-lg">
            <form action="{{route('client.order.store' , $client->id)}}" method="POST">
                @csrf

                <div class="card card-default">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>price</th>
                                </tr>
                            </thead>
                            <tbody class="order-list">

                            </tbody>
                        </table>
                        <h4 class="text-center">
                            Total
                            <span class="total-price">0</span>
                        </h4>
                        <button type="submit" class="btn btn-primary disabled" id="add-order-btn">order</button>
                    </div>
                </div>
            </form>
            <div class="card card-default">
                <div class="card-header">
                    Client orders History
                </div>
                <div class="card-body">
                    @foreach ($orders as $order)
                    <table class="table table-hover pt-2">
                        <thead>
                            <tr>
                                <th>order id</th>
                                <th>product</th>
                                <th>quantity</th>
                                <th>price</th>
                                <th>order total price</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($order->Products as $product)


                            <tr>
                                <td>{{$order->id}}</td>
                                <td> {{$product->name}}</td>
                                <td> {{$product->pivot->quantity}}</td>
                                <td> {{$product->selling_price}}</td>

                            </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td> {{$order->total_price}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection