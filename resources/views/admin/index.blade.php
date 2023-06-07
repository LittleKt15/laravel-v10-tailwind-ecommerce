@extends('layouts.dashboard')
@section('title', 'Admin Dashboard')
@section('sub-title', 'Admin Dashboard')
@section('content')
    <h2 class="text-lg font-semibold">Dashboard</h2>

    <div class="mt-6">
        <div class="mb-4">
            <label class="text-sm font-medium">EARNINGS (ANNUAL)</label>
            <span class="float-right text-sm font-medium">70%</span>
            <div class="relative pt-1">
                <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-blue-200">
                    <div style="width: 70%"
                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500">
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <label class="text-sm font-medium">EARNINGS (MONTHS)</label>
            <span class="float-right text-sm font-medium">40%</span>
            <div class="relative pt-1">
                <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-green-200">
                    <div style="width: 40%"
                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500">
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <label class="text-sm font-medium">TASKS</label>
            <span class="float-right text-sm font-medium">80%</span>
            <div class="relative pt-1">
                <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-yellow-200">
                    <div style="width: 80%"
                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-yellow-500">
                    </div>
                </div>
            </div>
        </div>

        <div>
            <label class="text-sm font-medium">PENDING REQUESTS</label>
            <span class="float-right text-sm font-medium">25%</span>
            <div class="relative pt-1">
                <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-red-200">
                    <div style="width: 25%"
                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-red-500">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
