<?php

use Livewire\Component;

use Livewire\WithFileUploads;

new class extends Component
{

    use WithFileUploads;

    public $modalCreate = false;
    public $title = "";
    public $body = "";
    public $photos = [];
    public $public = true;

    public $modalDelete = false;

    public $alertInfo = "";
    public $alertSuccess = "";
    public $alertWarning = "";
    public $alertDanger = "";

    public function toggleModalCreate(){
        $this->modalCreate = !$this->modalCreate;
    }

    public function save()
    {
        $this->reset(['alertInfo', 'alertSuccess', 'alertWarning', 'alertDanger']);

        $this->body = trim($this->body);
        $this->body = preg_replace("/[\r\n]{3,}/", "\n\n", $this->body);

        $this->validate([
            'title' => 'required|string|max:255',
            'body' => 'nullable|string|max:255',
            'photos.*' => 'image|mimes:jpeg,jpg,png,webp|max:2048',
        ], [
            'title.required' => 'This field is required.',
            'title.max' => 'Max 255 characters.',
            'body.max' => 'Max 255 characters.',
            'photos.*.image' => 'Invalid file type.',
            'photos.*.mimes' => 'Invalid MIME type. Accepted: jpeg, jpg, png, webp.',
            'photos.*.max' => 'One or more images exceeds 1MB.',
        ]);

        // save

        $this->reset(['title', 'body', 'photos', 'public']);
        $this->alertSuccess = "Post created.";
        $this->toggleModalCreate();
    }

    public function toggleModalDelete(){
        $this->modalDelete = !$this->modalDelete;
    }

    public function delete()
    {
        $this->reset(['alertInfo', 'alertSuccess', 'alertWarning', 'alertDanger']);

        $this->alertInfo = "Post deleted.";

        $this->toggleModalDelete();
    }

};
?>

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
                <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>
                <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                    <div class="flex min-h-full items-end sm:items-center justify-center p-4 sm:p-0">
                        <div class="relative transform overflow-hidden rounded-lg bg-white shadow-xl transition-all sm:my-8 w-full max-w-lg">
                            <div class="bg-white py-5 sm:py-6 px-4 sm:px-6">
                                <div class="sm:flex sm:items-start">
                                    <div class="w-full">
                                        <div class="mb-2">
                                            <h3 class="font-semibold text-gray-900">
                                                New Post
                                            </h3>
                                        </div>
                                        <div class="space-y-4">
                                            <div>
                                                <label class="block text-sm/6 font-medium text-gray-600 mb-1">
                                                    Title
                                                </label>
                                                <input type="text" wire:model="title" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                                                @error('title')
                                                    <p class="text-red-500 text-sm font-medium mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div>
                                                <label class="block text-sm/6 font-medium text-gray-600 mb-1">
                                                    Body
                                                </label>
                                                <textarea wire:model="body" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
                                                @error('body')
                                                    <p class="text-red-500 text-sm font-medium mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="flex gap-3">
                                                <div class="flex h-6 shrink-0 items-center">
                                                    <div class="group grid size-4 grid-cols-1">
                                                        <input id="comments" type="checkbox" name="comments" checked aria-describedby="comments-description" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                                                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25">
                                                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                                                            <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="text-sm/6">
                                                    <label for="comments" class="font-medium text-gray-900">Comments</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex space-x-3 pt-4">
                                    <button type="submit" wire:target="save" wire:loading.attr="disabled" wire:loading.class="opacity-50" class="inline-flex w-full sm:w-auto justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
                                        <span wire:loading.remove wire:target="save">Save</span>
                                        <span wire:loading wire:target="save">Loading...</span>
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
