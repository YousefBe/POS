@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card card-defaul">
        <div class="card-header">
            <h3 class="text-center">
                Create product
            </h3>
        </div>
        <div class="card-body">
            @include('partials.erorrs')
            <form action="{{route('product.update' , $product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')


                <div class="form-group">
                    <label for="Name">name</label>
                    <input name="name" class="form-control " value="{{$product->name}}" style="width: 40%">

                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" name="category_id" style="width: 40%">
                        <option selected>Choose Category</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}" @if($category->id ==
                            $product->category_id) selected @endif>{{$category->name}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label for="purchase_price">purchase price</label>
                    <input name="purchase_price" class="form-control " value="{{$product->purchase_price}}"
                        style="width:40%">

                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input name="selling_price" class="form-control " value="{{$product->selling_price}}"
                        style="width: 40%">

                </div>
                <div class="form-group">
                    <label for="Stock">Stock</label>
                    <input name="stock" class="form-control " value="{{$product->stock}}" style="width: 40%">

                </div>
                <div class="form-group">
                    <label for="Image">Image</label>
                    <input name="Image" class="form-control-file " type="file" style="width: 40%">
                    <img src="{{asset($product->productImage())}}" style="width: 120px ;height:120px;" alt=""
                        class="img-thumbnail">
                </div>
                <div class="form-group" style="width: 60%">
                    <label for="Description">Description</label>
                    <input id="content" type="hidden" name="description" class="form-control "
                        value="{!! $product->description  !!}">
                    <trix-editor input="content" class="trix-content"></trix-editor>

                </div>

                <button type="submit" class="btn btn-success btn-sm mt-2">Add</button>
            </form>
        </div>
    </div>
</div>
@endsection