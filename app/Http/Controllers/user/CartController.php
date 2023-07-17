<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $categories = Category::all();
        $carts = Cart::where('user_id', $user->id)->paginate(50);
        return view('user.cart', compact('user', 'categories', 'carts'));
    }

    public function cart(Request $request)
    {
        $cart = new Cart();
        $cart->product_id = $request->input('product_id');
        $cart->user_id = Auth::user()->id;
        $cart->status = "Added to Cart";
        $cart->save();

        return back();
    }

    public function detail($id)
    {
        $user = Auth::user();
        $carts = Cart::where('user_id', $user->id)->paginate(50);
        $product = Product::find($id);
        $categories = Category::all();
        return view('user.detail', compact('user', 'product', 'carts', 'categories'));
    }

    public function delete(string $id)
    {
        Cart::find($id)->delete();

        return back()->with('del', 'Cart Deleted!');
    }
}
