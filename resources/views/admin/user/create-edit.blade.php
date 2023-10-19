@extends('layouts.dashboard')
@section('title', 'User Role')
@section('content')
    <div class="container mx-auto p-5">
        <h2 class="text-lg font-semibold text-gray-800 pb-5">Role {{ $user->id === null ? 'Create' : 'Edit' }} Form</h2>

        @if ($user->id === null)
            <form action="{{ url('/admin/users/') }}" method="POST">
            @else
                <form action="{{ url('/admin/users/' . $user->id) }}" method="POST">
                    @method('PUT')
        @endif
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Username:</label>
            <input type="text" id="name" name="name" placeholder="Enter user's name"
                value="{{ $user->name ?? old('name') }}"
                class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('name') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
            @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
            <input type="text" id="email" name="email" placeholder="Enter user's email"
                value="{{ $user->email ?? old('email') }}"
                class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('email') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
            @error('email')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="role" class="block text-gray-700 font-bold mb-2">Role Name:</label>
            <select id="role" name="role"
                class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('role') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
                <option value="">Choose Role</option>
                <option value="admin" {{ old('role') === 'admin' || $user->role === 'admin' ? 'selected' : '' }}>Admin
                </option>
                <option value="user" {{ old('role') === 'user' || $user->role === 'user' ? 'selected' : '' }}>User
                </option>
            </select>
            @error('role')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700 font-bold mb-2">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter user's password"
                class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('password') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
            @error('password')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700 font-bold mb-2">Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Enter user's password again"
                class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('password_confirmation') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
            @error('password_confirmation')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex justify-start">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                {{ $user->id === null ? 'Store' : 'Update' }}
            </button>
            <a href="{{ url('/admin/users') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mx-1">Back</a>
        </div>
        </form>
    </div>
@endsection
