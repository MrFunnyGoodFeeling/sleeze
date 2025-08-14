<div>
    @auth
        <nav x-data="{ menu: false }" class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div class="relative flex h-16 items-center justify-between">
                    <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                        <button type="button" @click="menu = !menu" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                            <span class="absolute -inset-0.5"></span>
                            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                        <div class="flex flex-shrink-0 items-center">
                            <a href="{{ route('dashboard') }}">
                                <img src="/img/logos/workflow/indigo-400.svg" alt="Logo" class="h-8 w-auto">
                            </a>
                        </div>
                        <div class="hidden sm:ml-6 sm:block">
                            <div class="flex space-x-4">
                                @if(isset($page) && $page == "dashboard")
                                    <a href="{{ route('dashboard') }}" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white">
                                        Home
                                    </a>
                                @else
                                    <a href="{{ route('dashboard') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">
                                        Home
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                        <div x-data="{ open: false }" class="relative ml-3">
                            <div>
                                <button type="button" @click="open = !open" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                                    <span class="absolute -inset-1.5"></span>
                                    @if(Auth::user()->profile && Auth::user()->profile->avatar)
                                        <img src="{{ Storage::url(Auth::user()->profile->avatar) }}" class="h-8 w-8 rounded-full" alt="Avatar">
                                    @else
                                        <img src="/img/avatars/default.png" class="h-8 w-8 rounded-full" alt="Avatar">
                                    @endif
                                </button>
                            </div>
                            <div x-show="open" @click.away="open = false" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" style="display:none">
                                @if(Auth::user()->isMember())
                                    <a href="{{ route('profile') }}" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">
                                        Profile
                                    </a>
                                    <a href="{{ route('settings') }}" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">
                                        Settings
                                    </a>
                                @endif
                                @if(Auth::user()->isAdmin())
                                    <a href="{{ route('admin') }}" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">
                                        Admin
                                    </a>
                                @endif
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="block w-full py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 text-left">
                                        Sign out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div x-show="menu" class="sm:hidden" style="display:none">
                <div class="space-y-1 px-2 pb-3 pt-2">
                    @if(isset($page) && $page == "dashboard")
                        <a href="{{ route('dashboard') }}" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white">
                            Home
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">
                            Home
                        </a>
                    @endif
                </div>
            </div>
        </nav>
    @else
        <header x-data="{ open: false }" class="z-50 bg-white border-b border-gray-300">
            <nav class="flex items-center justify-between mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
                <div class="flex lg:flex-1">
                    <a href="{{ route('landing') }}" class="-m-1.5 p-1.5">
                        <img class="h-8 w-auto" src="/img/logos/workflow/indigo-600.svg" alt="Logo">
                    </a>
                </div>
                <div class="flex lg:hidden">
                    <button type="button" @click="open = !open" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
                <div class="hidden lg:flex lg:gap-x-12">
                    <a href="#" class="text-sm/6 font-semibold text-gray-900 hover:underline">Product</a>
                    <a href="#" class="text-sm/6 font-semibold text-gray-900 hover:underline">Features</a>
                    <a href="#" class="text-sm/6 font-semibold text-gray-900 hover:underline">Marketplace</a>
                    <a href="#" class="text-sm/6 font-semibold text-gray-900 hover:underline">Company</a>
                </div>
                <div class="hidden lg:flex lg:space-x-8 lg:flex-1 lg:justify-end">
                    <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-gray-900 hover:text-indigo-500">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="text-sm font-semibold leading-6 text-gray-900 hover:text-indigo-500">
                        Register
                    </a>
                </div>
            </nav>
            <div x-show="open" class="lg:hidden" role="dialog" aria-modal="true" style="display:none">
                <div class="fixed inset-0 z-50"></div>
                <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                    <div class="flex items-center justify-between">
                        <a href="/" class="-m-1.5 p-1.5">
                            <img src="/img/logos/workflow/indigo-500.svg" class="h-8 w-auto" alt="Logo">
                        </a>
                        <button type="button" @click="open = !open" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                            <span class="sr-only">Close menu</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-6 flow-root">
                        <div class="-my-6 divide-y divide-gray-500/10">
                            <div class="py-6">
                                <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Product</a>
                                <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Features</a>
                                <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Marketplace</a>
                                <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Company</a>
                                <div class="border-t border-gray-200 my-1">
                                    <!-- Touch Nothing -->
                                </div>
                                <a href="{{ route('login') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">
                                    Login
                                </a>
                                <a href="{{ route('register') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">
                                    Register
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    @endauth
</div>
