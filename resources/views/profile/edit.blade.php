@extends('layouts.wrapper')

@section('page_title')
Profile
@endsection

@section('content')

<!-- Navbar -->
<x-navbar page="profile" />

<!-- Breadcrumb -->
<div class="bg-white border-b border-gray-200">
    <div class="mx-auto max-w-7xl">
        <div class="px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center justify-between h-12">
                <ol role="list" class="flex space-x-1">
                    <li>
                        <p class="text-gray-500 text-sm">Profile</p>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END OF Breadcrumb -->

<!-- Alert -->
<x-alert />

<!-- Section -->
<div class="bg-white py-10" x-data="{ newFile: false, confirmDelete: null, confirmDeleteSrc: null }">
    <div class="max-w-2xl">
        <div class="px-4 sm:px-6 lg:px-8">

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Avatar -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Avatar</label>

                    @if ($avatars->isNotEmpty())
                        <div class="mt-2 flex flex-wrap gap-3">
                            @foreach ($avatars as $av)
                                <div class="flex flex-col items-center gap-1">
                                    <label class="relative cursor-pointer">
                                        <input
                                            type="radio"
                                            name="selected_avatar"
                                            value="{{ $av->path }}"
                                            {{ $profile?->avatar === $av->path ? 'checked' : '' }}
                                            @change="newFile = false; $el.closest('form').querySelector('#avatar').value = ''"
                                            class="sr-only peer"
                                        />
                                        <img
                                            src="{{ Storage::url($av->path) }}"
                                            alt="Avatar option"
                                            class="size-14 rounded-full object-cover outline outline-2 outline-transparent peer-checked:outline-green-500 hover:outline-gray-300 transition-all"
                                        />
                                    </label>
                                    <button
                                        type="button"
                                        @click="confirmDelete = '{{ route('profile.avatars.destroy', $av) }}'; confirmDeleteSrc = '{{ Storage::url($av->path) }}'"
                                        class="text-gray-400 hover:text-red-500 transition-colors"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <div class="mt-3">
                        <input
                            type="file"
                            id="avatar"
                            name="avatar"
                            accept="image/*"
                            @change="
                                const file = $event.target.files[0];
                                if (file) {
                                    newFile = true;
                                    $el.closest('form').querySelectorAll('input[name=selected_avatar]').forEach(r => r.checked = false);
                                }
                            "
                            class="text-sm text-gray-500 file:mr-3 file:rounded-md file:border-0 file:bg-indigo-50 file:px-3 file:py-1.5 file:text-sm file:font-medium file:text-indigo-700 hover:file:bg-indigo-100 @error('avatar') text-red-500 @enderror"
                        />
                        @error('avatar')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Display Name -->
                <div>
                    <label for="display_name" class="block text-sm font-medium text-gray-700">Display name</label>
                    <input
                        type="text"
                        id="display_name"
                        name="display_name"
                        value="{{ old('display_name', $profile?->display_name) }}"
                        maxlength="50"
                        class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 @error('display_name') border-red-400 @enderror"
                    />
                    @error('display_name')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Short Bio -->
                <div>
                    <label for="bio" class="block text-sm font-medium text-gray-700">Short bio</label>
                    <input
                        type="text"
                        id="bio"
                        name="bio"
                        value="{{ old('bio', $profile?->bio) }}"
                        maxlength="160"
                        placeholder="A short description shown on your profile"
                        class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 @error('bio') border-red-400 @enderror"
                    />
                    @error('bio')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Location -->
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                    <input
                        type="text"
                        id="location"
                        name="location"
                        value="{{ old('location', $profile?->location) }}"
                        maxlength="100"
                        class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 @error('location') border-red-400 @enderror"
                    />
                    @error('location')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Save
                    </button>
                </div>
            </form>

        </div>
    </div>

    <!-- Delete avatar confirmation modal -->
    <div x-show="confirmDelete" x-cloak class="fixed inset-0 z-50 flex items-center justify-center">
        <div class="absolute inset-0 bg-black/40" @click="confirmDelete = null; confirmDeleteSrc = null"></div>
        <div class="relative bg-white rounded-lg shadow-xl p-6 w-full max-w-md mx-4">
            <div class="flex items-center gap-4">
                <img :src="confirmDeleteSrc" alt="Avatar to delete" class="size-14 rounded-full object-cover shrink-0" />
                <div>
                    <p class="text-sm font-medium text-gray-900">Delete this avatar?</p>
                    <p class="mt-0.5 text-sm text-gray-500">This can't be undone.</p>
                </div>
            </div>
            <div class="mt-5 flex justify-end gap-3">
                <button type="button" @click="confirmDelete = null; confirmDeleteSrc = null" class="rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100">
                    Cancel
                </button>
                <form :action="confirmDelete" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="rounded-md bg-red-600 px-3 py-2 text-sm font-medium text-white hover:bg-red-700">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END OF Section -->

@endsection
