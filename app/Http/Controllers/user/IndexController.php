<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        // $carts = auth()->user() ? Cart::where('user_id', auth()->user()->id)->get() : null;
        return view('user.index', compact('categories', 'products'));
    }
}
