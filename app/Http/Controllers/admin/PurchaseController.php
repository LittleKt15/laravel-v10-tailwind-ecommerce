<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
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
        $user = Auth::user();
        $purchases = Purchase::paginate(5);
        return view('admin.purchase.index', compact('user', 'purchases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $products = Product::all();
        $suppliers = Supplier::all();
        return view('admin.purchase.create', compact('user', 'products', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'supplier_id' => 'required',
            'quantity' => 'required|integer|min:1',
            'amount' => 'required|numeric|min:1',
            'vat' => 'required|numeric|min:1',
            'grandtotal' => 'required|numeric|min:1',
        ]);

        Purchase::create([
            'name' => Auth::user()->name,
            'product_id' => $request->product_id,
            'supplier_id' => $request->supplier_id,
            'quantity' => $request->quantity,
            'amount' => $request->amount,
            'vat' => $request->vat,
            'grandtotal' => $request->grandtotal,
        ]);

        return redirect('/purchases')->with('add', 'Purchase Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();
        $purchase = Purchase::find($id);
        return view('admin.purchase.show', compact('user', 'purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Purchase::find($id)->delete();

        return back()->with('del', 'Purchase List Deleted!');
    }

    public function statusUpdate($id)
    {
        $purchase = Purchase::find($id);
        $product = $purchase->product;

        $newQuantity = $product->quantity + $purchase->quantity;

        $product->update([
            'quantity' => $newQuantity,
        ]);

        $purchase->update([
            'status' => 'confirmed',
        ]);

        return redirect('/purchases')->with('add', 'Purchase Status Updated!');
    }
}
