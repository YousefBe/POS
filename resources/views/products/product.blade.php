@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center mt-4">
        <div class="card " style="width: 40%">
            <div class="card-header">
                <img class="card-img-top" src="{{asset($product->productImage())}}" alt="Card image cap"
                    style="width:100%;height:180px;">
            </div>
            <div class="card-body">
                <h5 class="card-title text-center">{{$product->name}}</h5>
                <p>{!! $product->description !!}</p>
                <P>{{$product->selling_price}}</P>
                <P>{{$product->purchase_price}}</P>
                <P>{{$product->stock}}</P>
            </div>
        </div>
    </div>
</div>

@endsection