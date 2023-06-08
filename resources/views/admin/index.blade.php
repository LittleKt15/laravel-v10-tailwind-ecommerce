@extends('layouts.dashboard')
@section('title', 'Admin Dashboard')
@section('content')
    <div class="container mx-auto p-5">
        <p class="text-xl mb-3 font-semibold">Dashboard</p>

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
