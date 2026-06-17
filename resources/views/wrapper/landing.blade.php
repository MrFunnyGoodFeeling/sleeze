@extends('layouts.wrapper')

@section('page_title')
Welcome
@endsection

@section('content')

<!-- Navbar -->
<x-navbar page="landing" />

<!-- Section -->
<div class="bg-white py-56">
    <div class="mx-auto max-w-2xl">
        <div class="text-center">
            <h1 class="text-5xl font-semibold tracking-tight text-balance text-gray-900 sm:text-7xl">
                Data to enrich your online business
            </h1>
            <p class="mt-8 text-lg font-medium text-pretty text-gray-500 sm:text-xl/8">
                Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat.
            </p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="#" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get started</a>
                <a href="#" class="text-sm/6 font-semibold text-gray-900">Learn more <span aria-hidden="true">→</span></a>
            </div>
        </div>
    </div>
</div>
<!-- END OF Section -->

<!-- Section -->
<!--
<div class="bg-gray-900 py-56">
    <div class="mx-auto max-w-2xl">
        <div class="text-center">
            <h1 class="text-5xl font-semibold tracking-tight text-balance text-white sm:text-7xl">
                Data to enrich your online business
            </h1>
            <p class="mt-8 text-lg font-medium text-pretty text-gray-400 sm:text-xl/8">
                Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat.
            </p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="#" class="rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Get started</a>
                <a href="#" class="text-sm/6 font-semibold text-white">Learn more <span aria-hidden="true">→</span></a>
            </div>
        </div>
    </div>
</div>
-->
<!-- END OF Section -->

<!-- Footer -->
<x-footer />

@endsection
