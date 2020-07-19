@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card mb-3">
        <div class="card-header">
            <div class="text-center">
                <h4>Create an Admin </h4>
            </div>
        </div>

        <div class="card-body">
            <div style="width: 60%; float: left;">
                @include('partials.erorrs')
                <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="Name">First Name</label>
                        <input type="text" name="FName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Last Name">Last Name</label>
                        <input type="text" name="LName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="text" name="email" class="form-control">
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
                            <option value="{{$permission->id}}">{{$permission->display_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </form>
            </div>
        </div>

    </div>



</div>

@endsection