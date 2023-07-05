@extends('layouts.dashboard')
@section('title', 'Admin Dashboard')
@section('content')
    <div class="container mx-auto p-5">
        <div class="flex items-center justify-between mb-2">
            <div class="text-xl mb-3 font-semibold py-2">Dashboard</div>
            <div class="text-lg mb-3 font-semibold">
                <a href="{{ url('/') }}" class="text-white rounded-lg px-5 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    To Customer Site
                </a>
            </div>
        </div>

        <div class="grid md:grid-cols-4 sm:grid-cols-3 gap-4 pb-5 clear-both">
            <div>
                <a href="{{ url('/roles') }}"
                    class="block max-w-sm p-5 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white text-center">User:
                        <span
                            class="text-lg font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{ $users->count() }}</span>
                    </h5>
                </a>
            </div>
            <div>
                <a href="{{ url('/categories') }}"
                    class="block max-w-sm p-5 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white text-center">Category:
                        <span
                            class="text-lg font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{ $categories->count() }}</span>
                    </h5>
                </a>
            </div>
            <div>
                <a href="{{ url('/products') }}"
                    class="block max-w-sm p-5 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white text-center">Product:
                        <span
                            class="text-lg font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{ $products->count() }}</span>
                    </h5>
                </a>
            </div>
            <div>
                <a href="{{ url('/purchases') }}"
                    class="block max-w-sm p-5 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white text-center">Purchase:
                        <span
                            class="text-lg font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{ $purchases->count() }}</span>
                    </h5>
                </a>
            </div>
            <div>
                <a href="{{ url('/suppliers') }}"
                    class="block max-w-sm p-5 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white text-center">Supplier:
                        <span
                            class="text-lg font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{ $suppliers->count() }}</span>
                    </h5>
                </a>
            </div>
            <div>
                <a href="{{ url('/orders') }}"
                    class="block max-w-sm p-5 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white text-center">Order:
                        <span
                            class="text-lg font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">0</span>
                    </h5>
                </a>
            </div>
        </div>

        <div class="flex justify-between mb-1">
            <span class="text-base font-medium text-blue-700">EARNINGS (ANNUAL)</span>
            <span class="text-sm font-medium text-blue-700">70%</span>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-2.5 mb-3">
            <div class="bg-blue-600 h-2.5 rounded-full" style="width: 70%"></div>
        </div>

        <div class="flex justify-between mb-1">
            <span class="text-base font-medium text-green-700">EARNINGS (MONTHS)</span>
            <span class="text-sm font-medium text-blue-700">40%</span>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-2.5 mb-3">
            <div class="bg-green-600 h-2.5 rounded-full" style="width: 40%"></div>
        </div>

        <div class="flex justify-between mb-1">
            <span class="text-base font-medium text-yellow-700">TASKS</span>
            <span class="text-sm font-medium text-blue-700">80%</span>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-2.5 mb-3">
            <div class="bg-yellow-600 h-2.5 rounded-full" style="width: 80%"></div>
        </div>

        <div class="flex justify-between mb-1">
            <span class="text-base font-medium text-red-700">PENDING REQUESTS</span>
            <span class="text-sm font-medium text-blue-700">25%</span>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-2.5 mb-3">
            <div class="bg-red-600 h-2.5 rounded-full" style="width: 25%"></div>
        </div>
    </div>
@endsection
