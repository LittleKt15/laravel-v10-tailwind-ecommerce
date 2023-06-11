<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $categories = Category::paginate(5);
        $user = Auth::user();
        return view('admin.category.index', compact('categories', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('admin.category.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect('/categories')->with('add', 'Categories Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function search(Request $request)
    {
        $user = Auth::user();
        $searchData = "%" . $request->search_data . "%";
        $categories = Category::where('name', 'like', $searchData)->paginate(5);

        return view('admin.category.index', compact('categories', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        $user = Auth::user();
        return view('admin.category.edit', compact('category', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,'.$id,
        ]);

        Category::find($id)->update([
            'name' => $request->name,
        ]);

        return redirect('/categories')->with('add', 'Category Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::find($id)->delete();
        return back()->with('del', 'Category Deleted!');
    }
}
