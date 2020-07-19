@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('client.index')}}" method="GET" class="form-inline">
        <div class="form-group mx-sm-3 mb-2">
            <label for="search" class="sr-only">Search</label>
            <input type="text" class="form-control" id="search" name="search" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <div class="d-flex justify-content-end mb-2">
        <a class="btn btn-success btn-sm" href="{{route('client.create')}}">Add new client</a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            <h3 class="text-center">
                clients
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>phone</th>
                        <th>address</th>
                        <th>Add Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                    <tr>
                        <td>{{$client->id}}</td>
                        <td>{{$client->name}}</td>
                        <td><img src="{{asset($client->ClientImage() )}}" alt="" class="img-thumbnail"
                                style="width: 100px;height:100px;"></td>
                        <td>{{$client->phone}}</td>
                        <td>{{$client->address}}</td>
                        <td>
                            <a href="{{route('client.order.create' ,$client->id)}}" class="btn btn-success"> Create
                                Order </a>
                        </td>

                        <td>

                            <button type="submit" class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#DeleteModal" data-url="{{'client', $client->id}}">Delete</button>
                            @include('partials.Modals._deleteModal')
                            <a href="{{route('client.edit' , $client->id)}}" class="btn btn-info btn-sm">Update</a>
                        </td>



                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection