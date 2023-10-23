<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $search = "%" . request('search') . "%";
        $carts = Cart::when($search, function ($query) use ($search) {
            $query->whereHas('product', function ($product) use ($search) {
                $product->where('name', 'like', $search)->orWhere('price', 'like', $search)->orWhereHas('category', function ($category) use ($search) {
                    $category->where('name', 'like', $search);
                });
            });
        })->where('user_id', auth()->user()->id)->paginate(50);
        return view('user.cart', compact('categories', 'carts'));
    }

    public function cart(Request $request)
    {
        $cart = new Cart();
        $cart->product_id = $request->input('product_id');
        $cart->user_id = auth()->user()->id;
        $cart->status = "Added to Cart";
        $cart->save();

        return back();
    }

    public function detail(Product $product)
    {
        $carts = Cart::where('user_id', auth()->user()->id)->paginate(50);
        $categories = Category::all();

        if ($product->quantity > 0) {
            return view('user.detail', compact('product', 'carts', 'categories'));
        } else {
            abort(404, 'Page Not Found!');
        }
    }

    public function delete(Cart $cart)
    {
        $cart->delete();

        return back()->with('del', 'Cart Deleted!');
    }
}
