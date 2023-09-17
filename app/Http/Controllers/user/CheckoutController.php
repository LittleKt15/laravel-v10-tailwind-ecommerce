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

    public function checkout(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'address' => 'required',
            'direction' => 'required',
            'card_no' => 'required',
            'exp_date' => 'required',
            'cvv' => 'required',
            'total_quantity' => 'required',
            'total_amount' => 'required',
            'vat' => 'required',
            'grand_total' => 'required',
        ]);
    }
}
