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

    <!-- Section -->
    <div class="mx-auto max-w-7xl">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl">
                <form action="#" method="post" enctype="multipart/form-data">
                    <!-- CSRF -->
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm text-gray-600 font-medium mb-1">
                                Name
                            </label>
                            <input type="text" name="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 disabled:bg-gray-50 disabled:text-gray-500">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 font-medium mb-1">
                                About
                            </label>
                            <textarea name="about" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 disabled:bg-gray-50 disabled:text-gray-500"></textarea>
                            <p class="mt-1 text-sm text-gray-500">
                                Write a few sentences about yourself.
                            </p>
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 font-medium mb-1">
                                Photo
                            </label>
                            <input type="file" name="photo">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 font-medium mb-1">
                                Country
                            </label>
                            <select name="country" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                <option>United States</option>
                                <option>Canada</option>
                                <option>Mexico</option>
                            </select>
                        </div>
                        <div class="space-y-2">
                            <div class="relative flex gap-x-3">
                                <div class="flex h-6 items-center">
                                    <input id="candidates" type="checkbox" name="candidates" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                </div>
                                <div>
                                    <label for="candidates" class="block text-sm font-medium leading-6">
                                        Candidates
                                    </label>
                                </div>
                            </div>
                            <div class="relative flex gap-x-3">
                                <div class="flex h-6 items-center">
                                    <input id="offers" type="checkbox" name="offers" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                </div>
                                <div>
                                    <label for="offers" class="block text-sm font-medium leading-6">
                                        Offers
                                    </label>
                                </div>
                            </div>
                            <div class="relative flex gap-x-3">
                                <div class="flex h-6 items-center">
                                    <input id="comments" type="checkbox" name="comments" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                </div>
                                <div>
                                    <label for="comments" class="block text-sm font-medium leading-6">
                                        Comments
                                    </label>
                                    <p class="text-sm text-gray-500">
                                        Get notified when someones posts a comment on a posting.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="space-y-2">
                                <div class="flex items-center gap-x-3">
                                    <input type="radio" id="banana" name="fruit" checked class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    <label for="banana" class="block text-sm font-medium leading-6">
                                        Banana
                                    </label>
                                </div>
                                <div class="flex items-center gap-x-3">
                                    <input type="radio" id="pineapple" name="fruit" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    <label for="pineapple" class="block text-sm font-medium leading-6">
                                        Pineapple
                                    </label>
                                </div>
                                <div class="flex items-center gap-x-3">
                                    <input type="radio" id="avocado" name="fruit" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    <label for="avocado" class="block text-sm font-medium leading-6">
                                        Avocado
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="flex space-x-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 transition">
                                save
                            </button>
                            <button type="button" class="inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring focus:ring-red-300 transition">
                                delete album
                            </button>
                            <button type="button" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-50 focus:outline-none focus:ring focus:ring-blue-200 transition">
                                moonwalk
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END OF Section -->

    <!-- Section -->
    <div class="mx-auto max-w-7xl">
        <div class="px-4 sm:px-6 lg:px-8">
            <form action="#" method="post" enctype="multipart/form-data">
                <!-- CSRF -->
                <div>
                    <h2 class="text-base/7 font-semibold text-gray-900">
                        Personal Information
                    </h2>
                    <p class="mt-1 text-sm/6 text-gray-600">
                        Use a permanent address where you can receive mail.
                    </p>
                </div>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="first-name" class="block text-sm/6 font-medium text-gray-900">
                            First name
                        </label>
                        <div class="mt-2">
                            <input type="text" id="first-name" name="first-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6 disabled:bg-gray-50 disabled:text-gray-500">
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="last-name" class="block text-sm/6 font-medium text-gray-900">
                            Last name
                        </label>
                        <div class="mt-2">
                            <input type="text" id="last-name" name="last-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6 disabled:bg-gray-50 disabled:text-gray-500">
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="email" class="block text-sm/6 font-medium text-gray-900">
                            Email address
                        </label>
                        <div class="mt-2">
                            <input type="email" id="email" name="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6 disabled:bg-gray-50 disabled:text-gray-500">
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="country" class="block text-sm/6 font-medium text-gray-900">
                            Country
                        </label>
                        <div class="mt-2">
                            <select id="country" name="country" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm/6">
                                <option>United States</option>
                                <option>Canada</option>
                                <option>Mexico</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-span-full">
                        <label for="street-address" class="block text-sm/6 font-medium text-gray-900">
                            Street address
                        </label>
                        <div class="mt-2">
                            <input type="text" id="street-address" name="street-address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6 disabled:bg-gray-50 disabled:text-gray-500">
                            <p class="mt-2 text-sm/6 text-gray-600">
                                Write a few sentences about yourself.
                            </p>
                        </div>
                    </div>
                    <div class="sm:col-span-2 sm:col-start-1">
                        <label for="city" class="block text-sm/6 font-medium text-gray-900">
                            City
                        </label>
                        <div class="mt-2">
                            <input type="text" name="city" id="city" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6 disabled:bg-gray-50 disabled:text-gray-500">
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="region" class="block text-sm/6 font-medium text-gray-900">
                            State / Province
                        </label>
                        <div class="mt-2">
                            <input type="text" id="region" name="region" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6 disabled:bg-gray-50 disabled:text-gray-500">
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="postal-code" class="block text-sm/6 font-medium text-gray-900">
                            ZIP / Postal code
                        </label>
                        <div class="mt-2">
                            <input type="text" id="postal-code" name="postal-code" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6 disabled:bg-gray-50 disabled:text-gray-500">
                        </div>
                    </div>
                </div>
                <div class="mt-10 space-y-6">
                    <div class="relative flex gap-x-3">
                        <div class="flex h-6 items-center">
                            <input type="checkbox" id="comments" name="comments" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        </div>
                        <div class="text-sm/6">
                            <label for="comments" class="font-medium text-gray-900">
                                Comments
                            </label>
                            <p class="text-gray-500">
                                Get notified when someones posts a comment on a posting.
                            </p>
                        </div>
                    </div>
                    <div class="relative flex gap-x-3">
                        <div class="flex h-6 items-center">
                            <input type="checkbox" id="candidates" name="candidates" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        </div>
                        <div class="text-sm/6">
                            <label for="candidates" class="font-medium text-gray-900">
                                Candidates
                            </label>
                            <p class="text-gray-500">
                                Get notified when a candidate applies for a job.
                            </p>
                        </div>
                    </div>
                    <div class="relative flex gap-x-3">
                        <div class="flex h-6 items-center">
                            <input type="checkbox" id="offers" name="offers" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        </div>
                        <div class="text-sm/6">
                            <label for="offers" class="font-medium text-gray-900">
                                Offers
                            </label>
                            <p class="text-gray-500">
                                Get notified when a candidate accepts or rejects an offer.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mt-10 space-y-6">
                    <div class="flex items-center gap-x-3">
                        <input type="radio" id="push-everything" name="push-notifications" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        <label for="push-everything" class="block text-sm/6 font-medium text-gray-900">
                            Everything
                        </label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input type="radio" id="push-email" name="push-notifications" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        <label for="push-email" class="block text-sm/6 font-medium text-gray-900">
                            Same as email
                        </label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input type="radio" id="push-nothing" name="push-notifications" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        <label for="push-nothing" class="block text-sm/6 font-medium text-gray-900">
                            No push notifications
                        </label>
                    </div>
                </div>
                <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 mt-6 pt-6">
                    <button type="button" class="text-sm/6 font-semibold text-gray-900">
                        Cancel
                    </button>
                    <button type="button" class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- END OF Section -->

</div>
<!-- END OF Main -->

<!-- Footer -->
<x-footer />

@endsection
