<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $user = Auth::user();
        $carts = Cart::where('user_id', $user->id)->paginate(50);
        $categories = Category::all();
        $product = Product::find($id);
        return view('user.checkout', compact('user', 'carts', 'categories', 'product'));
    }

    public function checkout()
    {

    }
}
