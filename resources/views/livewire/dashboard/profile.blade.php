<div>

    <!-- Alerts -->
    @if(!empty($alertInfo))
        <div class="bg-blue-50 border-b border-blue-100 py-3">
            <div class="mx-auto max-w-7xl">
                <div class="px-4 sm:px-6 lg:px-8">
                    <p class="text-sm text-blue-700">
                        {{ $alertInfo }}
                    </p>
                </div>
            </div>
        </div>
    @endif
    @if(!empty($alertSuccess))
        <div class="bg-green-50 border-b border-green-100 py-3">
            <div class="mx-auto max-w-7xl">
                <div class="px-4 sm:px-6 lg:px-8">
                    <p class="text-sm text-green-700">
                        {{ $alertSuccess }}
                    </p>
                </div>
            </div>
        </div>
    @endif
    @if(!empty($alertWarning))
        <div class="bg-yellow-50 border-b border-yellow-100 py-3">
            <div class="mx-auto max-w-7xl">
                <div class="px-4 sm:px-6 lg:px-8">
                    <p class="text-sm text-yellow-700">
                        {{ $alertWarning }}
                    </p>
                </div>
            </div>
        </div>
    @endif
    @if(!empty($alertDanger))
        <div class="bg-red-50 border-b border-red-100 py-3">
            <div class="mx-auto max-w-7xl">
                <div class="px-4 sm:px-6 lg:px-8">
                    <p class="text-sm text-red-700">
                        {{ $alertDanger }}
                    </p>
                </div>
            </div>
        </div>
    @endif
    <!-- END OF Alerts -->

    <!-- Main -->
    <div class="bg-white py-10">
        <div class="mx-auto max-w-7xl">
            <div class="px-4 sm:px-6 lg:px-8">
                <form wire:submit="update">
                    <div class="border-b border-gray-900/10 pb-12">
                        <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-4">
                                <label class="block text-sm/6 font-medium text-gray-900">
                                    Nickname
                                </label>
                                <div class="mt-2">
                                    <input type="text" wire:model="newNickname" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 disabled:bg-gray-50 disabled:text-gray-500">
                                    @error('newNickname')
                                        <p class="mt-1 text-sm text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-4">
                                <label class="block text-sm/6 font-medium text-gray-900">
                                    Title
                                </label>
                                <div class="mt-2">
                                    <input type="text" wire:model="newTitle" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 disabled:bg-gray-50 disabled:text-gray-500">
                                    @error('newTitle')
                                        <p class="mt-1 text-sm text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-4">
                                <label class="block text-sm/6 font-medium text-gray-900">
                                    About
                                </label>
                                <div class="mt-2">
                                    <textarea wire:model="newAbout" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 disabled:bg-gray-50 disabled:text-gray-500"></textarea>
                                    @error('newAbout')
                                        <p class="mt-1 text-sm text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-4">
                                <label class="block text-sm/6 font-medium text-gray-900">
                                    Avatar
                                </label>
                                <div class="mt-2">
                                    @if(!empty($this->avatar))
                                        <img src="{{ Storage::url($this->avatar) }}" class="h-14 w-14 rounded-full">
                                    @else
                                        <img src="/img/avatars/default.png" class="h-14 w-14 rounded-full">
                                    @endif
                                </div>
                                <div class="mt-2">
                                    <input type="file" wire:model="newAvatar">
                                    @error('newAvatar')
                                        <p class="mt-1 text-sm text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center gap-x-6">
                        <button type="submit" wire:loading.attr="disabled" wire:loading.class="opacity-50" wire:target="newAvatar" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            <span wire:loading.remove wire:target="newAvatar">Save</span>
                            <span wire:loading wire:target="newAvatar">Loading...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END OF Main -->

</div>
