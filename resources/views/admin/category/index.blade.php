@extends('layouts.dashboard')
@section('title', 'Category')
@section('sub-title', 'Category')
@section('content')
    <div class="container mx-auto">
        <div class="align-middle">
            <span class="text-gray-700 text-lg">Category List</span>
            <a href="{{ url('categories/create') }}"
                class="float-right py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">Add
                Category</a>
        </div>
        @if (Session('add'))
            <div class="bg-green-400 p-4 text-white mt-9 rounded clear-both">{{ Session('add') }}</div>
        @endif
        @if (Session('del'))
            <div class="bg-red-400 p-4 text-white mt-9 rounded clear-both">{{ Session('del') }}</div>
        @endif
        <table class="table-auto border w-full mt-10 clear-both">
            <thead>
                <tr>
                    <th class="px-4 py-2">No.</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $index => $category)
                    <tr>
                        <td class="border px-4 py-2 text-center">{{ $index + $categories->firstItem() }}</td>
                        <td class="border px-4 py-2 text-center">{{ $category->name }}</td>
                        <td class="border px-4 py-2 text-center">
                            <form action="{{ url('/categories/' . $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ url('/categories/' . $category->id . '/edit') }}"
                                    class="bg-green-600 rounded p-1 text-white text-sm">Edit</a>
                                <button class="bg-red-600 rounded p-1 text-white text-sm"
                                    onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pt-5">
            {{ $categories->links() }}
        </div>
    </div>
@endsection
