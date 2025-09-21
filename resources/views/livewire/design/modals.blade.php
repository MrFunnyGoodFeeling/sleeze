<div>

    <!-- Alert -->
    @if($alertInfo)
        <div class="bg-blue-50 border-b border-blue-200 py-3">
            <div class="mx-auto max-w-7xl">
                <div class="px-4 sm:px-6 lg:px-8">
                    <p class="text-sm text-blue-700">
                        {{ $alertInfo }}
                    </p>
                </div>
            </div>
        </div>
    @endif
    @if($alertSuccess)
        <div class="bg-green-50 border-b border-green-200 py-3">
            <div class="mx-auto max-w-7xl">
                <div class="px-4 sm:px-6 lg:px-8">
                    <p class="text-sm text-green-700">
                        {{ $alertSuccess }}
                    </p>
                </div>
            </div>
        </div>
    @endif
    @if($alertWarning)
        <div class="bg-yellow-50 border-b border-yellow-200 py-3">
            <div class="mx-auto max-w-7xl">
                <div class="px-4 sm:px-6 lg:px-8">
                    <p class="text-sm text-yellow-700">
                        {{ $alertWarning }}
                    </p>
                </div>
            </div>
        </div>
    @endif
    @if($alertDanger)
        <div class="bg-red-50 border-b border-red-200 py-3">
            <div class="mx-auto max-w-7xl">
                <div class="px-4 sm:px-6 lg:px-8">
                    <p class="text-sm text-red-700">
                        {{ $alertDanger }}
                    </p>
                </div>
            </div>
        </div>
    @endif
    <!-- END OF Alert -->

    <!-- Main -->
    <div class="bg-white py-8">
        <div class="mx-auto max-w-7xl">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="flex space-x-3">
                    <button type="button" wire:click="toggleModalCreate" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-50 focus:outline-none focus:ring focus:ring-blue-200 transition">
                        new post
                    </button>
                    <button type="button" wire:click="toggleModalDelete" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-50 focus:outline-none focus:ring focus:ring-blue-200 transition">
                        delete post
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF Main -->

    <!-- Modal Create -->
    @if($modalCreate)
        <div class="relative z-10">
            <form wire:submit="save">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                    <div class="flex min-h-full items-end sm:items-center justify-center p-4 sm:p-0">
                        <div class="relative transform overflow-hidden rounded-lg bg-white shadow-xl transition-all sm:my-8 w-full max-w-lg">
                            <div class="bg-white py-5 sm:py-6 px-4 sm:px-6">
                                <div class="sm:flex sm:items-start">
                                    <div class="w-full">
                                        <h3 class="font-semibold text-gray-900">
                                            New Post
                                        </h3>
                                        <div class="space-y-4 mt-2">
                                            <div>
                                                <label class="block text-sm text-gray-600 font-medium mb-1">
                                                    Title
                                                </label>
                                                <input type="text" wire:model="title" class="block w-full text-sm border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                                @error('title')
                                                    <p class="text-red-500 text-sm font-medium mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div>
                                                <label class="block text-sm text-gray-600 font-medium mb-1">
                                                    Body
                                                </label>
                                                <textarea wire:model="body" class="block w-full text-sm border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                                                @error('body')
                                                    <p class="text-red-500 text-sm font-medium mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div>
                                                <label class="block text-sm text-gray-600 font-medium mb-1">
                                                    Photos
                                                </label>
                                                <input type="file" wire:model="photos" multiple>
                                                @error('photos.*')
                                                    <p class="text-red-500 text-sm font-medium mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="space-y-2">
                                                <div class="relative flex gap-x-3">
                                                    <div class="flex h-6 items-center">
                                                        <input id="public" type="checkbox" wire:model="public" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                    </div>
                                                    <div>
                                                        <label for="public" class="block text-sm font-medium leading-6">
                                                            Public
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex space-x-3 pt-4">
                                    <button type="submit" wire:target="photos" wire:loading.attr="disabled" wire:loading.class="opacity-50" class="inline-flex w-full sm:w-auto justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
                                        <span wire:loading.remove wire:target="photos">Save</span>
                                        <span wire:loading wire:target="photos">Loading...</span>
                                    </button>
                                    <button type="button" wire:click="toggleModalCreate" class="inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endif
    <!-- END OF Modal Create -->

    <!-- Modal Delete -->
    @if($modalDelete)
        <div class="relative z-10">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
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
                                        Delete Post
                                    </h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">
                                            Confirm this action.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="button" wire:click="delete" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">
                                Delete
                            </button>
                            <button type="button" wire:click="toggleModalDelete" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- END OF Modal Delete -->

</div>