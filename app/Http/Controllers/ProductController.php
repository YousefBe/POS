<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Super_admin|admin')->only('create', 'destroy', 'edit');
    }

    public function index(Request $request)
    {
        $categories = Category::all();

        $products = Product::when($request->category, function ($q) use ($request) {
            return $q->where('category_id', $request->category);
        })->when($request->search, function ($qu) use ($request) {
            return $qu->Search('name', $request->search);
        })->paginate(5);

        return view('products.index', compact('products', 'categories'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }


    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'selling_price' => 'integer|required',
            'purchase_price' => 'required|integer',
            'category_id' => 'required|integer',
            'stock' => 'required|integer',
            'description' => 'required',
            'Image' => 'sometimes|image'
        ]);
        $data = request()->except('Image');
        if ($request->has('Image')) {
            $data['Image'] = $request->Image->hashName();
            $this->StoreImage($request);
        }
        Product::create($data);

        session()->flash('product-added', 'Product was created successfully ');
        return redirect('/product');
    }


    public function show(Product $product)
    {
        return view('products.product', compact('product'));
    }


    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('categories', 'product'));
    }


    public function update(Request $request, Product $product)
    {
        request()->validate([
            'name' => 'sometimes',
            'selling_price' => 'integer|sometimes',
            'purchase_price' => 'sometimes|integer',
            'category_id' => 'sometimes|integer',
            'stock' => 'sometimes|integer',
            'description' => 'sometimes',
            'Image' => 'sometimes|image'
        ]);
        $data = request()->except('Image');

        if (request()->has('Image')) {
            if ($product->Image != 'product.jpg') {
                $img_path = 'storage/uploads/products/' . $product->Image;
                if (File::exists($img_path)) {
                    file::delete($img_path);
                }
            }
            $this->StoreImage($request);
            $data['Image'] = $request->Image->hashName();
        }

        $product->update($data);

        session()->flash('product-updated', 'Product was successfully updated ');
        return redirect('/product');
    }


    public function destroy(Product $product)
    {
        if ($product->Image != 'product.jpg') {
            $img_path = 'storage/uploads/products/' . $product->Image;
            if (File::exists($img_path)) {
                file::delete($img_path);
            }
        }
        $product->delete();
        session()->flash('product-deleted', 'Product was deleted ');
        return redirect('/product');
    }


    public function StoreImage($request)
    {
        if (request()->has('Image')) {

            $img = Image::make($request->Image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('storage/uploads/products/' . $request->Image->hashName()));
        }
    }
}
