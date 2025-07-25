<!-- Form Template -->
<div class="bg-white py-8">
    <div class="mx-auto max-w-7xl">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl">
                <form wire:submit="save">
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm text-gray-600 font-medium mb-1">
                                Name
                            </label>
                            <input type="text" wire:model="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 disabled:bg-gray-50 disabled:text-gray-500">
                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 font-medium mb-1">
                                About
                            </label>
                            <textarea wire:model="about" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 disabled:bg-gray-50 disabled:text-gray-500"></textarea>
                            @error('about')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                            <p class="mt-1 text-sm text-gray-500">
                                Write a few sentences about yourself.
                            </p>
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 font-medium mb-1">
                                Photos
                            </label>
                            <input type="file" wire:model="photos" multiple>
                            @error('photos')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 font-medium mb-1">
                                Country
                            </label>
                            <select wire:model="country" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                <option value="usa">United States</option>
                                <option value="canada">Canada</option>
                                <option value="mexico">Mexico</option>
                            </select>
                        </div>
                        <div class="space-y-2">
                            <div class="relative flex gap-x-3">
                                <div class="flex h-6 items-center">
                                    <input id="candidates" type="checkbox" wire:model="candidates" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                </div>
                                <div>
                                    <label for="candidates" class="block text-sm font-medium leading-6">
                                        Candidates
                                    </label>
                                </div>
                            </div>
                            <div class="relative flex gap-x-3">
                                <div class="flex h-6 items-center">
                                    <input id="offers" type="checkbox" wire:model="offers" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                </div>
                                <div>
                                    <label for="offers" class="block text-sm font-medium leading-6">
                                        Offers
                                    </label>
                                </div>
                            </div>
                            <div class="relative flex gap-x-3">
                                <div class="flex h-6 items-center">
                                    <input id="comments" type="checkbox" wire:model="comments" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                </div>
                                <div>
                                    <label for="comments" class="block text-sm font-medium leading-6">
                                        Comments
                                    </label>
                                    <p class="text-sm text-gray-500">
                                        Get notified when someones posts a comment on a posting.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="space-y-2">
                                <div class="flex items-center gap-x-3">
                                    <input type="radio" id="banana" wire:model="fruit" value="banana" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    <label for="banana" class="block text-sm font-medium leading-6">
                                        Banana
                                    </label>
                                </div>
                                <div class="flex items-center gap-x-3">
                                    <input type="radio" id="pineapple" wire:model="fruit" value="pineapple" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    <label for="pineapple" class="block text-sm font-medium leading-6">
                                        Pineapple
                                    </label>
                                </div>
                                <div class="flex items-center gap-x-3">
                                    <input type="radio" id="avocado" wire:model="fruit" value="avocado" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    <label for="avocado" class="block text-sm font-medium leading-6">
                                        Avocado
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="flex space-x-4">
                            <button type="submit" wire:target="photos" wire:loading.attr="disabled" wire:loading.class="opacity-50" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 transition">
                                <span wire:loading.remove wire:target="photos">save</span>
                                <span wire:loading wire:target="photos">loading...</span>
                            </button>
                            <button type="button" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-50 focus:outline-none focus:ring focus:ring-blue-200 transition">
                                cancel
                            </button>
                            <button type="button" class="inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring focus:ring-red-300 transition">
                                delete
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
