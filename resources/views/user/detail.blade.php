@extends('layouts.master')
@section('title', 'Product Detail')
@section('css')
@section('content')
    <div class="container mx-auto pt-20 pb-5 px-4">
        <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-4">
            <div class="py-3 justify-self-center">
                <img class="h-auto sm:w-96" src="{{ asset('storage/' . $product->image) }}">
            </div>
            <div class="py-3">
                <h1 class="text-center text-4xl font-bold">{{ $product->name }}</h1>
                <p class="text-xl font-semibold p-2">Category: {{ $product->category->name }}</p>
                <p class="text-xl font-semibold p-2">Color: {{ $product->color }}</p>
                <p class="text-xl font-semibold p-2">Size: {{ $product->size }}</p>
                <p class="text-xl font-semibold p-2">Description: {{ $product->description }}</p>
                <p class="text-xl font-semibold p-2">Available Quantity: {{ $product->quantity }}</p>
                <p class="text-xl font-semibold p-2">Price: {{ $product->price }}$</p>
                <a href="{{ url('/checkouts/' . $product->id) }}"
                    class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Go to Checkout
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
@endsection
