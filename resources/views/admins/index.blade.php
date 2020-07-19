@extends('layouts.app')

@section('content')
@include('partials.Modals._deleteModal')

{{--This Page Doesn't Apply DRY concept , i know but i didn't want to keep wasting time with the ui *searched some time though*--}}
<div class="container">
    @role('Super_admin')
    <div class="d-flex justify-content-end mb-3">
        <a href="{{route('user.create')}}" class="btn btn-success "> Create a New Admin </a>
    </div>
    @endrole
    <form action="{{route('user.index')}}" method="GET" class="form-inline">

        <div class="form-group mx-sm-3 mb-2">
            <label for="inputPassword2" class="sr-only">Search</label>
            <input type="text" class="form-control" id="search" name="search" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <div class="card card-primary card-tabs">

        <div class="card-header p-0 pt-1">
            <div class="text-center mt-1">
                System Users
            </div>
            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                @role('Super_admin')
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-SuperAdmins-tab" data-toggle="pill"
                        href="#custom-tabs-one-SuperAdmins" role="tab" aria-controls="custom-tabs-one-SuperAdmins"
                        aria-selected="true">Super Admins</a>
                </li>
                @endrole
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-Admins-tab" data-toggle="pill"
                        href="#custom-tabs-one-Admins" role="tab" aria-controls="custom-tabs-one-Admins"
                        aria-selected="false">Admins</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-Users-tab" data-toggle="pill" href="#custom-tabs-one-Users"
                        role="tab" aria-controls="custom-tabs-one-Users" aria-selected="false">Users</a>
                </li>
            </ul>
        </div>

        <div class="card-body">
            @include('partials.sessions')
            <div class="tab-content" id="custom-tabs-one-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-one-SuperAdmins" role="tabpanel"
                    aria-labelledby="custom-tabs-one-SuperAdmins-tab">
                    @if($Superadmins->count() > 0 )
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Superadmins as $admin)
                            <tr>
                                <td>
                                    {{$admin->id }}
                                </td>
                                <td>
                                    {{$admin->FName }}
                                </td>
                                <td>
                                    {{$admin->email }}
                                </td>
                                <td>
                                    <img src="{{asset($admin->UserImage()) }}" alt="" width="110px" height="110px">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    @else
                    <div class="text-center">
                        <h3>As Wierd as it might sound , but no Superadmins Yet !</h3>
                    </div>
                    @endif
                </div>

                {{--End Of Super Admins Table--}}

                <div class="tab-pane fade" id="custom-tabs-one-Admins" role="tabpanel"
                    aria-labelledby="custom-tabs-one-Admins-tab">
                    @if($admins->count() > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)
                            <tr>
                                <td>
                                    {{$admin->id }}
                                </td>
                                <td>
                                    {{$admin->FName }}
                                </td>
                                <td>
                                    {{$admin->email }}
                                </td>
                                <td>
                                    <img src="{{asset($admin->UserImage()) }}" alt="" width="110px" height="110px">
                                </td>
                                @role('Super_admin')
                                <td>
                                    <button data-toggle="modal" data-target="#DeleteModal"
                                        class="btn btn-danger DeleteModal"
                                        data-url="{{url('user',$admin->id)}}">Delete</button>

                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{route('user.edit',$admin->id)}}">Update</a>
                                </td>

                                @endrole
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    @else
                    <div class="text-center">
                        <h3>No Admins Yet</h3>
                    </div>
                    @endif
                </div>



                <div class="tab-pane fade" id="custom-tabs-one-Users" role="tabpanel"
                    aria-labelledby="custom-tabs-one-Users-tab">
                    @if($users->count() > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>
                                    {{$user->id }}
                                </td>
                                <td>
                                    {{$user->FName }}
                                </td>
                                <td>
                                    {{$user->email }}
                                </td>
                                <td>
                                    <img src="{{asset('storage/uploads/users/'. $user->Image) }}" alt="" width="110px"
                                        height="110px">
                                </td>
                                @role('Super_admin|admin')
                                <td>
                                    <button data-toggle="modal" data-target="#DeleteModal"
                                        class="btn btn-danger DeleteModal"
                                        data-url="{{url('user',$user->id)}}">Delete</button>
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{route('user.edit',$user->id)}}">Update</a>
                                </td>
                                @endrole

                            </tr>
                            @endforeach
                            @else
                            <div class="text-center">
                                <h3>No users Yet</h3>
                            </div>
                            @endif
                        </tbody>

                    </table>
                </div>

            </div>
        </div>


    </div>


</div>



</div>

@endsection