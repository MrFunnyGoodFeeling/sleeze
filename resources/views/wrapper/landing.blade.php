@extends('layouts.wrapper')

@section('page_title')
Welcome
@endsection

@section('content')

<!-- Navbar -->
<x-navbar page="landing" />

<!-- Main -->
<div class="bg-white py-56">
    <div class="mx-auto max-w-2xl">
        <div class="text-center">
            <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                <div class="relative rounded-full px-3 py-1 text-sm/6 text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                    Another Starter Pack for Laravel
                </div>
            </div>
            <h1 class="text-5xl font-semibold tracking-tight text-balance text-gray-900 sm:text-7xl">
                Laravel Sleeze
            </h1>
            <p class="mt-8 text-lg font-medium text-pretty text-gray-500 sm:text-xl/8">
                Every Laravel dev has their own starter kit (that fits their projects), this is mine. Listen lad, enjoy!
            </p>
        </div>
    </div>
</div>
<!-- END OF Main -->

@endsection
