@extends('layouts.master')
@section('title', 'Checkout')
@section('content')
    <div class="container mx-auto pt-20 pb-5 px-4">
        <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-4">
            <div class="py-3">
                <img class="h-auto sm:w-96" src="{{ asset('storage/' . $product->image) }}">
            </div>
            <div class="p-3 bg-gray-300 rounded">
                <form action="{{ url('/checkouts') }}" method="POST">
                    @csrf
                    <h1 class="text-center text-4xl font-bold">Checkout Page</h1>

                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div class="pb-3">
                        <label for="phone"
                            class="block mb-2 text-md font-medium text-gray-900 dark:text-black">Phone</label>
                        <input type="text" id="phone" name="phone" placeholder="Enter your available phone number"
                            value="{{ old('phone') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('phone') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
                        @error('phone')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="pb-3">
                        <label for="message"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Address</label>
                        <textarea id="message" rows="4" name="address" placeholder="Enter your address"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('address') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">{{ old('address') }}</textarea>
                        @error('address')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="pb-3">
                        <label for="direction"
                            class="block mb-2 text-md font-medium text-gray-900 dark:text-black">Direction</label>
                        <input type="text" id="direction" name="direction" placeholder="Eg - Near Sule bus stop"
                            value="{{ old('direction') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('direction') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
                        @error('direction')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="pb-3">
                        <label for="card_no" class="block mb-2 text-md font-medium text-gray-900 dark:text-black">Card
                            No</label>
                        <input type="number" id="card_no" name="card_no" placeholder="Enter your card number"
                            value="{{ old('card_no') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('card_no') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
                        @error('card_no')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="pb-3">
                        <label for="exp_date" class="block mb-2 text-md font-medium text-gray-900 dark:text-black">Expire
                            Date</label>
                        <input type="date" id="exp_date" name="exp_date" placeholder="Enter your expire date"
                            value="{{ old('exp_date') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('exp_date') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
                        @error('exp_date')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="pb-3">
                        <label for="cvv"
                            class="block mb-2 text-md font-medium text-gray-900 dark:text-black">CVV</label>
                        <input type="password" id="cvv" name="cvv" placeholder="Enter your CVV"
                            value="{{ old('cvv') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('cvv') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
                        @error('cvv')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="pb-3">
                        <label for="total_quantity"
                            class="inline-block mb-2 text-md font-medium text-gray-900 dark:text-black">Quantity</label>
                        <label
                            class="inline-block mb-2 text-md font-medium text-gray-900 dark:text-black float-right">(Available
                            Quantity: {{ $product->quantity }})</label>
                        <input type="number" id="total_quantity" name="total_quantity"
                            placeholder="Enter your quantity to purchase" value="{{ old('total_quantity') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('total_quantity') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
                        @error('total_quantity')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                        @if (Session('error'))
                            <p class="text-red-500 text-xs italic">{{ Session('error') }}</p>
                        @endif
                    </div>

                    <div class="pb-3">
                        <label for="total_amount" class="block mb-2 text-md font-medium text-gray-900 dark:text-black">Total
                            Amount</label>
                        <input type="number" id="total_amount" name="total_amount" value="{{ old('total_amount') }}"
                            readonly
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('total-amount') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
                        @error('total_amount')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="pb-3">
                        <label for="vat"
                            class="block mb-2 text-md font-medium text-gray-900 dark:text-black">VAT</label>
                        <input type="number" id="vat" name="vat" value="0.05" readonly
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('vat') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
                        @error('vat')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="pb-3">
                        <label for="grand_total"
                            class="block mb-2 text-md font-medium text-gray-900 dark:text-black">Grand
                            Total</label>
                        <input type="number" id="grand_total" name="grand_total" value="{{ old('grand_total') }}"
                            readonly
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('grand_total') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
                        @error('grand_total')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 my-2 w-full">Checkout</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('bodyscript')
    <script>
        const totalQuantityInput = document.getElementById('total_quantity');
        const totalAmountInput = document.getElementById('total_amount');
        const grandTotalInput = document.getElementById('grand_total');
        const productPrice = {{ $product->price }};
        const vat = 0.05;

        totalQuantityInput.addEventListener('input', updateTotalAmount);
        totalAmountInput.addEventListener('input', updateGrandTotal);

        function updateTotalAmount() {
            const quantity = parseFloat(totalQuantityInput.value) || 0;
            const totalAmount = quantity * productPrice;
            totalAmountInput.value = totalAmount.toFixed(2);
            updateGrandTotal();
        }

        function updateGrandTotal() {
            const totalAmount = parseFloat(totalAmountInput.value) || 0;
            const calculatedVat = totalAmount * vat;
            const grandTotal = totalAmount + calculatedVat;
            grandTotalInput.value = grandTotal.toFixed(2);
        }

        updateTotalAmount();
        updateGrandTotal();
    </script>
@endsection
