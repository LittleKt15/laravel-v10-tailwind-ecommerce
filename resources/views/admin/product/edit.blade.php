@extends('layouts.dashboard')
@section('title', 'Product')
@section('content')
    <div class="container mx-auto p-5">
        <h2 class="text-lg font-semibold text-gray-800 pb-5">Product Update Form</h2>

        <form action="{{ url('/products/' . $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="category_id" class="block text-gray-700 font-bold mb-2">Select Category</label>
                <select id="category_id"
                    class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('category_id') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror"
                    name="category_id">
                    <option value="" selected>Choose Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id === $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Product Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter Product Name"
                    value="{{ $product->name ?? old('name') }}"
                    class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('name') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
                @error('name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="color" class="block text-gray-700 font-bold mb-2">Color:</label>
                <input type="text" id="color" name="color" placeholder="Enter Color"
                    value="{{ $product->color ?? old('color') }}"
                    class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('color') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
                @error('color')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="size" class="block text-gray-700 font-bold mb-2">Size:</label>
                <input type="text" id="size" name="size" placeholder="Enter Size"
                    value="{{ $product->size ?? old('size') }}"
                    class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('size') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
                @error('size')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Description:</label>
                <textarea id="description" name="description" rows="4"
                    class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('description') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror"
                    placeholder="Enter description">{{ $product->description ?? old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="quantity" class="block text-gray-700 font-bold mb-2">Quantity:</label>
                <input type="number" id="quantity" name="quantity" placeholder="Enter quantity"
                    value="{{ $product->quantity ?? old('quantity') }}"
                    class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('quantity') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
                @error('quantity')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="price" class="block text-gray-700 font-bold mb-2">Price:</label>
                <input type="number" id="price" name="price" placeholder="Enter price"
                    value="{{ $product->price ?? old('price') }}"
                    class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('price') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
                @error('price')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="image">Upload file</label>
                <input
                    class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('image') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror"
                    id="image" type="file" name="image">
                @error('image')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-start">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Submit
                </button>
                <a href="{{ url('/products') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mx-1">Back</a>
            </div>
        </form>
    </div>
@endsection
