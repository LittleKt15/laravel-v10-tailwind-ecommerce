<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $search = "%" . request('search') . "%";
        $purchases = Purchase::when($search, function ($query) use ($search) {
            $query->where('quantity', 'like', $search)->orWhere('status', 'like', $search)->orWhereHas('product', function ($product) use ($search) {
                $product->where('name', 'like', $search);
            })->orWhereHas('supplier', function ($supplier) use ($search) {
                $supplier->where('name', 'like', $search);
            })->orWhereHas('user', function ($user) use ($search) {
                $user->where('name', 'like', $search);
            });
        })->orderBy('id', 'desc')->paginate(5);
        return view('admin.purchase.index', compact('purchases'));
    }

    public function create()
    {
        $products = Product::all();
        $suppliers = Supplier::all();
        return view('admin.purchase.create', compact('products', 'suppliers'));
    }

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
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id,
            'supplier_id' => $request->supplier_id,
            'quantity' => $request->quantity,
            'amount' => $request->amount,
            'vat' => $request->vat,
            'grandtotal' => $request->grandtotal,
        ]);

        return redirect('/admin/purchases')->with('add', 'Purchase Created!');
    }

    public function show(Purchase $purchase)
    {
        return view('admin.purchase.show', compact('purchase'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    public function destroy(Purchase $purchase)
    {
        $purchase->delete();

        return back()->with('del', 'Purchase List Deleted!');
    }

    public function statusUpdate(Purchase $purchase)
    {
        $product = $purchase->product;

        $newQuantity = $product->quantity + $purchase->quantity;

        $product->update([
            'quantity' => $newQuantity,
        ]);

        $purchase->update([
            'status' => 'confirmed',
        ]);

        return redirect('/admin/purchases')->with('add', 'Purchase Status Updated!');
    }
}
