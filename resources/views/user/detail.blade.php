@extends('layouts.master')
@section('title', 'Product Detail')
@section('css')
@section('content')
    <div class="container mx-auto pt-20 pb-5 px-4">
        <section class="text-gray-700 body-font overflow-hidden bg-white">
            <div class="container p-5 mx-auto">
                <div class="lg:w-4/5 mx-auto flex flex-wrap">
                    <img alt="shirt" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200"
                        src="{{ asset('storage/' . $product->image) }}">
                    <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                        <h2 class="text-sm title-font text-gray-500 tracking-widest">{{ $product->category->name }}</h2>
                        <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $product->name }}</h1>
                        <div class="flex mb-4">
                            <span class="text-gray-600">Aval Qty. {{ $product->quantity }}</span>
                        </div>
                        <p class="leading-relaxed">{{ $product->description }}</p>
                        <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
                            <div class="flex">
                                <span class="mr-3">Color: {{ $product->color }}</span>
                            </div>
                            <div class="flex ml-6 items-center">
                                <span class="mr-3">Size: {{ $product->size }}</span>
                            </div>
                        </div>
                        <div class="flex">
                            <span class="title-font font-medium text-2xl text-gray-900">${{ $product->price }}</span>
                            <a href="{{ url('/checkouts/' . $product->id) }}"
                                class="flex ml-auto text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 border-0 py-2 px-6 rounded-lg">
                                Go to Checkout
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6 md:ms-1">
                                    <path fill-rule="evenodd"
                                        d="M16.72 7.72a.75.75 0 011.06 0l3.75 3.75a.75.75 0 010 1.06l-3.75 3.75a.75.75 0 11-1.06-1.06l2.47-2.47H3a.75.75 0 010-1.5h16.19l-2.47-2.47a.75.75 0 010-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
