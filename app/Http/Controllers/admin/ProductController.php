<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $products = Product::paginate(5);
        $user = Auth::user();
        return view('admin.product.index', compact('products', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $user = Auth::user();
        return view('admin.product.create', compact('categories', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'color' => 'required',
            'size' => 'required',
            'description' => 'required',
            'quantity' => 'required|integer|min:1|max:5',
            'price' => 'required|integer|min:0',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'category_id' => 'required',
        ]);

        $image = $request->image;
        $imageName = uniqid() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/product-images', $imageName);

        Product::create([
            'name' => $request->name,
            'color' => $request->color,
            'size' => $request->size,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'image' => $imageName,
            'category_id' => $request->category_id,
        ]);

        return redirect('/products')->with('add', 'Product Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();
        $product = Product::find($id);
        return view('admin.product.show', compact('user', 'product'));
    }

    public function search(Request $request)
    {
        $user = Auth::user();
        $searchData = "%" . $request->search_data . "%";
        $products = Product::where('name', 'like', $searchData)->orWhere('description', 'like', $searchData)->orWhere('price', 'like', $searchData)->orWhereHas('category', function($category) use ($searchData){
            $category->where('name', 'like', $searchData);
        })->paginate(5);

        return view('admin.product.index', compact('products', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $user = Auth::user();
        return view('admin.product.edit', compact('product', 'categories', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'color' => 'required',
            'size' => 'required',
            'description' => 'required',
            'quantity' => 'required|integer|min:1|max:5',
            'price' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
            'category_id' => 'required',
        ]);

        $product = Product::find($id);
        if ($request->hasFile('image')) {
            $productImage = $product->image;
            File::delete('storage/product-images/' . $productImage);

            $image = $request->image;
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/product-images', $imageName);

            $data['image'] = $imageName;
        }
        $product->update($data);

        return redirect('/products')->with('add', 'Product Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $productImage = $product->image;
        File::delete('storage/product-images/'.$productImage);
        $product->delete();

        return back()->with('del', 'Product Deleted');
    }
}
