@extends('layouts.wrapper')

@section('page_title')
Login
@endsection

@section('content')

<div class="flex flex-col justify-between h-screen bg-gray-50">
    <x-navbar page="login" />
    <div class="flex justify-center">
        <div class="bg-white max-w-sm w-full shadow-md rounded-lg py-4 px-6">
            <form class="w-full" method="post" action="/login">
                @csrf
                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">
                            E-mail
                        </label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required class="block w-full sm:text-sm border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('email')
                            <p class="text-red-500 text-xs italic mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">
                            Password
                        </label>
                        <input id="password" type="password" name="password" required class="block w-full sm:text-sm border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('password')
                            <p class="text-red-500 text-xs italic mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 transition">
                            login
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <x-footer />
</div>

@endsection
