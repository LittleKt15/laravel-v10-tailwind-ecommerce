@extends('layouts.dashboard')
@section('title', 'User Role')
@section('content')
    <div class="container mx-auto p-5">
        <h2 class="text-lg font-semibold text-gray-800 pb-5">Role Update Form</h2>

        <form action="{{ url('/roles/' . $users->id) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="role" class="block text-gray-700 font-bold mb-2">Role Name:</label>
                <input type="text" id="role" name="role" placeholder="Enter Category Name"
                    value="{{ $users->role ?? old('role') }}"
                    class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('role') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
                @error('role')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-start">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Submit
                </button>
                <a href="{{ url('/roles') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mx-1">Back</a>
            </div>
        </form>
    </div>
@endsection
