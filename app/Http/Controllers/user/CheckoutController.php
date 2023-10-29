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
        $categories = Category::all();

        if ($product->quantity > 0) {
            return view('user.checkout', compact('categories', 'product'));
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
            'card_holder' => 'required',
            'card_no' => 'required',
            'exp_date' => 'required',
            'cvc' => 'required|numeric',
            'address' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'total_quantity' => [
                'required',
                'integer',
                'min:1',
                function ($attribute, $value, $fail) use ($productQuantity) {
                    if ($value > $productQuantity) {
                        $fail($attribute . ' must be less than or equal to the product quantity.');
                    }
                },
            ],
            'product_id' => 'required',
        ]);

        $data['order_no'] = 'O-' . str_pad(Checkout::count() + 1, 3, '0', STR_PAD_LEFT);
        $totalAmount = $product->price * $data['total_quantity'];
        $vat = 0.05 * $totalAmount;
        $grandTotal = $totalAmount + $vat;

        $data['total_amount'] = $totalAmount;
        $data['vat'] = $vat;
        $data['grand_total'] = $grandTotal;
        $data['user_id'] = auth()->user()->id;
        // $data['product_id'] = $product->id;
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
