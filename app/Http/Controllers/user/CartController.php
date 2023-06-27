<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categories = Category::all();
        return view('user.cart', compact('user', 'categories'));
    }

    public function cart()
    {
        //
    }
}
