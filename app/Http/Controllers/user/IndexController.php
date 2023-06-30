<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categories = Category::all();
        $products = Product::all();
        $carts = $user ? Cart::where('user_id', $user->id)->get() : null;
        return view('user.index', compact('user', 'categories', 'products', 'carts'));
    }
}
