<?php

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProfile;

new class extends Component
{
    use WithFileUploads;

    public string $nickname = '';
    public string $title = '';
    public string $about = '';
    public $avatar = null;

    public string $alertSuccess = '';
    public string $alertDanger = '';

    public function mount(): void
    {
        $profile = UserProfile::firstOrCreate(['user_id' => Auth::id()]);

        $this->nickname = $profile->nickname ?? '';
        $this->title    = $profile->title ?? '';
        $this->about    = $profile->about ?? '';
    }

    public function save(): void
    {
        $this->reset(['alertSuccess', 'alertDanger']);

        $validated = $this->validate([
            'nickname' => ['nullable', 'string', 'max:255'],
            'title'    => ['nullable', 'string', 'max:255'],
            'about'    => ['nullable', 'string', 'max:255'],
            'avatar'   => ['nullable', 'image', 'max:2048'],
        ]);

        $profile = UserProfile::firstOrCreate(['user_id' => Auth::id()]);

        if ($this->avatar) {
            $validated['avatar'] = $this->avatar->store('avatars', 'public');
        } else {
            unset($validated['avatar']);
        }

        $profile->update($validated);

        $this->alertSuccess = 'Profile updated.';
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
    @if($alertDanger)
        <div class="bg-red-50 border-b border-red-200 py-3">
            <div class="mx-auto max-w-7xl">
                <div class="px-4 sm:px-6 lg:px-8">
                    <p class="text-sm text-red-700">{{ $alertDanger }}</p>
                </div>
            </div>
        </div>
    @endif

    <div class="bg-white py-8">
        <div class="mx-auto max-w-7xl">
            <div class="px-4 sm:px-6 lg:px-8">
                <form wire:submit="save" class="max-w-xl space-y-6">

                    <!-- Avatar -->
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
                        </div>
                        @error('avatar')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nickname -->
                    <div>
                        <label for="nickname" class="block text-sm font-medium text-gray-700 mb-1">Nickname</label>
                        <input type="text" id="nickname" wire:model="nickname" placeholder="{{ auth()->user()->name }}" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                        @error('nickname')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                        <input type="text" id="title" wire:model="title" placeholder="e.g. Software Engineer" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- About -->
                    <div>
                        <label for="about" class="block text-sm font-medium text-gray-700 mb-1">About</label>
                        <textarea id="about" wire:model="about" rows="3" placeholder="A short bio..." class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
                        @error('about')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center gap-3">
                        <button type="submit" wire:loading.attr="disabled" wire:loading.class="opacity-50" wire:target="save" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            <span wire:loading.remove wire:target="save">Update</span>
                            <span wire:loading wire:target="save">Loading...</span>
                        </button>
                        <a href="{{ route('profile') }}" class="text-sm font-semibold text-gray-700 hover:text-gray-900">Cancel</a>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>
