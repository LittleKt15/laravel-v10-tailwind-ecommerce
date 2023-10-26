@extends('layouts.dashboard')
@section('title', 'Purchase')
@section('content')
    <div class="container mx-auto p-5">
        <span class="text-xl font-semibold text-gray-800 pb-5">Purchase Detail Form</span>
        <a href="{{ url('/admin/purchases') }}"
            class="text-white float-right bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Back</a>

        <div
            class="w-full max-w-sm mx-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 clear-both">
            <img class="px-8 pt-8 pb-4 rounded-t-lg mx-auto" src="{{ asset('storage/' . $purchase->product->image) }}"
                alt="product image" />
            <div class="px-5 pb-5">
                <h5 class="text-3xl text-center pb-2 font-semibold tracking-tight text-gray-900 dark:text-white">
                    {{ $purchase->product->name }}
                </h5>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-400 p-1">Purchaser: {{ $purchase->user->name }}</p>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-400 p-1">Category:
                    {{ $purchase->product->category->name }}</p>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-400 p-1">Supplier's Name:
                    {{ $purchase->supplier->name }}</p>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-400 p-1">Purchased Quantity:
                    {{ $purchase->quantity }}
                </p>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-400 p-1">Amount: {{ $purchase->amount }}$</p>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-400 p-1">Value-Added Tax: {{ $purchase->vat }}$
                </p>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-400 p-1">Total Amount:
                    {{ $purchase->amount * $purchase->quantity }}$</p>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-400 p-1">
                    Status: <span
                        class="{{ $purchase->status === 'pending' ? 'text-red-500' : 'text-green-500' }} capitalize">{{ $purchase->status }}</span>
                </p>
                <div class="flex items-center justify-between p-1">
                    <span class="text-xl font-bold text-gray-900 dark:text-white">Grand Total:
                        {{ $purchase->grandtotal }}$</span>
                    <form action="{{ url('/admin/purchases/status/' . $purchase->id) }}" method="POST">
                        @csrf
                        <button onclick="return confirm('Are you sure you want to confirm the purchase?')"
                            {{ $purchase->status === 'pending' ? '' : 'hidden' }}
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
