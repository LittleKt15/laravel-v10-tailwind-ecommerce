@extends('layouts.dashboard')
@section('title', 'Supplier')
@section('content')
    <div class="container mx-auto p-5">
        <div class="align-middle">
            <span class="text-gray-700 text-xl font-semibold">Supplier List</span>
            <a href="{{ url('/admin/suppliers/create') }}"
                class="float-right py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">Add
                Supplier</a>
        </div>

        <x-flashmessage />

        <div class="pb-1 bg-white float-right clear-both mt-5">
            <form class="flex items-center" action="{{ url('/admin/suppliers') }}" method="GET">
                @csrf
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" name="search" id="table-search" id="simple-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search">
                </div>
                <button type="submit"
                    class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </form>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10 clear-both">
            <table class="text-sm text-left text-gray-500 dark:text-gray-400 w-full clear-both">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">No.</th>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Phone</th>
                        <th scope="col" class="px-6 py-3">Company</th>
                        <th scope="col" class="px-6 py-3">Address</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $index => $supplier)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $index + $suppliers->firstItem() }}</th>
                            <td class="px-6 py-4">{{ $supplier->name }}</td>
                            <td class="px-6 py-4">{{ $supplier->email }}</td>
                            <td class="px-6 py-4">{{ $supplier->phone }}</td>
                            <td class="px-6 py-4">{{ $supplier->company }}</td>
                            <td class="px-6 py-4">{{ $supplier->address }}</td>
                            <td class="px-6 py-4">
                                <form action="{{ url('/admin/suppliers/' . $supplier->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="flex gap-4">
                                        <a x-data="{ tooltip: 'Edite' }"
                                            href="{{ url('/admin/suppliers/' . $supplier->id . '/edit') }}"
                                            class="text-green-600">
                                            <svg fill="none" stroke="currentColor" stroke-width="1.5"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10">
                                                </path>
                                            </svg> Edit
                                        </a>
                                        <button x-data="{ tooltip: 'Delete' }" class="text-red-600"
                                            onclick="return confirm('Are you sure you want to delete?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="h-6 w-6"
                                                x-tooltip="tooltip">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg> Delete
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pt-5">
            {{ $suppliers->links() }}
        </div>
    </div>
@endsection
