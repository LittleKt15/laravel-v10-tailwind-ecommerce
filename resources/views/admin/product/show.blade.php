@extends('layouts.dashboard')
@section('title', 'Product')
@section('content')
    <div class="container mx-auto p-5">
        <h2 class="text-xl font-semibold text-gray-800 pb-5">Product Detail Form</h2>

        <div
            class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mx-auto">
            <img class="rounded-t-lg w-full h-auto max-w-xl" src="{{ asset('storage/product-images/' . $product->image) }}" alt="" />
            <div class="p-5">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                    {{ $product->name }}</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Category: {{ $product->category->name }}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Description: {{ $product->description }}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Color: {{ $product->color }}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Size: {{ $product->size }}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Quantity: {{ $product->quantity }}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Price: {{ $product->price }}$</p>
            </div>
        </div>

    </div>
@endsection
