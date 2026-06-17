@extends('layouts.wrapper')

@section('page_title')
Edit Profile
@endsection

@section('content')

<!-- Navbar -->
<x-navbar page="profile" />

<!-- Breadcrumb -->
<div class="bg-white border-b border-gray-200">
    <div class="mx-auto max-w-7xl">
        <div class="px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center justify-between h-12">
                <ol role="list" class="flex space-x-1">
                    <li>
                        <a href="{{ route('profile') }}" class="text-gray-500 text-sm hover:text-gray-700">Profile</a>
                    </li>
                    <li class="text-gray-400 text-sm">/</li>
                    <li>
                        <p class="text-gray-500 text-sm">Edit</p>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END OF Breadcrumb -->

<!-- Alerts -->
<x-alert />

<!-- Edit Profile Component -->
<livewire:user.edit-profile />

<!-- Footer -->
<x-footer />

@endsection
