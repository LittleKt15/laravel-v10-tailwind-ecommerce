<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Checkout;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'categories' => Category::all(),
            'products' => Product::all(),
            'purchases' => Purchase::all(),
            'suppliers' => Supplier::all(),
            'orders' => Checkout::all(),
        ]);
    }
}
