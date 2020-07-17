@extends('layouts.app')
@section('content')


<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <div class="text-center">
                <h4>Update </h4>
            </div>
        </div>

        <div class="card-body">
            @if($user->hasRole('Super_admin'))
            <h2 class="text-center">You Can't</h2>
            @else
            <div style="width: 60%; float: left;">
                @include('partials.erorrs')
                <form action="{{route('user.update' , $user->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="Name">First Name</label>
                        <input type="text" name="FName" class="form-control" value="{{$user->FName}}">
                    </div>
                    <div class="form-group">
                        <label for="Last Name">Last Name</label>
                        <input type="text" name="LName" class="form-control" value="{{$user->LName}}">
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="text" name="email" class="form-control" value="{{$user->email}}">
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="confirm">Password Confirmation</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Image">Image</label>
                        <input type="file" name="Image" class="form-control-file">
                    </div>

                    <div class="form-group">
                        <label for="permissions">his Permissions</label>
                        <select name="permissions[]" id="permissions" class="form-control " multiple>
                            @foreach ($permissions as $permission)
                            <option value="{{$permission->id}}" @if($user->hasPermission($permission->name))
                                selected @endif>
                                {{$permission->display_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
            @endif
        </div>

    </div>



</div>

@endsection