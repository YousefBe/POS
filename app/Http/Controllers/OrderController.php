<?php

namespace App\Http\Controllers;

use App\order;
use App\Client;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
    }

    public function create(Client $client)
    {
        $categories = Category::all();
        $orders = $client->Orders()->with('Products')->get();
        return view('Clients.orders.create', compact('categories', 'client', 'orders'));
    }
    public function store(Request $request, Client $client)

    {
        $this->attach_order($request, $client);
        session()->flash('order-created', 'order was created successfully');
        return redirect('/order');
    }
    public function edit(client $client, order $order)
    {
        $categories = Category::all();

        return view('Clients.orders.edit', compact('client', 'order', 'categories'));
    }



    function update(Request $request, Client $client, order $order)
    {
        $this->detach_order($order);
        $this->attach_order($request, $client);
        session()->flash('order-updated', 'order was updated successfully');
        return redirect('/order');
    }

    public function attach_order($request, $client)
    {
        $request->validate([
            'products' => 'required|array',
            // 'quantity' => 'required|array'
        ]);


        $order = $client->Orders()->create([]);
        $order->Products()->attach($request->products);

        $total_price = 0;

        foreach ($request->products as $id => $quantity) {
            $TPro = Product::FindOrFail($id);
            $total_price += $TPro->selling_price * $quantity['quantity'];

            $TPro->update([
                'stock' => $TPro->stock - $quantity['quantity']
            ]);

            $order->update([
                'total_price' => $total_price
            ]);
        }
    }

    private function detach_order($order)
    {
        foreach ($order->Products as $product) {
            $product->update([
                'stock' => $product->stock +  $product->pivot->quantity
            ]);
        }
        $order->delete();
    }
}