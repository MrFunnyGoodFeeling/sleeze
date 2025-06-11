@extends('layouts.wrapper')

@section('page_title')
Design
@endsection

@section('content')

<!-- Navbar -->
<x-navbar page="banana" />

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
<div class="bg-white divide-y divide-gray-200 py-10">

    <!-- Breadcrumbs -->
    <div class="bg-white border-b border-gray-200">
        <div class="mx-auto max-w-7xl">
            <div class="px-4 sm:px-6 lg:px-8">
                <nav class="flex items-center justify-between h-12">
                    <ol role="list" class="flex space-x-1">
                        <li>
                            <div class="flex items-center">
                                <a href="#" class="text-sm font-medium text-gray-900 hover:text-indigo-500 mr-1">
                                    Banana
                                </a>
                                <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                                    <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                                </svg>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <a href="#" class="text-sm font-medium text-gray-900 hover:text-indigo-500 mr-1">
                                    Pineapple
                                </a>
                                <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                                    <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                                </svg>
                            </div>
                        </li>
                        <li>
                            <p class="text-gray-500 text-sm">
                                Possum Tackler
                            </p>
                        </li>
                    </ol>
                    <div class="flex">
                        <div x-data="{ open: false }" class="relative inline-block text-left">
                            <div>
                                <button type="button" @click="open = !open" class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                    <span>Options</span>
                                    <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                        <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                            <div x-show="open" class="absolute right-0 z-10 mt-1.5 w-48 origin-top-right rounded-md bg-white shadow-md ring-1 ring-black ring-opacity-5 focus:outline-none">
                                <div class="py-1">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:text-indigo-500">Account settings</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:text-indigo-500">Support</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:text-indigo-500">License</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="bg-white border-b border-gray-200">
        <div class="mx-auto max-w-7xl">
            <div class="px-4 sm:px-6 lg:px-8">
                <nav class="flex items-center justify-between h-12">
                    <ol role="list" class="flex space-x-1">
                        <li>
                            <div class="flex items-center">
                                <a href="#" class="text-sm font-medium text-gray-900 hover:text-indigo-500 mr-1">
                                    Banana
                                </a>
                                <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                                    <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                                </svg>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <a href="#" class="text-sm font-medium text-gray-900 hover:text-indigo-500 mr-1">
                                    Pineapple
                                </a>
                                <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                                    <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                                </svg>
                            </div>
                        </li>
                        <li>
                            <p class="text-gray-500 text-sm">
                                Possum Tackler
                            </p>
                        </li>
                    </ol>
                    <div class="flex">
                        <a href="#" class="inline-flex space-x-1 rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
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
    <div class="bg-white border-b border-gray-200">
        <div class="mx-auto max-w-7xl">
            <div class="px-4 sm:px-6 lg:px-8">
                <nav class="flex items-center justify-between h-12">
                    <ol role="list" class="flex space-x-1">
                        <li>
                            <div class="flex items-center">
                                <a href="#" class="text-sm font-medium text-gray-900 hover:text-indigo-500 mr-1">
                                    Banana
                                </a>
                                <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                                    <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                                </svg>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <a href="#" class="text-sm font-medium text-gray-900 hover:text-indigo-500 mr-1">
                                    Pineapple
                                </a>
                                <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                                    <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                                </svg>
                            </div>
                        </li>
                        <li>
                            <p class="text-gray-500 text-sm">
                                Possum Tackler
                            </p>
                        </li>
                    </ol>
                    <div class="flex">
                        <a href="#" class="inline-flex space-x-1 rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            <span>New Post</span>
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- END OF Breadcrumbs -->

    <!-- Table -->
    <div class="mx-auto max-w-7xl">
        <div class="sm:px-6 lg:px-8">
            <div class="overflow-hidden border-t border-b sm:border-r sm:border-l border-gray-200 sm:rounded-md shadow-sm">
                <table class="w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                song
                            </th>
                            <th scope="col" class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                artist
                            </th>
                            <th scope="col" class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                year
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="py-4 px-6">
                                <p class="text-gray-700 text-sm font-medium">
                                    <a href="#" class="hover:text-indigo-500">
                                        The Sliding Mr. Bones (Next Stop, Pottersville)
                                    </a>
                                </p>
                            </td>
                            <td class="py-4 px-6">
                                <p class="text-gray-700 text-sm font-medium">
                                    Malcolm Lockyer
                                </p>
                            </td>
                            <td class="py-1 px-6">
                                <div class="flex space-x-2">
                                    <button type="button" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                        Change
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-4 px-6">
                                <p class="text-gray-700 text-sm font-medium">
                                    <a href="#" class="hover:text-indigo-500">
                                        Witchy Woman
                                    </a>
                                </p>
                            </td>
                            <td class="py-4 px-6">
                                <p class="text-gray-700 text-sm font-medium">
                                    The Eagles
                                </p>
                            </td>
                            <td class="py-1 px-6">
                                <div class="flex space-x-2">
                                    <button type="button" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                        Change
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-4 px-6">
                                <p class="text-gray-700 text-sm font-medium">
                                    <a href="#" class="hover:text-indigo-500">
                                        Shining Star
                                    </a>
                                </p>
                            </td>
                            <td class="py-4 px-6">
                                <p class="text-gray-700 text-sm font-medium">
                                    The Eagles
                                </p>
                            </td>
                            <td class="py-1 px-6">
                                <div class="flex space-x-2">
                                    <button type="button" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                        Change
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END OF Table -->

    <!-- Table #2 -->
    <div class="mx-auto max-w-7xl">
        <div class="sm:px-6 lg:px-8">
            <table class="border-collapse w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider border border-gray-200 py-2 px-5">
                            name
                        </th>
                        <th scope="col" class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider border border-gray-200 py-2 px-5">
                            title
                        </th>
                        <th scope="col" class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider border border-gray-200 py-2 px-5">
                            e-mail
                        </th>
                        <th scope="col" class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider border border-gray-200 py-2 px-5">
                            role
                        </th>
                        <th scope="col" class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider border border-gray-200 py-2 px-5">
                            options
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="border border-gray-200 py-3 px-5">
                            <p class="text-sm font-semibold">
                                Lindsay Walton
                            </p>
                        </td>
                        <td class="border border-gray-200 py-3 px-5">
                            <p class="text-sm">
                                Front-end Developer
                            </p>
                        </td>
                        <td class="border border-gray-200 py-3 px-5">
                            <p class="text-sm">
                                lindsay.walton@example.com
                            </p>
                        </td>
                        <td class="border border-gray-200 py-3 px-5">
                            <p class="text-sm">
                                Member
                            </p>
                        </td>
                        <td class="border border-gray-200 py-3 px-5">
                            <p class="text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-400">
                                    Edit
                                </a>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END OF Table #2 -->

    <!-- Table #3 -->
    <div class="mx-auto max-w-7xl">
        <div class="sm:px-4">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="text-left py-4 px-6 text-sm font-semibold">Name</th>
                        <th class="text-left py-4 px-6 text-sm font-semibold">Status</th>
                        <th class="text-left py-4 px-6 text-sm font-semibold">Role</th>
                        <th class="text-left py-4 px-6 text-sm font-semibold">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <td class="py-4 px-6 text-sm text-gray-800">John Cooper</td>
                        <td class="py-4 px-6 text-sm text-gray-800">Active</td>
                        <td class="py-4 px-6 text-sm text-gray-800">Developer</td>
                        <td class="py-4 px-6 text-sm text-gray-800">Jan 12, 2024</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6 text-sm text-gray-800">Sarah Blake</td>
                        <td class="py-4 px-6 text-sm text-gray-800">Offline</td>
                        <td class="py-4 px-6 text-sm text-gray-800">Designer</td>
                        <td class="py-4 px-6 text-sm text-gray-800">Jan 12, 2024</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6 text-sm text-gray-800">Mike Johnson</td>
                        <td class="py-4 px-6 text-sm text-gray-800">Active</td>
                        <td class="py-4 px-6 text-sm text-gray-800">Manager</td>
                        <td class="py-4 px-6 text-sm text-gray-800">Jan 12, 2024</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END OF Table #3 -->

    <!-- Table #4 -->
    <div class="bg-gray-900 border-b border-gray-300 py-10">
        <div class="mx-auto max-w-7xl">
            <div class="sm:px-4">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-700">
                            <th class="text-left py-4 px-6 text-sm font-semibold text-gray-100">Name</th>
                            <th class="text-left py-4 px-6 text-sm font-semibold text-gray-100">Status</th>
                            <th class="text-left py-4 px-6 text-sm font-semibold text-gray-100">Role</th>
                            <th class="text-left py-4 px-6 text-sm font-semibold text-gray-100">Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        <tr>
                            <td class="py-4 px-6 text-sm text-gray-300">John Cooper</td>
                            <td class="py-4 px-6 text-sm text-gray-300">Active</td>
                            <td class="py-4 px-6 text-sm text-gray-300">Developer</td>
                            <td class="py-4 px-6 text-sm text-gray-300">Jan 12, 2024</td>
                        </tr>
                        <tr>
                            <td class="py-4 px-6 text-sm text-gray-300">Sarah Blake</td>
                            <td class="py-4 px-6 text-sm text-gray-300">Offline</td>
                            <td class="py-4 px-6 text-sm text-gray-300">Designer</td>
                            <td class="py-4 px-6 text-sm text-gray-300">Jan 13, 2024</td>
                        </tr>
                        <tr>
                            <td class="py-4 px-6 text-sm text-gray-300">Mike Johnson</td>
                            <td class="py-4 px-6 text-sm text-gray-300">Active</td>
                            <td class="py-4 px-6 text-sm text-gray-300">Manager</td>
                            <td class="py-4 px-6 text-sm text-gray-300">Jan 14, 2024</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END OF Table #4 -->

    <!-- Badges -->
    <div class="bg-white border-b border-gray-300 py-10">
        <div class="mx-auto max-w-7xl">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="space-y-5">
                    <div class="flex space-x-3">
                        <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">Badge</span>
                        <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">Badge</span>
                        <span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">Badge</span>
                        <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Badge</span>
                        <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">Badge</span>
                        <span class="inline-flex items-center rounded-md bg-indigo-50 px-2 py-1 text-xs font-medium text-indigo-700 ring-1 ring-inset ring-indigo-700/10">Badge</span>
                        <span class="inline-flex items-center rounded-md bg-purple-50 px-2 py-1 text-xs font-medium text-purple-700 ring-1 ring-inset ring-purple-700/10">Badge</span>
                        <span class="inline-flex items-center rounded-md bg-pink-50 px-2 py-1 text-xs font-medium text-pink-700 ring-1 ring-inset ring-pink-700/10">Badge</span>
                    </div>
                    <div class="flex space-x-3">
                        <span class="inline-flex items-center rounded-full bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">Badge</span>
                        <span class="inline-flex items-center rounded-full bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">Badge</span>
                        <span class="inline-flex items-center rounded-full bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">Badge</span>
                        <span class="inline-flex items-center rounded-full bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Badge</span>
                        <span class="inline-flex items-center rounded-full bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">Badge</span>
                        <span class="inline-flex items-center rounded-full bg-indigo-50 px-2 py-1 text-xs font-medium text-indigo-700 ring-1 ring-inset ring-indigo-700/10">Badge</span>
                        <span class="inline-flex items-center rounded-full bg-purple-50 px-2 py-1 text-xs font-medium text-purple-700 ring-1 ring-inset ring-purple-700/10">Badge</span>
                        <span class="inline-flex items-center rounded-full bg-pink-50 px-2 py-1 text-xs font-medium text-pink-700 ring-1 ring-inset ring-pink-700/10">Badge</span>
                    </div>
                    <div class="flex space-x-3">
                        <span class="inline-flex items-center rounded-full bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-50">Badge</span>
                        <span class="inline-flex items-center rounded-full bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-50">Badge</span>
                        <span class="inline-flex items-center rounded-full bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-50">Badge</span>
                        <span class="inline-flex items-center rounded-full bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-50">Badge</span>
                        <span class="inline-flex items-center rounded-full bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-50">Badge</span>
                        <span class="inline-flex items-center rounded-full bg-indigo-50 px-2 py-1 text-xs font-medium text-indigo-700 ring-1 ring-inset ring-indigo-50">Badge</span>
                        <span class="inline-flex items-center rounded-full bg-purple-50 px-2 py-1 text-xs font-medium text-purple-700 ring-1 ring-inset ring-purple-50">Badge</span>
                        <span class="inline-flex items-center rounded-full bg-pink-50 px-2 py-1 text-xs font-medium text-pink-700 ring-1 ring-inset ring-pink-50">Badge</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF Badges -->

    <!-- Action Panels -->
    <div class="bg-gray-50 border-b border-gray-300">
        <div class="space-y-10 py-10">
            <div class="mx-auto max-w-7xl">
                <div class="sm:px-6 lg:px-8">
                    <div class="sm:rounded-lg bg-white shadow">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="sm:flex sm:items-start sm:justify-between">
                                <div>
                                    <div class="flex items-center">
                                        <h3 class="font-semibold leading-6 text-gray-900">
                                            Verify your email address
                                        </h3>
                                    </div>
                                    <div class="mt-2 max-w-xl text-sm text-gray-600">
                                        <p>
                                            Ensure reliable delivery of important notifications and secure your account.
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-5 sm:ml-6 sm:mt-0 sm:flex sm:flex-shrink-0 sm:items-center">
                                    <button type="button" class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                        Verify email
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-auto max-w-7xl">
                <div class="sm:px-6 lg:px-8">
                    <div class="sm:rounded-lg bg-white shadow">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="text-base font-semibold leading-6 text-gray-900">
                                Manage Subscription
                            </h3>
                            <div class="mt-2 max-w-xl text-sm text-gray-600">
                                <p>
                                    You are currently on the free plan. Upgrade to access premium features.
                                </p>
                            </div>
                            <div class="mt-5">
                                <div class="flex space-x-3">
                                    <button type="button" class="inline-flex items-center justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                        Upgrade Plan
                                    </button>
                                    <button type="button" class="inline-flex items-center justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                        Learn more
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-auto max-w-7xl">
                <div class="sm:px-6 lg:px-8">
                    <div class="sm:rounded-lg bg-white shadow">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="text-base font-semibold leading-6 text-gray-900">
                                Delete Account
                            </h3>
                            <div class="mt-2 max-w-xl text-sm text-gray-600">
                                <p>
                                    Once you delete your account, you will lose all data associated with it.
                                </p>
                            </div>
                            <div class="mt-5">
                                <div class="flex space-x-3">
                                    <button type="button" class="inline-flex items-center justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                                        Delete account
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-auto max-w-7xl">
                <div class="sm:px-6 lg:px-8">
                    <div class="sm:rounded-lg bg-white shadow">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="text-base font-semibold leading-6 text-gray-900">
                                Update API Key
                            </h3>
                            <div class="mt-2 max-w-xl text-sm text-gray-600">
                                <p>
                                    Use this key to authenticate API requests with your account.
                                </p>
                            </div>
                            <div class="mt-5">
                                <form action="#" method="post" enctype="multipart/form-data" class="sm:flex sm:items-center">
                                    <div class="w-full sm:max-w-xs">
                                        <input type="text" id="api-key" name="api-key" placeholder="Enter API key" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                    <button type="submit" class="mt-3 sm:mt-0 sm:ml-3 inline-flex w-full sm:w-auto items-center justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                        Save
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF Action Panels -->

</div>
<!-- END OF Main -->

<!-- Footer -->
<x-footer />

@endsection
