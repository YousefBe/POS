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

                    <div id="{{str_replace(' ' , '-' , $category->name)}}" class="collapse show"
                        aria-labelledby="headingOne" data-parent="#accordion">
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
            <form action="{{route('client.order.update' , [$client->id,$order->id])}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="card card-default">
                    <div class="card-header">
                        Update Order
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
                                @foreach ($order->Products as $product)
                                <tr>
                                    <td> {{$product->name}} </td>
                                    <td><input type="number" name="products[{{$product->id}}][quantity]"
                                            max="{{$product->stock}}" data-price="{{$product->selling_price}}"
                                            class="form-control input-sm PQuantity" min="1"
                                            value="{{$product->pivot->quantity}}"> </td>
                                    <td class="PPrice"> {{($product->selling_price)*($product->pivot->quantity)}}</td>
                                    <td><button class="btn btn-danger btn-sm remove-product-btn" data-id="${id}"><i
                                                class="fa fa-trash" aria-hidden="true"></i>
                                        </button> </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <h4 class="text-center">
                            Total
                            <span class="total-price">{{$order->total_price}}</span>
                        </h4>
                        <div class="d-flex justify-content-center"><button type="submit"
                                class="btn btn-primary">update</button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection