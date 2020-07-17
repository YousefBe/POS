@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card card-defaul">
        <div class="card-header">
            <h3 class="text-center">
                Update a category
            </h3>
        </div>
        <div class="card-body">
            <form action="{{route('category.update' , $category->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" name="name" value="{{$category->name}}" class="form-control" style="width: 40%">
                    <button type="submit" class="btn btn-success btn-sm mt-2">Update</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection