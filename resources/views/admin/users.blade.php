@extends('layouts.wrapper')

@section('page_title')
Users · Admin
@endsection

@section('content')

<!-- Navbar -->
<x-navbar page="admin" />

<!-- Breadcrumb -->
<div class="bg-white border-b border-gray-200">
    <div class="mx-auto max-w-7xl">
        <div class="px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center justify-between h-12">
                <ol role="list" class="flex space-x-1">
                    <li>
                        <div class="flex items-center">
                            <a href="/admin" class="text-sm font-medium text-gray-900 hover:text-indigo-500 mr-1">
                                Admin
                            </a>
                            <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                                <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                            </svg>
                        </div>
                    </li>
                    <li>
                        <p class="text-gray-500 text-sm">
                            Users
                        </p>
                    </li>
                </ol>
                <div class="flex space-x-3">
                    <a href="/admin" class="inline-flex space-x-1 rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                        </svg>
                        <span>Back</span>
                    </a>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- END OF Breadcrumb -->

<!-- Alerts -->
<x-alert />

<!-- Main -->
<div class="divide-y divide-gray-200">

    <!-- Section -->
    <livewire:admin.index-users />

</div>
<!-- END OF Main -->

<!-- Footer -->
<x-footer />

@endsection
