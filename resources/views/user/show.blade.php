@extends('layouts.master')
@section('title', 'Order History')
@section('content')
    <div class="container mx-auto pt-20 pb-5 px-4">
        <!-- component -->
        <section class="text-gray-700 body-font overflow-hidden bg-white">
            <div class="container px-5 md:py-10 py-5 mx-auto">
                <div class="lg:w-4/5 mx-auto flex flex-wrap">
                    <img alt="ecommerce" class="md:w-1/2 w-full object-cover object-center rounded border border-gray-200"
                        src="{{ asset('storage/' . $checkout->product->image) }}">
                    <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                        <h2 class="text-sm title-font text-gray-500 tracking-widest">{{ $checkout->product->category->name }}
                        </h2>
                        <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $checkout->product->name }}</h1>
                        <div class="flex mb-4">
                            <span class="flex items-center">
                                <span class="text-gray-600">
                                    {{ $checkout->created_at }}
                                </span>
                                <span
                                    class="{{ $checkout->status === 'pending' ? 'text-red-500' : 'text-green-500' }} ml-3">
                                    {{ $checkout->status }}
                                </span>
                            </span>
                        </div>
                        <p class="leading-relaxed">
                            {{ $checkout->phone }} | {{ $checkout->user->email }} | {{ $checkout->address }} |
                            {{ $checkout->state }} | {{ $checkout->zip }}
                        </p>
                        <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
                            <div class="flex">
                                <span class="mr-3">Color: {{ $checkout->product->color }}</span>
                                <span class="mr-3">Size: {{ $checkout->product->size }}</span>
                                <span class="mr-3">Purch Qty: {{ $checkout->total_quantity }}</span>
                                <span class="mr-3">Sub Total: ${{ $checkout->total_amount }}</span>
                                <span class="mr-3">VAT: ${{ $checkout->vat }}</span>
                            </div>
                        </div>
                        <div class="flex">
                            <span
                                class="title-font font-medium text-2xl text-gray-900">${{ $checkout->grand_total }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
