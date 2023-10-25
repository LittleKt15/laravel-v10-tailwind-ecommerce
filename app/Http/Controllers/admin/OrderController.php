<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $search = "%" . request('search') . "%";
        $orders = Checkout::when($search, function ($query) use ($search) {
            $query->where('phone', 'ilike', $search)->orWhere('status', 'like', $search)->orWhereHas('product', function ($product) use ($search) {
                $product->where('name', 'like', $search);
            })->orWhereHas('user', function ($user) use ($search) {
                $user->where('name', 'like', $search);
            });;
        })->orderBy('id', 'desc')->paginate(5);

        return view('admin.order.index', compact('orders'));
    }

    public function show(Checkout $checkout)
    {
        return view('admin.order.show', compact('checkout'));
    }

    public function destroy(Checkout $checkout)
    {
        $checkout->delete();

        return back()->with('del', 'Order List Deleted!');
    }

    public function statusUpdate()
    {
        //
    }
}
