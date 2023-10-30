@extends('layouts.master')
@section('title', 'Checkout')
@section('content')
    <div class="container mx-auto pt-20 pb-5 px-4">
        <form action="{{ url('/checkouts') }}" method="POST">
            @csrf
            <div class="grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32">
                <div class="px-4 pt-8">
                    <p class="text-xl font-medium">Order Summary</p>
                    <p class="text-gray-400">Check your items. And select a suitable shipping method.</p>
                    <div class="mt-8 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6">
                        <div class="flex flex-col items-center rounded-lg bg-white sm:flex-row">
                            <img class="m-2 h-32 w-32 rounded-md border object-cover object-center"
                                src="{{ asset('storage/' . $product->image) }}" alt="" />
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="flex w-full flex-col px-4 py-4">
                                <span class="font-semibold">{{ $product->name }}</span>
                                <span class="float-right text-gray-400">{{ $product->category->name }}</span>
                                <p class="text-lg font-bold">${{ $product->price }}</p>
                                <span class="float-right text-gray-400 pb-1">Avl. Qty: {{ $product->quantity }}</span>
                                <div class="relative">
                                    <input type="number" id="total_quantity" name="total_quantity"
                                        class="w-full rounded-md border border-gray-200 px-2 py-2 pl-11 text-sm uppercase shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                        placeholder="Enter Quantity to Buy" value="{{ old('total_quantity') }}" />
                                    <div
                                        class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-400">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7.875 14.25l1.214 1.942a2.25 2.25 0 001.908 1.058h2.006c.776 0 1.497-.4 1.908-1.058l1.214-1.942M2.41 9h4.636a2.25 2.25 0 011.872 1.002l.164.246a2.25 2.25 0 001.872 1.002h2.092a2.25 2.25 0 001.872-1.002l.164-.246A2.25 2.25 0 0116.954 9h4.636M2.41 9a2.25 2.25 0 00-.16.832V12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 12V9.832c0-.287-.055-.57-.16-.832M2.41 9a2.25 2.25 0 01.382-.632l3.285-3.832a2.25 2.25 0 011.708-.786h8.43c.657 0 1.281.287 1.709.786l3.284 3.832c.163.19.291.404.382.632M4.5 20.25h15A2.25 2.25 0 0021.75 18v-2.625c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125V18a2.25 2.25 0 002.25 2.25z" />
                                        </svg>
                                    </div>
                                </div>
                                @error('total_quantity')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <p class="mt-8 text-lg font-medium">Shipping Methods</p>
                    <div class="mt-5 grid gap-6">
                        <div class="relative">
                            <input class="peer hidden" id="radio_1" type="radio" name="radio" checked />
                            <span
                                class="peer-checked:border-gray-700 absolute right-4 top-1/2 box-content block h-3 w-3 -translate-y-1/2 rounded-full border-8 border-gray-300 bg-white"></span>
                            <label
                                class="peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50 flex cursor-pointer select-none rounded-lg border border-gray-300 p-4"
                                for="radio_1">
                                {{-- <img class="w-14 object-contain" src="" alt="" /> --}}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-14">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div class="ml-5">
                                    <span class="mt-2 font-semibold">SwiftShip Express</span>
                                    <p class="text-slate-500 text-sm leading-6">Delivery: 2-4 Days</p>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0">
                    <p class="text-xl font-medium">Payment Details</p>
                    <p class="text-gray-400">Complete your order by providing your payment details.</p>
                    <div class="">
                        <label for="phone" class="mt-4 mb-2 block text-sm font-medium">Phone</label>
                        <div class="relative">
                            <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                                class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="+1 (111) 837-6848" />
                            <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                                </svg>
                            </div>
                        </div>
                        @error('phone')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                        <label for="card_holder" class="mt-4 mb-2 block text-sm font-medium">Card Holder</label>
                        <div class="relative">
                            <input type="text" id="card_holder" name="card_holder" value="{{ old('card_holder') }}"
                                class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm uppercase shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Your full name here" />
                            <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                </svg>
                            </div>
                        </div>
                        @error('card_holder')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                        <label for="card_no" class="mt-4 mb-2 block text-sm font-medium">Card Details</label>
                        <div class="flex">
                            <div class="relative w-7/12 flex-shrink-0">
                                <input type="number" id="card_no" name="card_no" value="{{ old('card_no') }}"
                                    class="w-full rounded-md border border-gray-200 px-2 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="xxxx-xxxx-xxxx-xxxx" />
                                <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                    <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M11 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1z" />
                                        <path
                                            d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm13 2v5H1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm-1 9H2a1 1 0 0 1-1-1v-1h14v1a1 1 0 0 1-1 1z" />
                                    </svg>
                                </div>
                            </div>
                            <input type="date" name="exp_date" value="{{ old('exp_date') }}"
                                class="w-full rounded-md border border-gray-200 px-2 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="MM/YY" />
                            <input type="number" name="cvc" value="{{ old('cvc') }}"
                                class="w-1/6 flex-shrink-0 rounded-md border border-gray-200 px-2 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="CVC" />
                        </div>
                        @error('card_no')
                            <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                        @error('exp_date')
                            <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                        @error('cvc')
                            <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                        <label for="address" class="mt-4 mb-2 block text-sm font-medium">Billing Address</label>
                        <div class="flex flex-col sm:flex-row">
                            <div class="relative flex-shrink-0 sm:w-7/12">
                                <input type="text" id="address" name="address" value="{{ old('address') }}"
                                    class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="Street Address" />
                                <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                    </svg>
                                </div>
                            </div>
                            <select type="text" name="state"
                                class="w-full rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Select State</option>
                                <option value="Myanmar" {{ old('state') === 'Myanmar' ? 'selected' : '' }}>
                                    Myanmar
                                </option>
                                <option value="Thailand" {{ old('state') === 'Thailand' ? 'selected' : '' }}>
                                    Thailand
                                </option>
                                <option value="Singapore" {{ old('state') === 'Singapore' ? 'selected' : '' }}>
                                    Singapore
                                </option>
                            </select>
                            <input type="text" name="zip" value="{{ old('zip') }}"
                                class="flex-shrink-0 rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none sm:w-1/6 focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="ZIP" />
                        </div>
                        @error('address')
                            <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                        @error('state')
                            <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                        @error('zip')
                            <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror

                        <div class="mt-6 border-t border-b py-2">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-gray-900">Subtotal</p>
                                <p class="font-semibold text-gray-900" id="subtotal">$0.00</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-gray-900">VAT</p>
                                <p class="font-semibold text-gray-900" id="vat">$0.00</p>
                            </div>
                        </div>
                        <div class="mt-6 flex items-center justify-between">
                            <p class="text-sm font-medium text-gray-900">Total</p>
                            <p class="text-2xl font-semibold text-gray-900" id="total">$0.00</p>
                        </div>
                    </div>
                    <button class="mt-4 mb-8 w-full rounded-md bg-gray-900 px-6 py-3 font-medium text-white">Place
                        Order</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('bodyscript')
    <script>
        function updateOrderSummary() {
            const quantityInput = document.getElementById('total_quantity');
            const quantity = parseInt(quantityInput.value) || 0;
            const productPrice = parseFloat("{{ $product->price }}");

            const subtotal = quantity * productPrice;
            const vat = (quantity > 0) ? 0.05 * subtotal : 0;
            const total = subtotal + vat;

            document.getElementById('subtotal').textContent = "$" + subtotal.toFixed(2);
            document.getElementById('vat').textContent = "$" + vat.toFixed(2);
            document.getElementById('total').textContent = "$" + total.toFixed(2);
        }
        document.getElementById('total_quantity').addEventListener('input', updateOrderSummary);
        updateOrderSummary();
    </script>
@endsection
