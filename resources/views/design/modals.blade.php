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

<!-- Section -->
<div class="bg-white border-b border-gray-300 py-10">
    <div class="mx-auto max-w-7xl">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="flex space-x-5">
                <div x-data="{ open: false }">
                    <button @click="open = true" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-50 focus:outline-none focus:ring focus:ring-blue-200 transition">
                        form
                    </button>
                    <div x-show="open" class="relative z-10" style="display:none">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <!-- CSRF -->
                            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                                <div class="flex min-h-full items-end sm:items-center justify-center p-4 sm:p-0">
                                    <div class="relative transform overflow-hidden rounded-lg bg-white shadow-xl transition-all sm:my-8 w-full max-w-lg">
                                        <div class="bg-white py-5 sm:py-6 px-4 sm:px-6">
                                            <div class="sm:flex sm:items-start">
                                                <div class="w-full">
                                                    <h3 class="font-semibold text-gray-900">
                                                        Create post
                                                    </h3>
                                                    <div class="mt-2">
                                                        <p class="text-sm text-gray-600">
                                                            Are you sure you want to deactivate your account? All of your data will be permanently removed. This action cannot be undone.
                                                        </p>
                                                    </div>
                                                    <div class="space-y-4 mt-2">
                                                        <div>
                                                            <label class="block text-sm font-medium text-gray-600 mb-1">
                                                                Name
                                                            </label>
                                                            <input id="name" type="text" name="name" class="block w-full text-sm border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                                        </div>
                                                        <div>
                                                            <label class="block text-sm font-medium text-gray-600 mb-1">
                                                                About
                                                            </label>
                                                            <textarea id="about" name="about" class="block w-full text-sm border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex space-x-3 pt-4">
                                                <button type="submit" class="inline-flex w-full sm:w-auto justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
                                                    Save
                                                </button>
                                                <button type="button" @click="open = false" class="inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div x-data="{ open: false }">
                    <button @click="open = true" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-50 focus:outline-none focus:ring focus:ring-blue-200 transition">
                        deactivate account
                    </button>
                    <div x-show="open" class="relative z-10" style="display:none">
                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 w-full sm:max-w-lg">
                                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                        <div class="sm:flex sm:items-start">
                                            <div class="mt-3 text-center sm:mt-0 sm:text-left">
                                                <h3 class="text-base font-semibold text-gray-900" id="modal-title">
                                                    Deactivate account
                                                </h3>
                                                <div class="mt-2">
                                                    <p class="text-sm text-gray-600">
                                                        Are you sure you want to deactivate your account? All of your data will be permanently removed. This action cannot be undone.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                        <form>
                                            <button type="button" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">
                                                Deactivate
                                            </button>
                                        </form>
                                        <button type="button" @click="open = false" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END OF Section -->

<!-- Footer -->
<x-footer />

@endsection
