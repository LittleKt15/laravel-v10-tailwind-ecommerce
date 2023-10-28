<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Checkout;

class OrderHistoryController extends Controller
{
    public function index()
    {
        $search = "%" . request('search') . "%";
        $categories = Category::all();
        $orders = Checkout::where('user_id', auth()->user()->id)
            ->where(function ($query) use ($search) {
                $query->whereHas('product', function ($product) use ($search) {
                    $product->where('name', 'ilike', $search)->orWhereHas('category', function ($category) use ($search) {
                        $category->where('name', 'ilike', $search);
                    });
                })->orWhere('total_quantity', 'like', $search)->orWhere('grand_total', 'like', $search)->orWhere('status', 'ilike', $search);
            })->orderBy('id', 'desc')->paginate(5);

        return view('user.order', compact('categories', 'orders'));
    }

    public function show(Checkout $checkout)
    {
        $categories = Category::all();
        return view('user.show', compact('checkout', 'categories'));
    }
}
