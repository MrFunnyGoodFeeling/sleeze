<?php

use Livewire\Component;
use Livewire\WithFileUploads;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\UserProfile;

new class extends Component
{

    use WithFileUploads;

    public string $nickname = '';
    public string $title = '';
    public string $about = '';
    public $avatar = null;

    public string $alertSuccess = '';

    public bool $modalRemoveAvatar = false;

    public function mount(): void
    {
        $profile = UserProfile::firstOrCreate(['user_id' => Auth::id()]);

        $this->nickname = $profile->nickname ?? '';
        $this->title    = $profile->title ?? '';
        $this->about    = $profile->about ?? '';
    }

    public function save(): void
    {
        $this->reset('alertSuccess');

        $validated = $this->validate([
            'nickname' => ['nullable', 'string', 'max:255'],
            'title'    => ['nullable', 'string', 'max:255'],
            'about'    => ['nullable', 'string', 'max:255'],
            'avatar'   => ['nullable', 'image', 'max:200'],
        ]);

        foreach (['nickname', 'title', 'about'] as $field) {
            $validated[$field] = $validated[$field] === '' ? null : $validated[$field];
        }

        $profile = UserProfile::firstOrCreate(['user_id' => Auth::id()]);

        if ($this->avatar) {
            $validated['avatar'] = $this->avatar->store('avatars', 'public');
        } else {
            unset($validated['avatar']);
        }

        $profile->update($validated);

        $this->alertSuccess = 'Profile updated.';
    }

    public function toggleModalRemoveAvatar(): void
    {
        $this->modalRemoveAvatar = ! $this->modalRemoveAvatar;
    }

    public function removeAvatar(): void
    {
        $this->reset('alertSuccess');

        $profile = UserProfile::firstOrCreate(['user_id' => Auth::id()]);

        if ($profile->avatar) {
            Storage::disk('public')->delete($profile->avatar);
            $profile->update(['avatar' => null]);
        }

        $this->reset('avatar');

        $this->modalRemoveAvatar = false;
        $this->alertSuccess = 'Avatar removed.';
    }

};
?>

<div>

    @if($alertSuccess)
        <div class="bg-green-50 border-b border-green-200 py-3">
            <div class="mx-auto max-w-7xl">
                <div class="px-4 sm:px-6 lg:px-8">
                    <p class="text-sm text-green-700">{{ $alertSuccess }}</p>
                </div>
            </div>
        </div>
    @endif

    <div class="bg-white py-6">
        <div class="mx-auto max-w-7xl">
            <div class="px-4 sm:px-6 lg:px-8">
                <form wire:submit="save">
                    <div class="max-w-xl space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Avatar</label>
                            <div class="flex items-center gap-4">
                                @if($avatar)
                                    <img src="{{ $avatar->temporaryUrl() }}" alt="Avatar" class="size-16 rounded-full object-cover ring-2 ring-gray-200" />
                                @elseif(auth()->user()->profile?->avatar)
                                    <img src="{{ asset('storage/' . auth()->user()->profile->avatar) }}" alt="Avatar" class="size-16 rounded-full object-cover ring-2 ring-gray-200" />
                                @else
                                    <img src="/img/avatars/default.png" alt="Avatar" class="size-16 rounded-full ring-2 ring-gray-200" />
                                @endif
                                <input type="file" wire:model="avatar" accept="image/*" class="text-sm text-gray-600 file:mr-3 file:rounded-md file:border-0 file:bg-indigo-50 file:px-3 file:py-1.5 file:text-sm file:font-semibold file:text-indigo-700 hover:file:bg-indigo-100" />
                                @if($avatar || auth()->user()->profile?->avatar)
                                    <button type="button" wire:click="toggleModalRemoveAvatar" class="text-sm font-semibold text-red-600 hover:text-red-500">
                                        Remove
                                    </button>
                                @endif
                            </div>
                            @error('avatar')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="nickname" class="block text-sm font-medium text-gray-700 mb-1">Nickname</label>
                            <input type="text" id="nickname" wire:model="nickname" placeholder="{{ auth()->user()->name }}" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                            @error('nickname')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                            <input type="text" id="title" wire:model="title" placeholder="e.g. Software Engineer" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="about" class="block text-sm font-medium text-gray-700 mb-1">About</label>
                            <textarea id="about" wire:model="about" rows="3" placeholder="A short bio..." class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
                            @error('about')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex items-center gap-3">
                            <button type="submit" wire:loading.attr="disabled" wire:loading.class="opacity-50" wire:target="save" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                <span wire:loading.remove wire:target="save">Update</span>
                                <span wire:loading wire:target="save">Loading...</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Remove Avatar -->
    @if($modalRemoveAvatar)
        <div class="relative z-10">
            <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>
            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 w-full sm:max-w-lg">
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                    <h3 class="text-base font-semibold text-gray-900" id="modal-title">
                                        Remove Avatar
                                    </h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">
                                            Are you sure you want to remove your avatar? This action cannot be undone.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="button" wire:click="removeAvatar" wire:loading.attr="disabled" wire:target="removeAvatar" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">
                                <span wire:loading.remove wire:target="removeAvatar">Remove</span>
                                <span wire:loading wire:target="removeAvatar">Loading...</span>
                            </button>
                            <button type="button" wire:click="toggleModalRemoveAvatar" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- END OF Modal Remove Avatar -->

</div>
