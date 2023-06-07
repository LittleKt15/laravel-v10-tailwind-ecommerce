@extends('layouts.dashboard')
@section('title', 'Category')
@section('sub-title', 'Category')
@section('content')
<div class="container mx-auto">
    <div class="px-6 py-4">
        <h2 class="text-lg font-semibold text-gray-800">Create Edit Form</h2>
    </div>
    <form class="px-6 py-4" action="{{ url('/categories/'.$category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Category Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter Category Name" value="{{ $category->name ?? old('name') }}"
                class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('name') invalid:border-red-500 @enderror">
            @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex justify-start">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                Submit
            </button>
        </div>
    </form>
</div>
@endsection
