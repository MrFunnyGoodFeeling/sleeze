<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12 space-y-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-50 border border-blue-200 sm:rounded-lg p-4">
                <h3 class="text-blue-600 font-semibold">
                    Livewire Flux Error
                </h3>
                <div class="space-y-1">
                    <p class="text-blue-600">
                        Livewire Flux is a premium component library and won't work unless you pay for it. The part of Livewire Flux that comes free with the official Laravel starter kit will try to reference components that aren't in the free tier and that will cause errors.
                    </p>
                    <p class="text-blue-600">
                        The solution is Breeze on Laravel 12x.
                    </p>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-50 border border-blue-200 sm:rounded-lg p-4">
                <h3 class="text-blue-600 font-semibold">
                    A note on Claudia
                </h3>
                <div class="space-y-1">
                    <p class="text-blue-600">
                        Claudia's editor sometimes doesn't update, it's not her fault.
                    </p>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-50 border border-blue-200 sm:rounded-lg p-4">
                <h3 class="text-blue-600 font-semibold">
                    A note on Livewire
                </h3>
                <div class="space-y-1">
                    <p class="text-blue-600">
                        This following is not needed anymore, it's being handled by Vite (I'm not exactly applauding but whatever)
                    </p>
                    <div>
                        <img src="/img/sleeze/livewire.jpg">
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-50 border border-blue-200 sm:rounded-lg p-4">
                <h3 class="text-blue-600 font-semibold">
                    Admin panels
                </h3>
                <div class="space-y-1">
                    <p class="text-blue-600">
                        I agree with those who say admin panels are generally unecessary but I think I've had a use for them in the majority of my projects.
                    </p>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
