<?php

namespace App\Http\Controllers;

use App\User;
use App\Permission;
use LaratrustUserTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Super_admin|admin'])->only('index', 'destroy', 'edit');
        $this->middleware(['role:Super_admin'])->only('create');
    }

    public function index(Request $request)
    {
        # DRY  R I P 
        $admins = User::whereRoleIs('admin')->when($request->search, function ($query) use ($request) {
            return $query->Search('FName', 'LName', $request->search);
        })->get();

        $users = User::whereRoleIs('user')->when($request->search, function ($query) use ($request) {
            return $query->Search('FName', 'LName', $request->search);
        })->get();

        $Superadmins = User::WhereRoleIs('Super_admin')->when($request->search, function ($query) use ($request) {
            return $query->Search('FName', 'LName', $request->search);
        })->get();

        return view('admins.index', compact('Superadmins', 'admins', 'users'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admins.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'FName' => 'required',
            'LName' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
            'permissions' => 'required',
            'Image' => 'image|required'
        ]);
        $data = request()->except('permissions', 'Image');

        $this->StoreImage($request);
        $data['Image'] = $request->Image->hashName();
        $user = User::create($data);

        $user->attachRole('admin');
        $user->syncPermissions(request()->permissions);

        session()->flash('Admin-Created', 'an admin was created successfully !');
        return redirect('/user');
    }


    public function edit(User $user)
    {
        $permissions = Permission::all();
        return view('admins.edit', compact('user', 'permissions'));
    }


    public function update(Request $request, User $user)
    {
        request()->validate([
            'FName' => 'sometimes',
            'LName' => 'sometimes',
            'email' => 'sometimes',
            'password' => 'sometimes|confirmed',
            'permissions' => 'sometimes',
            'Image' => 'sometimes'
        ]);
        $data = request()->except('permissions', 'Image');

        if (request()->has('Image')) {
            if ($user->Image != 'default.jpg') {
                $image_path = 'storage/uploads/users/' . $user->Image;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
        }
        $data['Image'] = $request->Image->hashName();
        $this->StoreImage($request);
        $user->update($data);
        if ($request->permissions) {
            $user->syncPermissions(request()->permissions);
        }

        session()->flash('user-updated', 'user was updated successfully !');
        return redirect('/user');
    }

    public function destroy(User $user)
    {

        $user->detachRole('admin');
        $user->detachPermissions($user->permissions);
        $user->delete();

        session()->flash('user-Deleted', 'user was Successfully Deleted !');
        return redirect('/user');
    }


    public function StoreImage($request)
    {
        if (request()->has('Image')) {

            $img = Image::make($request->Image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('storage/uploads/users/' . $request->Image->hashName()));
        }
    }
}