@extends('layouts.wrapper')

@section('page_title')
Users
@endsection

@section('content')

<!-- Navbar -->
<x-navbar page="users" />

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
            <div class="sm:px-6 lg:px-8">
                <div class="overflow-hidden border-t border-b sm:border-r sm:border-l border-gray-200 sm:rounded-md shadow-sm">
                    <table class="w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    name
                                </th>
                                <th scope="col" class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    e-mail
                                </th>
                                <th scope="col" class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    reg. date
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($users as $user)
                                <tr>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center space-x-1">
                                            <p class="text-gray-700 text-sm font-medium">
                                                <a href="#" class="hover:text-indigo-500">
                                                    {{ $user->name }}
                                                </a>
                                            </p>
                                            @if($user->isAdmin())
                                                <span class="inline-flex items-center rounded-full bg-indigo-50 px-2 py-1 text-xs font-medium text-indigo-700 ring-1 ring-inset ring-indigo-50">
                                                    Admin
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <p class="text-gray-700 text-sm">
                                            {{ $user->email }}
                                        </p>
                                    </td>
                                    <td class="py-4 px-6">
                                        <p class="text-gray-700 text-sm">
                                            {{ date('F j, Y', strtotime($user->created_at)) }}
                                        </p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if($users->count() > 10)
                    <div class="mt-2.5">
                        <x-pagination :items="$users" />
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- END OF Section -->

</div>
<!-- END OF Main -->

<!-- Footer -->
<x-footer />

@endsection
