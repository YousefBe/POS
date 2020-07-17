@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials.erorrs')
    <div class="card card-defaul">
        <div class="card-header">
            <h3 class="text-center">
                Create clients
            </h3>
        </div>
        <div class="card-body">
            <form action="{{route('client.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" name="name" class="form-control" style="width: 40%">
                </div>

                <div class="form-group">
                    <label for="Name">Phone</label>
                    <input type="text" name="phone" class="form-control" style="width: 40%">
                </div>

                <div class="form-group">
                    <label for="Name">Address</label>
                    <input type="text" name="address" class="form-control" style="width: 40%">
                </div>
                <div class="form-group">
                    <label for="Name">Image</label>
                    <input type="file" class="form-control-file" name="Image">
                </div>


                <button type="submit" class="btn btn-success btn-sm mt-2">Add</button>
            </form>
        </div>
    </div>
</div>
@endsection