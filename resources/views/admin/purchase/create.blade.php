@extends('layouts.dashboard')
@section('title', 'Purchase')
@section('content')
    <div class="container mx-auto p-5">
        <h2 class="text-xl font-semibold text-gray-800 pb-5">Purchase Create Form</h2>

        <form action="{{ url('/admin/purchases') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="product_id" class="block text-gray-700 font-bold mb-2">Select Product to Purchase</label>
                <select id="product_id"
                    class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('product_id') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror"
                    name="product_id">
                    <option value="" selected>Choose Product</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                            {{ $product->name }}</option>
                    @endforeach
                </select>
                @error('product_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="supplier_id" class="block text-gray-700 font-bold mb-2">Select Supplier</label>
                <select id="supplier_id"
                    class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('supplier_id') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror"
                    name="supplier_id">
                    <option value="" selected>Choose Supplier</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                    @endforeach
                </select>
                @error('supplier_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="quantity" class="block text-gray-700 font-bold mb-2">Quantity:</label>
                <input type="number" id="quantity" name="quantity" placeholder="Enter quantity"
                    value="{{ old('quantity') }}"
                    class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('quantity') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
                @error('quantity')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="amount" class="block text-gray-700 font-bold mb-2">Amount:</label>
                <input type="number" id="amount" name="amount" placeholder="Enter amount" value="{{ old('amount') }}"
                    class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('amount') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
                @error('amount')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="vat" class="block text-gray-700 font-bold mb-2">Value-added tax:</label>
                <input type="number" id="vat" name="vat" placeholder="Enter vat" value="{{ old('vat') }}"
                    readonly
                    class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('vat') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
                @error('vat')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="grandtotal" class="block text-gray-700 font-bold mb-2">Grand Total:</label>
                <input type="number" id="grandtotal" name="grandtotal" placeholder="Enter grand total"
                    value="{{ old('grandtotal') }}" readonly
                    class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('grandtotal') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
                @error('grandtotal')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-start">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Submit
                </button>
                <a href="{{ url('/admin/purchases') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mx-1">Back</a>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        function calculateGrandTotal() {
            var quantity = parseInt(document.getElementById('quantity').value);
            var amount = parseFloat(document.getElementById('amount').value);
            var vat = parseFloat(document.getElementById('vat').value);

            var subtotal = (quantity * amount) * 0.1;
            var grandtotal = (quantity * amount) + subtotal;
            document.getElementById('grandtotal').value = grandtotal;
        }

        document.getElementById('vat').addEventListener('input', calculateGrandTotal);
        document.getElementById('quantity').addEventListener('input', calculateGrandTotal);
        document.getElementById('amount').addEventListener('input', calculateGrandTotal);
    </script>
    <script>
        function calculateVat() {
            var quantity = parseInt(document.getElementById('quantity').value);
            var amount = parseFloat(document.getElementById('amount').value);

            var vat = (quantity * amount) * 0.1;
            document.getElementById('vat').value = vat;
        }

        document.getElementById('quantity').addEventListener('input', calculateVat);
        document.getElementById('amount').addEventListener('input', calculateVat);
    </script>
@endsection
