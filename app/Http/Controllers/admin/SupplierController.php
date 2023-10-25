<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $search = "%" . request('search') . "%";
        $suppliers = Supplier::when($search, function ($query) use ($search) {
            $query->where('name', 'like', $search)->orWhere('email', 'like', $search)->orWhere('phone', 'like', $search)->orWhere('company', 'like', $search)->orWhere('address', 'like', $search);
        })->orderBy('id', 'desc')->paginate(5);

        return view('admin.supplier.index', compact('suppliers'));
    }

    public function create()
    {
        return view('admin.supplier.create-edit', [
            'supplier' => new Supplier(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'company' => 'required',
            'address' => 'required',
        ]);

        Supplier::create($data);

        return redirect('/admin/suppliers')->with('add', 'Supplier Added!');
    }

    public function edit(Supplier $supplier)
    {
        return view('admin.supplier.create-edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'company' => 'required',
            'address' => 'required',
        ]);

        $supplier->update($data);

        return redirect('/admin/suppliers')->with('add', 'Supplier Updated!');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return back()->with('del', 'Supplier Deleted!');
    }
}
