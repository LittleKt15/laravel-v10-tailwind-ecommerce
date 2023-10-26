<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Checkout;
use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Product $product)
    {
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        $categories = Category::all();

        if ($product->quantity > 0) {
            return view('user.checkout', compact('carts', 'categories', 'product'));
        } else {
            abort(404, 'Page Not Found!');
        }
    }

    public function checkout(Request $request)
    {
        $product = Product::find(request()->product_id);
        $productQuantity = $product->quantity;

        $data = $request->validate([
            'phone' => 'required',
            'address' => 'required',
            'direction' => 'required',
            'card_no' => 'required',
            'exp_date' => 'required',
            'cvv' => 'required|numeric',
            // 'total_quantity' => 'required|integer|min:1',
            'total_quantity' => [
                'required',
                'integer',
                'min:1',
                function ($attribute, $value, $fail) use ($productQuantity) {
                    if ($value > $productQuantity) {
                        $fail($attribute . ' is greater than the available quantity.');
                    }
                },
            ],
            'total_amount' => 'required',
            'vat' => 'required',
            'grand_total' => 'required',
            'product_id' => 'required',
        ]);

        $data['user_id'] = auth()->user()->id;
        $data['order_no'] = 'O-' . str_pad(Checkout::count() + 1, 3, '0', STR_PAD_LEFT);
        Checkout::create($data);

        $newQuantity = $product->quantity - $data['total_quantity'];
        $product->quantity = $newQuantity;
        $product->save();

        Cart::where('user_id', auth()->user()->id)
            ->where('product_id', $data['product_id'])
            ->delete();

        return redirect('/')->with('success', 'Your Products Will Be Arrived Soon!');
    }
}
