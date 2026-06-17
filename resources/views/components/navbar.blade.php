<div>
    @auth
        <nav class="bg-gray-800" x-data="{ mobileMenuOpen: false, profileOpen: false }">
            <div class="mx-auto max-w-7xl">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="flex h-16 items-center justify-between">
                        <div class="flex items-center">
                            <div class="shrink-0">
                                <a href="{{ route('dashboard') }}">
                                    <img src="/img/logos/workflow/indigo-400.svg" alt="Your Company" class="size-8" />
                                </a>
                            </div>
                            <div class="hidden md:block">
                                <div class="ml-10 flex items-baseline space-x-4">
                                    <a href="{{ route('dashboard') }}" @class(['rounded-md px-3 py-2 text-sm font-medium', 'bg-gray-900 text-white' => $page === 'dashboard', 'text-gray-300 hover:bg-white/5 hover:text-white' => $page !== 'dashboard'])>Dashboard</a>
                                </div>
                            </div>
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-4 flex items-center md:ml-6">
                                <button type="button" class="relative rounded-full p-1 text-gray-400 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">View notifications</span>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true" class="size-6">
                                        <path d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>

                                <!-- Profile dropdown -->
                                <div class="relative ml-3">
                                    <button @click="profileOpen = !profileOpen" @click.outside="profileOpen = false" type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none ring-2 ring-gray-400 focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                                        <span class="absolute -inset-1.5"></span>
                                        <span class="sr-only">Open user menu</span>
                                        @if(auth()->user()->profile?->avatar)
                                            <img src="{{ asset('storage/' . auth()->user()->profile->avatar) }}" alt="" class="size-8 rounded-full object-cover outline -outline-offset-1 outline-white/10" />
                                        @else
                                            <img src="/img/avatars/default.png" alt="" class="size-8 rounded-full outline -outline-offset-1 outline-white/10" />
                                        @endif
                                    </button>
                                    <div x-show="profileOpen"
                                        x-transition:enter="transition ease-out duration-100"
                                        x-transition:enter-start="opacity-0 scale-95"
                                        x-transition:enter-end="opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-75"
                                        x-transition:leave-start="opacity-100 scale-100"
                                        x-transition:leave-end="opacity-0 scale-95"
                                        class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5" style="display:none">
                                        <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                        <a href="{{ route('settings') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                                        @if(auth()->user()->isAdmin())
                                            <a href="{{ route('admin') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Admin</a>
                                        @endif
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100">Sign out</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="-mr-2 flex md:hidden">
                            <!-- Mobile menu button -->
                            <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
                                <span class="absolute -inset-0.5"></span>
                                <span class="sr-only">Open main menu</span>
                                <svg x-show="!mobileMenuOpen" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true" class="size-6">
                                    <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <svg x-show="mobileMenuOpen" x-cloak viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true" class="size-6">
                                    <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Mobile menu -->
                <div x-show="mobileMenuOpen" x-cloak class="md:hidden">
                    <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                        <a href="{{ route('dashboard') }}" @class(['block rounded-md px-3 py-2 text-base font-medium', 'bg-gray-900 text-white' => $page === 'dashboard', 'text-gray-300 hover:bg-white/5 hover:text-white' => $page !== 'dashboard'])>Dashboard</a>
                    </div>
                    <div class="border-t border-white/10 pt-4 pb-3">
                        <div class="flex items-center px-5">
                            <div class="shrink-0">
                                @if(auth()->user()->profile?->avatar)
                                    <img src="{{ asset('storage/' . auth()->user()->profile->avatar) }}" alt="Avatar" class="size-10 rounded-full object-cover outline -outline-offset-1 outline-white/10" />
                                @else
                                    <img src="/img/avatars/default.png" alt="Avatar" class="size-10 rounded-full outline -outline-offset-1 outline-white/10" />
                                @endif
                            </div>
                            <div class="ml-3">
                                <div class="text-base/5 font-medium text-white">{{ auth()->user()->name }}</div>
                            </div>
                            <button type="button" class="relative ml-auto shrink-0 rounded-full p-1 text-gray-400 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">View notifications</span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true" class="size-6">
                                    <path d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                        <div class="mt-3 space-y-1 px-2">
                            <a href="{{ route('profile') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Profile</a>
                            <a href="{{ route('settings') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Settings</a>
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('admin') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Admin</a>
                            @endif
                            <form method="post" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full rounded-md px-3 py-2 text-left text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Sign out</button>
                            </form>
                        </div>
                    </div>
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
                    <a href="#" class="text-sm/6 font-semibold text-gray-900 hover:text-indigo-500">Product</a>
                    <a href="#" class="text-sm/6 font-semibold text-gray-900 hover:text-indigo-500">Features</a>
                    <a href="#" class="text-sm/6 font-semibold text-gray-900 hover:text-indigo-500">Marketplace</a>
                    <a href="#" class="text-sm/6 font-semibold text-gray-900 hover:text-indigo-500">Company</a>
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
