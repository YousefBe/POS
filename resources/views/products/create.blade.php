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
            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="Name">name</label>
                    <input name="name" class="form-control " style="width: 40%">

                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" name="category_id" style="width: 40%">
                        <option selected>Choose Category</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label for="purchase_price">purchase price</label>
                    <input name="purchase_price" class="form-control " style="width: 40%">

                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input name="selling_price" class="form-control " style="width: 40%">

                </div>
                <div class="form-group">
                    <label for="Stock">Stock</label>
                    <input name="stock" class="form-control " style="width: 40%">

                </div>
                <div class="form-group">
                    <label for="Image">Image</label>
                    <input name="Image" class="form-control-file " type="file" style="width: 40%">

                </div>
                <div class="form-group" style="width: 60%">
                    <label for="Description">Description</label>
                    <input id="description" type="hidden" name="description" class="form-control ">
                    <trix-editor input="description" class="trix-content"></trix-editor>

                </div>

                <button type="submit" class="btn btn-success btn-sm mt-2">Add</button>
            </form>
        </div>
    </div>
</div>
@endsection