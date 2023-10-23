@extends('layouts.dashboard')
@section('title', 'Product')
@section('content')
    <div class="container mx-auto p-5">
        <span class="text-xl font-semibold text-gray-800 pb-5">Product Detail Form</span>
        <a href="{{ url('/admin/products') }}"
            class="text-white float-right bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Back</a>

        <div
            class="w-full max-w-sm mx-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 clear-both">
            <img class="px-8 pt-8 pb-4 rounded-t-lg mx-auto" src="{{ asset('storage/' . $product->image) }}"
                alt="product image" />
            <div class="px-5 pb-5">
                <h5 class="text-3xl text-center pb-2 font-semibold tracking-tight text-gray-900 dark:text-white">
                    {{ $product->name }}
                </h5>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-400 p-1">Category:
                    {{ $product->category->name }}</p>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-400 p-1">Description:
                    {{ $product->description }}</p>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-400 p-1">Color:
                    {{ $product->color }}</p>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-400 p-1">Color:
                    {{ $product->size }}</p>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-400 p-1">Purchased Quantity:
                    {{ $product->quantity }}
                </p>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-400 p-1">Price: {{ $product->price }}$</p>
            </div>
        </div>
    </div>
@endsection
