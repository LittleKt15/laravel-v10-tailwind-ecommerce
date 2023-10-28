@extends('layouts.master')
@section('title', 'Product Detail')
@section('css')
@section('content')
    <div class="container mx-auto pt-20 pb-5 px-4">
        <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="border-t border-gray-200 dark:border-gray-600">
                <div class="p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800">
                    <dl
                        class="grid min-w-screen grid-cols-2 gap-8 p-4 mx-auto text-gray-900 sm:grid-cols-3 xl:grid-cols-6 dark:text-white sm:p-8">
                        <div class="flex flex-col items-center justify-center">
                            <img src="{{ asset('storage/' . $product->image) }}" class="h-full w-full object-cover rounded-lg"
                                alt="">
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <dt class="mb-2 text-2xl font-extrabold">{{ $product->name }}</dt>
                            <dd class="text-gray-500 dark:text-gray-400">Category: {{ $product->category->name }}</dd>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <dt class="mb-2 text-2xl font-extrabold">Size- {{ $product->size }}</dt>
                            <dd class="text-gray-500 dark:text-gray-400">Color: {{ $product->color }}</dd>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <dt class="mb-2 text-2xl font-extrabold">${{ $product->price }}</dt>
                            <dd class="text-gray-500 dark:text-gray-400">Avl. Qty: {{ $product->quantity }}</dd>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <dt class="mb-2 text-2xl font-extrabold">Description</dt>
                            <dd class="text-gray-500 dark:text-gray-400">{{ $product->description }}</dd>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <a href="{{ url('/checkouts/' . $product->id) }}"
                                class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                                Go to Checkout
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6 md:ms-1">
                                    <path fill-rule="evenodd"
                                        d="M16.72 7.72a.75.75 0 011.06 0l3.75 3.75a.75.75 0 010 1.06l-3.75 3.75a.75.75 0 11-1.06-1.06l2.47-2.47H3a.75.75 0 010-1.5h16.19l-2.47-2.47a.75.75 0 010-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection
