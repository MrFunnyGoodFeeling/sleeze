@extends('layouts.wrapper')

@section('page_title')
Design · Admin
@endsection

@section('content')

<!-- Navbar -->
<x-navbar page="design" />

<!-- Breadcrumb -->
<div class="bg-white border-b border-gray-200">
    <div class="mx-auto max-w-7xl">
        <div class="px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center justify-between h-12">
                <ol role="list" class="flex space-x-1">
                    <li>
                        <p class="text-gray-500 text-sm">
                            Design
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
    <div class="bg-white py-4">
        <div class="mx-auto max-w-7xl">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 gap-10">
                    <div>
                        <ul class="space-y-1">
                            <li>
                                <a href="/design/dashboard" class="hover:text-indigo-500">
                                    Template: Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="/design/bucket" class="hover:text-indigo-500">
                                    Bucket (Dashboard Form Livewire, Badges)
                                </a>
                            </li>
                            <li>
                                <a href="/design/breadcrumbs" class="hover:text-indigo-500">
                                    Breadcrumbs
                                </a>
                            </li>
                            <li>
                                <a href="/design/modals" class="hover:text-indigo-500">
                                    Modals
                                </a>
                            </li>
                            <li>
                                <a href="/design/tables" class="hover:text-indigo-500">
                                    Tables
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF Section -->

</div>
<!-- END OF Main -->

@endsection
