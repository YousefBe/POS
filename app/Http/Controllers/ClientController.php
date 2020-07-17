<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ClientController extends Controller
{

    public function index(Request $request)
    {
        $clients = Client::when($request->search, function ($q) use ($request) {
            return $q->search('name', 'phone', $request->search);
        })->get();
        return view('Clients.index', compact('clients'));
    }


    public function create()
    {
        return view('Clients.create');
    }


    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|unique:clients,phone|numeric',
            'Image' => 'sometimes|image'
        ]);
        $data = request()->except('Image');
        if ($request->has('Image')) {
            $data['Image'] = request()->Image->hashName();
            $this->StoreImage($request);
        }

        Client::create($data);
        session()->flash('Client-added', 'Client was Added Successfully ');
        return redirect('/client');
    }


    public function show(Client $client)
    {
        //
    }


    public function edit(Client $client)
    {
        return view('Clients.edit', compact('client'));
    }


    public function update(Request $request, Client $client)
    {
        request()->validate([
            'name' => 'sometimes',
            'address' => 'sometimes',
            'phone' => 'sometimes|numeric',
            'Image' => 'image|sometimes'
        ]);
        $data = request()->except('Image');

        if (request()->has('Image')) {
            if ($client->Image != 'client.jpg') {
                $img_path = $client->ClientImage();
                if (File::exists($img_path)) {
                    File::delete($img_path);
                }
            }
            $data['Image'] = request()->Image->hashName();
            $this->StoreImage($request);
        }

        $client->update($data);
        session()->flash('Client-updated', 'Client was updated Successfully ');
        return redirect('/client');
    }


    public function destroy(Client $client)
    {
        $client->delete();
    }

    public function StoreImage($request)
    {
        if (request()->has('Image')) {

            $img = Image::make($request->Image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('storage/uploads/clients/' . $request->Image->hashName()));
        }
    }
}