<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $search = "%" . request('search') . "%";
        $products = Product::when($search, function ($query) use ($search) {
            $query->where('name', 'like', $search)->orWhere('description', 'like', $search)->orWhere('price', 'like', $search)->orWhereHas('category', function ($category) use ($search) {
                $category->where('name', 'like', $search);
            });
        })->orderBy('id', 'desc')->paginate(5);

        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $product = new Product();
        return view('admin.product.create-edit', compact('categories', 'product'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'color' => 'required',
            'size' => 'required',
            'description' => 'required',
            'price' => 'required|integer|min:0',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'category_id' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('product-images', 'public');
        }

        Product::create($data);

        return redirect('/admin/products')->with('add', 'Product Created!');
    }

    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.product.create-edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required',
            'color' => 'required',
            'size' => 'required',
            'description' => 'required',
            'price' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
            'category_id' => 'required',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $data['image'] = $request->file('image')->store('product-images', 'public');
        }
        $product->update($data);

        return redirect('/admin/products')->with('add', 'Product Updated!');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();

        return back()->with('del', 'Product Deleted');
    }
}
