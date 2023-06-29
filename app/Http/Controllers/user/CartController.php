<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categories = Category::all();
        $carts = Cart::all();
        return view('user.cart', compact('user', 'categories', 'carts'));
    }

    public function cart(Request $request)
    {
        $cart = new Cart();
        $cart->product_id = $request->input('product_id');
        $cart->user_id = Auth::user()->id;
        $cart->save();

        return back();
    }
}
