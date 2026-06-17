@extends('layouts.wrapper')

@section('page_title')
Login
@endsection

@section('content')

<div class="flex flex-col justify-between h-screen bg-gray-100">
    <x-navbar page="login" />
    <div class="flex justify-center">
        <div class="bg-white max-w-sm w-full shadow-md rounded-lg py-4 px-6">
            <form class="w-full" method="post" action="/login">
                @csrf
                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">
                            E-mail
                        </label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        @error('email')
                            <p class="text-red-500 text-xs italic mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">
                            Password
                        </label>
                        <input id="password" type="password" name="password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
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
    <div>
        <!-- Touch Nothing -->
    </div>
</div>

@endsection
