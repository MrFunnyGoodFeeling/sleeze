@extends('layouts.wrapper')

@section('page_title')
Admin
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
                        <p class="text-gray-500 text-sm">
                            Admin
                        </p>
                    </li>
                </ol>
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

    <!-- Section -->
    <!--
    <div class="bg-white py-4">
        <div class="mx-auto max-w-7xl">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 gap-10">
                    <div>
                        <ul>
                            <li>
                                <a href="/admin/users" class="hover:text-indigo-500">
                                    Users
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    -->
    <!-- END OF Section -->

</div>
<!-- END OF Main -->

<!-- Footer -->
<x-footer />

@endsection
