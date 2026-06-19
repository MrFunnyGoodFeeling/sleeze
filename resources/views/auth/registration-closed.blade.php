@extends('layouts.wrapper')

@section('page_title')
Registration Closed
@endsection

@section('content')

<div class="flex flex-col justify-between h-screen bg-gray-100">
    <x-navbar page="registration-closed" />
    <div class="flex justify-center">
        <div class="bg-white max-w-2xl w-full shadow-md rounded-lg py-8 px-6">
            <div class="text-center">
                <h1 class="text-4xl sm:text-5xl font-semibold tracking-tight text-balance text-gray-900">
                    Registration closed
                </h1>
                <p class="mt-6 text-lg font-medium text-pretty text-gray-500 sm:text-xl/8">
                    Registration closed during the testing phase.
                </p>
            </div>
        </div>
    </div>
    <div>
        <!-- Touch Nothing -->
    </div>
</div>

@endsection
