@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card card-defaul">
        <div class="card-header">
            <h3 class="text-center">
                Create Categories
            </h3>
        </div>
        <div class="card-body">
            <form action="{{route('category.store')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" name="name" class="form-control" style="width: 40%">
                    <button type="submit" class="btn btn-success btn-sm mt-2">Add</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection