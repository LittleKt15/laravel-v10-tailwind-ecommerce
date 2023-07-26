@extends('layouts.master')
@section('title', 'Checkout')
@section('content')
    <div class="container mx-auto pt-20 pb-5 px-4">
        <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-4">
            <div class="py-3">
                <img class="h-auto sm:w-96" src="{{ asset('storage/product-images/' . $product->image) }}">
            </div>
            <div class="p-3 bg-gray-300 rounded">
                <form action="{{ url('/checkouts') }}" method="POST">
                    @csrf
                    <h1 class="text-center text-4xl font-bold">Checkout Page</h1>

                    <div class="pb-3">
                        <label for="phone"
                            class="block mb-2 text-md font-medium text-gray-900 dark:text-black">Phone</label>
                        <input type="text" id="phone" name="phone" placeholder="Enter your available phone number"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <div class="pb-3">
                        <label for="message"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Address</label>
                        <textarea id="message" rows="4" name="address" placeholder="Enter your address"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                    </div>

                    <div class="pb-3">
                        <label for="direction"
                            class="block mb-2 text-md font-medium text-gray-900 dark:text-black">Direction</label>
                        <input type="text" id="direction" name="direction" placeholder="Eg - Near Sule bus stop"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <div class="pb-3">
                        <label for="card_no" class="block mb-2 text-md font-medium text-gray-900 dark:text-black">Card
                            No</label>
                        <input type="text" id="card_no" name="card_no" placeholder="Enter your card number"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <div class="pb-3">
                        <label for="exp_date" class="block mb-2 text-md font-medium text-gray-900 dark:text-black">Expire
                            Date</label>
                        <input type="date" id="exp_date" name="exp_date" placeholder="Enter your expire date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <div class="pb-3">
                        <label for="cvv"
                            class="block mb-2 text-md font-medium text-gray-900 dark:text-black">CVV</label>
                        <input type="password" id="cvv" name="cvv" placeholder="Enter your CVV"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <div class="pb-3">
                        <label for="total_quantity"
                            class="inline-block mb-2 text-md font-medium text-gray-900 dark:text-black">Quantity</label>
                        <label
                            class="inline-block mb-2 text-md font-medium text-gray-900 dark:text-black float-right">(Available
                            Quantity: {{ $product->quantity }})</label>
                        <input type="integer" id="total_quantity" name="total_quantity"
                            placeholder="Enter your quantity to purchase"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 clear-both">
                    </div>

                    <div class="pb-3">
                        <label for="total_amount" class="block mb-2 text-md font-medium text-gray-900 dark:text-black">Total
                            Amount</label>
                        <input type="integer" id="total_amount" name="total_amount"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <div class="pb-3">
                        <label for="vat"
                            class="block mb-2 text-md font-medium text-gray-900 dark:text-black">VAT</label>
                        <input type="password" id="vat" name="vat"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <div class="pb-3">
                        <label for="grand_total" class="block mb-2 text-md font-medium text-gray-900 dark:text-black">Grand
                            Total</label>
                        <input type="integer" id="grand_total" name="grand_total"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 my-2 w-full">Checkout</button>
                </form>
            </div>
        </div>
    </div>
@endsection
