<?php

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

new class extends Component
{
    public string $name = '';
    public string $email = '';

    public string $currentPassword = '';
    public string $newPassword = '';
    public string $newPasswordConfirmation = '';

    public string $alertAccountSuccess = '';
    public string $alertAccountDanger = '';
    public string $alertPasswordSuccess = '';
    public string $alertPasswordDanger = '';

    public function mount(): void
    {
        $this->name  = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    public function updateAccount(): void
    {
        $this->reset(['alertAccountSuccess', 'alertAccountDanger']);

        $validated = $this->validate([
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore(Auth::id())],
        ]);

        Auth::user()->update($validated);

        $this->alertAccountSuccess = 'Account updated.';
    }

    public function updatePassword(): void
    {
        $this->reset(['alertPasswordSuccess', 'alertPasswordDanger']);

        $this->validate([
            'currentPassword'         => ['required', 'current_password'],
            'newPassword'             => ['required', 'confirmed', Password::min(8)],
            'newPasswordConfirmation' => ['required'],
        ], [
            'currentPassword.current_password' => 'Current password is incorrect.',
        ]);

        Auth::user()->update(['password' => $this->newPassword]);

        $this->reset(['currentPassword', 'newPassword', 'newPasswordConfirmation']);

        $this->alertPasswordSuccess = 'Password updated.';
    }
};
?>

<div class="divide-y divide-gray-200">

    <!-- Account -->
    @if($alertAccountSuccess)
        <div class="bg-green-50 border-b border-green-200 py-3">
            <div class="mx-auto max-w-7xl">
                <div class="px-4 sm:px-6 lg:px-8">
                    <p class="text-sm text-green-700">{{ $alertAccountSuccess }}</p>
                </div>
            </div>
        </div>
    @endif
    @if($alertAccountDanger)
        <div class="bg-red-50 border-b border-red-200 py-3">
            <div class="mx-auto max-w-7xl">
                <div class="px-4 sm:px-6 lg:px-8">
                    <p class="text-sm text-red-700">{{ $alertAccountDanger }}</p>
                </div>
            </div>
        </div>
    @endif
    <div class="bg-white py-6">
        <div class="mx-auto max-w-7xl">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="max-w-xl">
                    <h2 class="text-base font-semibold text-gray-900">Account</h2>
                    <p class="mt-1 text-sm text-gray-500">Update your name and email address.</p>

                    <form wire:submit="updateAccount" class="mt-6 space-y-5">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                            <input type="text" id="name" wire:model="name" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="email" wire:model="email" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" wire:loading.attr="disabled" wire:loading.class="opacity-50" wire:target="updateAccount" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                <span wire:loading.remove wire:target="updateAccount">Save</span>
                                <span wire:loading wire:target="updateAccount">Loading...</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF Account -->

    <!-- Password -->
    @if($alertPasswordSuccess)
        <div class="bg-green-50 border-b border-green-200 py-3">
            <div class="mx-auto max-w-7xl">
                <div class="px-4 sm:px-6 lg:px-8">
                    <p class="text-sm text-green-700">{{ $alertPasswordSuccess }}</p>
                </div>
            </div>
        </div>
    @endif
    @if($alertPasswordDanger)
        <div class="bg-red-50 border-b border-red-200 py-3">
            <div class="mx-auto max-w-7xl">
                <div class="px-4 sm:px-6 lg:px-8">
                    <p class="text-sm text-red-700">{{ $alertPasswordDanger }}</p>
                </div>
            </div>
        </div>
    @endif
    <div class="bg-white py-8">
        <div class="mx-auto max-w-7xl">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="max-w-xl">
                    <h2 class="text-base font-semibold text-gray-900">Password</h2>
                    <p class="mt-1 text-sm text-gray-500">Update your password.</p>

                    <form wire:submit="updatePassword" class="mt-6 space-y-5">
                        <div>
                            <label for="currentPassword" class="block text-sm font-medium text-gray-700 mb-1">Current password</label>
                            <input type="password" id="currentPassword" wire:model="currentPassword" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                            @error('currentPassword')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="newPassword" class="block text-sm font-medium text-gray-700 mb-1">New password</label>
                            <input type="password" id="newPassword" wire:model="newPassword" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                            @error('newPassword')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="newPasswordConfirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm new password</label>
                            <input type="password" id="newPasswordConfirmation" wire:model="newPasswordConfirmation" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                            @error('newPasswordConfirmation')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" wire:loading.attr="disabled" wire:loading.class="opacity-50" wire:target="updatePassword" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                <span wire:loading.remove wire:target="updatePassword">Update password</span>
                                <span wire:loading wire:target="updatePassword">Loading...</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF Password -->

</div>
