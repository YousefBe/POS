@extends('layouts.app')

@section('content')
<div class="container">
    @role('Super_admin|admin')
    <div class="d-flex justify-content-end mb-2">
        <a class="btn btn-success btn-sm" href="{{route('product.create')}}">Add new Product</a>
    </div>
    @endrole
    <div class="d-flex justify-content-start mb-2">
        <form action="{{route('product.index')}}" method="GET">
            <label class="mr-sm-2" for="inlineFormCustomSelect">Categories</label>
            <select class="custom-select mr-sm-2" name="category" id="inlineFormCustomSelect">
                <option selected>Choose Category</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <button type="submit" class=" btn btn-primary"> Sort </button>
        </form>
        <form action="{{route('product.index')}}" method="GET">
            <label class="mr-sm-2" for="search">Products</label>
            <input type="text" class="form-control" name="search">
            <button type="submit" class=" btn btn-primary"> search </button>
        </form>

    </div>
    <div class="card card-default">
        <div class="card-header">
            <h3 class="text-center">
                Products
            </h3>
        </div>
        <div class="card-body">
            @include('partials.sessions')
            @if($products->count() > 0)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Product</th>
                        <th>Image</th>
                        <th>Category</th>
                        @role('Super_admin|admin')
                        <th>Purcahse price</th>
                        @endrole
                        <th>Selling Price</th>
                        <th>Stock</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>
                            <img src="{{asset($product->productImage())}}" alt="" style="width: 120px; hight:140px"
                                class="img-thumbnail">
                        </td>
                        <td>
                            <form action="{{route('product.index')}}" method="GET">
                                <button type="submit" class="btn btn-link" value="{{$product->category->id}}"
                                    name="category">{{$product->category->name}}
                                </button>
                            </form>
                        </td>
                        @role('Super_admin|admin')
                        <td>{{$product->purchase_price}}</td>
                        @endrole
                        <td>{{$product->selling_price}}</td>
                        <td>{{$product->stock}}</td>
                        <td class="text-center">
                            @role('Super_admin|admin')
                            <button data-toggle="modal" data-target="#DeleteModal"
                                class="btn btn-danger btn-sm DeleteModal"
                                data-url="{{url('product', $product->id)}}">Delete</button>
                            @include('partials.Modals._deleteModal')

                            <a href="{{route('product.edit' , $product->id)}}" class="btn btn-info btn-sm">Update</a>
                            @endrole

                            <a href="{{route('product.show' , $product->id)}}" class="btn btn-success btn-sm">view</a>
                        </td>



                    </tr>
                    @endforeach

                </tbody>
            </table>

            @else
            <h3 class="text-center">
                no products yet :)
            </h3>
            @endif
        </div>
    </div>
    @if($products->count() > 0)
    <div class="text-center">
        {{$products->links()}}
    </div>
    @endif
</div>

@endsection