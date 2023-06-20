<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $user = Auth::user();
        $categories = Category::all();
        $products = Product::all();
        $users = User::all();
        $purchases = Purchase::all();
        $suppliers = Supplier::all();
        return view('admin.index', compact('user', 'categories', 'products', 'users', 'purchases', 'suppliers'));
    }
}
