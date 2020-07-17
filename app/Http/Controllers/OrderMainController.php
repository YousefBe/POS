<?php

namespace App\Http\Controllers;

use App\order;
use Illuminate\Http\Request;

class OrderMainController extends Controller
{
    public function index(Request $request)
    {
        $orders = order::WhereHas('client', function ($q) use ($request) {
            return $q->where('name', 'like', '%' . $request->search . '%');
        })->paginate(5);
        return view('orders.index', compact('orders'));
    }

    public function Products(order $order)
    {
        $products = $order->Products;
        return view('orders._products', compact('products', 'order'));
    }
    public function destroy(order $order)
    {
        foreach ($order->Products as $product) {
            $product->update([
                'stock' => $product->stock +  $product->pivot->quantity
            ]);
        }
        $order->delete();
        session()->flash('delete-order', 'order was successfully deleted ');
        return redirect('/order');
    }
}