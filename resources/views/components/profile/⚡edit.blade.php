<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

new class extends Component
{
    use WithFileUploads;

    public mixed $profile;
    public mixed $avatars;

    public ?string $display_name = null;
    public ?string $location = null;
    public ?string $selected_avatar = null;

    #[Validate('nullable|image|max:2048')]
    public mixed $avatar = null;

    public function mount(): void
    {
        $this->profile = Auth::user()->profile;
        $this->avatars = Auth::user()->avatars()->latest()->get();
        $this->display_name = $this->profile?->display_name;
        $this->location = $this->profile?->location;
        $this->selected_avatar = $this->profile?->avatar;
    }

    public function destroyAvatar(int $avatarId): void
    {
        $avatar = Auth::user()->avatars()->findOrFail($avatarId);

        $isActive = Auth::user()->profile?->avatar === $avatar->path;

        Storage::disk('public')->delete($avatar->path);
        $avatar->delete();

        if ($isActive) {
            Auth::user()->profile()?->update(['avatar' => null]);
            $this->selected_avatar = null;
        }

        $this->profile = Auth::user()->fresh()->profile;
        $this->avatars = Auth::user()->avatars()->latest()->get();

        session()->flash('alertSuccess', 'Avatar deleted.');
        $this->redirect(route('profile.edit'));
    }

    public function update(): void
    {
        $this->validate([
            'display_name'    => ['nullable', 'string', 'max:50'],
            'location'        => ['nullable', 'string', 'max:100'],
            'avatar'          => ['nullable', 'image', 'max:2048'],
            'selected_avatar' => ['nullable', 'string'],
        ]);

        $data = [
            'display_name' => $this->display_name,
            'location'     => $this->location,
        ];

        if ($this->avatar) {
            $path = $this->avatar->store('avatars', 'public');
            Auth::user()->avatars()->create(['path' => $path]);
            $data['avatar'] = $path;
        } elseif ($this->selected_avatar) {
            $data['avatar'] = $this->selected_avatar;
        }

        Auth::user()->profile()->updateOrCreate(
            ['user_id' => Auth::id()],
            $data,
        );

        session()->flash('alertSuccess', 'Profile updated.');
        $this->redirect(route('profile.edit'));
    }
};
?>

<div x-data="{ confirmDelete: null, confirmDeleteSrc: null }">
    <div class="bg-white py-8">
        <div class="mx-auto max-w-7xl">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="max-w-2xl">

                    <form wire:submit="update">
                        <div class="space-y-12">
                            <div class="border-b border-gray-900/10 pb-12">
                                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                    <div class="sm:col-span-4">
                                        <label for="display_name" class="block text-sm/6 font-medium text-gray-900">Display name</label>
                                        <div class="mt-2">
                                            <input id="display_name" type="text" wire:model="display_name" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                                        </div>
                                    </div>

                                    <div class="col-span-full">
                                        <label class="block text-sm/6 font-medium text-gray-900">Avatar</label>

                                        {{-- Previously uploaded avatars --}}
                                        @if ($avatars->isNotEmpty())
                                            <div class="mt-4 flex flex-wrap gap-3">
                                                @foreach ($avatars as $savedAvatar)
                                                    <div wire:key="{{ $savedAvatar->id }}" class="relative">
                                                        <label class="cursor-pointer">
                                                            <input type="radio" wire:model="selected_avatar" value="{{ $savedAvatar->path }}"
                                                                class="sr-only peer"
                                                            />
                                                            <img src="{{ Storage::url($savedAvatar->path) }}" alt="Avatar option"
                                                                class="size-20 rounded-full object-cover ring-2 ring-transparent peer-checked:ring-indigo-600 hover:ring-gray-300 peer-checked:hover:ring-indigo-600"
                                                            />
                                                        </label>
                                                        <button type="button"
                                                            @click="confirmDelete = {{ $savedAvatar->id }}; confirmDeleteSrc = '{{ Storage::url($savedAvatar->path) }}'"
                                                            class="absolute -top-1 -right-1 flex size-5 items-center justify-center rounded-full bg-red-500 text-white hover:bg-red-600"
                                                        >
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-2.5">
                                                                <path d="M5.28 4.22a.75.75 0 0 0-1.06 1.06L6.94 8l-2.72 2.72a.75.75 0 1 0 1.06 1.06L8 9.06l2.72 2.72a.75.75 0 1 0 1.06-1.06L9.06 8l2.72-2.72a.75.75 0 0 0-1.06-1.06L8 6.94 5.28 4.22Z" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif

                                        {{-- Upload new --}}
                                        <div class="mt-4">
                                            <input type="file" id="avatar" wire:model="avatar" accept="image/*"
                                                class="text-sm text-gray-500 file:mr-3 file:rounded-md file:border-0 file:bg-indigo-50 file:px-3 file:py-1.5 file:text-sm file:font-medium file:text-indigo-700 hover:file:bg-indigo-100 @error('avatar') text-red-500 @enderror"
                                            />
                                            @error('avatar')
                                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="sm:col-span-4">
                                        <label for="location" class="block text-sm/6 font-medium text-gray-900">Location</label>
                                        <div class="mt-2">
                                            <input id="location" type="text" wire:model="location" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center gap-x-6">
                            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                        </div>

                    </form>

                </div>
            </div>
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
                <button type="button" @click="$wire.destroyAvatar(confirmDelete); confirmDelete = null; confirmDeleteSrc = null" class="rounded-md bg-red-600 px-3 py-2 text-sm font-medium text-white hover:bg-red-700">
                    Delete
                </button>
            </div>
        </div>
    </div>

</div>
