@extends('layouts.wrapper')

@section('page_title')
Profile
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
                        <p class="text-gray-500 text-sm">
                            Profile
                        </p>
                    </li>
                </ol>
                <div class="flex space-x-3">
                    <a href="{{ route('edit-profile') }}" class="inline-flex space-x-1 rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                        <span>Edit</span>
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
    <div class="bg-white py-8">
        <div class="mx-auto max-w-7xl">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="flex items-center gap-6">
                    <div class="shrink-0">
                        @if($profile->avatar)
                            <img src="{{ asset('storage/' . $profile->avatar) }}" alt="Avatar" class="size-16 rounded-full object-cover ring-2 ring-gray-200" />
                        @else
                            <img src="/img/avatars/default.png" alt="Avatar" class="size-16 rounded-full ring-2 ring-gray-200" />
                        @endif
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">{{ $profile->nickname ?? auth()->user()->name }}</h1>
                        @if($profile->title)
                            <p class="text-sm text-indigo-600 font-medium mt-0.5">{{ $profile->title }}</p>
                        @endif
                        @if($profile->about)
                            <p class="text-sm text-gray-500 mt-1 max-w-prose">{{ $profile->about }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF Section -->

</div>
<!-- END OF Main -->

<!-- Footer -->
<x-footer />

@endsection
