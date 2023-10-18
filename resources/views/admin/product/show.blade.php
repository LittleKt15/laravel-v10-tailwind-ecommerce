@extends('layouts.dashboard')
@section('title', 'Product')
@section('content')
    <div class="container mx-auto p-5">
        <h2 class="text-xl font-semibold text-gray-800 pb-5">Product Detail Form</h2>

        <div
            class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mx-auto">
            <img class="rounded-t-lg w-full h-auto max-w-xl" src="{{ asset('storage/' . $product->image) }}" alt="" />
            <div class="p-5">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                    {{ $product->name }}</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Category: {{ $product->category->name }}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Description: {{ $product->description }}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Color: {{ $product->color }}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Size: {{ $product->size }}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Quantity: {{ $product->quantity }}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Price: {{ $product->price }}$</p>
                <a href="{{ url('/admin/products') }}"
                    class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">Back</a>
            </div>
        </div>

    </div>
@endsection
