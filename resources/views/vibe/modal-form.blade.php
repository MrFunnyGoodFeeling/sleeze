<!-- Modal Form Template -->
@if($modal)
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
                                        Create post
                                    </h3>
                                    <div class="space-y-4 mt-2">
                                        <div>
                                            <label class="block text-sm text-gray-600 font-medium mb-1">
                                                Title
                                            </label>
                                            <input id="name" type="text" wire:model="title" class="block w-full text-sm border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                        <div>
                                            <label class="block text-sm text-gray-600 font-medium mb-1">
                                                Body
                                            </label>
                                            <textarea id="about" wire:model="body" class="block w-full text-sm border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                                        </div>
                                        <div>
                                            <label class="block text-sm text-gray-600 font-medium mb-1">
                                                Photo
                                            </label>
                                            <input type="file" wire:model="photo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex space-x-3 pt-4">
                                <button type="submit" wire:target="photo" wire:loading.attr="disabled" wire:loading.class="opacity-50" class="inline-flex w-full sm:w-auto justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
                                    <span wire:loading.remove wire:target="photo">Save</span>
                                    <span wire:loading wire:target="photo">Loading...</span>
                                </button>
                                <button type="button" class="inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
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
