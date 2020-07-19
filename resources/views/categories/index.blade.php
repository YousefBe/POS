@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-end mb-2">
        <a class="btn btn-success btn-sm" href="{{route('category.create')}}">Add new category</a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            <h3 class="text-center">
                Categories
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Related Products</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>
                            <form action="{{route('product.index')}}" method="GET">
                                <button type="submit" class="btn btn-link" value="{{$category->id}}"
                                    name="category">{{$category->name}}
                                </button>
                            </form>
                        </td>
                        <td>


                            <button class="btn btn-danger btn-sm DeleteModal" data-toggle="modal"
                                data-target="#DeleteModal" data-url="{{url('category',$category->id)}}">Delete</button>
                            @include('partials.Modals._deleteModal')
                            <a href="{{route('category.edit' , $category->id)}}" class="btn btn-info btn-sm">Update</a>
                        </td>



                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection