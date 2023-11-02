<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $selectedCategoryId = request('category_id');
        $productsQuery = Product::query();

        if ($selectedCategoryId) {
            $productsQuery->where('category_id', $selectedCategoryId);
        }

        $products = $productsQuery->get();

        return view('user.index', compact('categories', 'products'));
    }

    public function search()
    {
        $categories = Category::all();
        $search = "%" . request('search') . "%";

        $products = Product::where('name', 'ilike', $search)->orWhere('description', 'like', $search)->get();

        return view('user.index', compact('categories', 'products'));
    }
}
