<?php

namespace App\Http\Controllers;

use App\Category;
use App\Client;
use App\order;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clients = Client::all();
        $products = Product::all();
        $categories = Category::all();
        $orders = order::all();
        return view('home', compact('clients', 'products', 'categories', 'orders'));
    }
}
