<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Checkout;
use App\Models\Product;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
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
            'total_quantity' => 'required|integer|min:1',
            'total_amount' => 'required',
            'vat' => 'required',
            'grand_total' => 'required',
        ]);

        $checkout = new Checkout;
        $checkout->phone = request()->phone;
        $checkout->address = request()->address;
        $checkout->direction = request()->direction;
        $checkout->card_no = request()->card_no;
        $checkout->exp_date = request()->exp_date;
        $checkout->cvv = request()->cvv;

        $checkout->total_quantity = request()->total_quantity;

        $checkout->total_amount = request()->total_amount;

        $checkout->vat = 0.05;

        $checkout->grand_total = request()->total_amount * 0.05;

        $checkout->user_id = auth()->user()->id;
        $checkout->product_id = request()->product_id;
        $checkout->save();

        return redirect('/index')->with('', '');
    }
}
