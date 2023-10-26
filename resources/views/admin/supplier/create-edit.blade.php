@extends('layouts.dashboard')
@section('title', 'Supplier')
@section('content')
    <div class="container mx-auto p-5">
        <h2 class="text-xl font-semibold text-gray-800 pb-5">Supplier {{ $supplier->id === null ? 'Create' : 'Edit' }} Form
        </h2>

        @if ($supplier->id === null)
            <form action="{{ url('/admin/suppliers') }}" method="POST">
            @else
                <form action="{{ url('/admin/suppliers/' . $supplier->id) }}" method="POST">
                    @method('PUT')
        @endif
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Supplier Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter supplier's name"
                value="{{ $supplier->name ?? old('name') }}"
                class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('name') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
            @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
            <input type="text" id="email" name="email" placeholder="Enter supplier's email"
                value="{{ $supplier->email ?? old('email') }}"
                class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('email') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
            @error('email')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="phone" class="block text-gray-700 font-bold mb-2">Phone:</label>
            <input type="text" id="phone" name="phone" placeholder="Enter supplier's phone"
                value="{{ $supplier->phone ?? old('phone') }}"
                class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('phone') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
            @error('phone')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="company" class="block text-gray-700 font-bold mb-2">Company:</label>
            <input type="text" id="company" name="company" placeholder="Enter company's name"
                value="{{ $supplier->company ?? old('company') }}"
                class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('company') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
            @error('company')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="address" class="block text-gray-700 font-bold mb-2">Address:</label>
            <textarea id="address" name="address" rows="4"
                class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('address') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror"
                placeholder="Enter supplier's address">{{ $supplier->address ?? old('address') }}</textarea>
            @error('address')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex justify-start">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                {{ $supplier->id === null ? 'Store' : 'Update' }}
            </button>
            <a href="{{ url('/admin/suppliers') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mx-1">Back</a>
        </div>
        </form>
    </div>
@endsection
