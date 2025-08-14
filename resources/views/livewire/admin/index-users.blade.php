<div class="bg-white py-4">
    <div class="mx-auto max-w-7xl">
        <div class="sm:px-6 lg:px-8">
            <div class="overflow-hidden border-t border-b sm:border-r sm:border-l border-gray-200 sm:rounded-md shadow-sm">
                <table class="w-full divide-y divide-gray-200 relative">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100" wire:click="sortBy('name')">
                                <div class="flex items-center space-x-1">
                                    <span>Name</span>
                                    @if($sortField === 'name')
                                        @if($sortDirection === 'asc')
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        @endif
                                    @endif
                                </div>
                            </th>
                            <th scope="col" class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100" wire:click="sortBy('email')">
                                <div class="flex items-center space-x-1">
                                    <span>E-mail</span>
                                    @if($sortField === 'email')
                                        @if($sortDirection === 'asc')
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        @endif
                                    @endif
                                </div>
                            </th>
                            <th scope="col" class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100" wire:click="sortBy('created_at')">
                                <div class="flex items-center space-x-1">
                                    <span>Reg. Date</span>
                                    @if($sortField === 'created_at')
                                        @if($sortDirection === 'asc')
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        @endif
                                    @endif
                                </div>
                            </th>
                            <th scope="col" class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($users as $user)
                            <tr class="hover:bg-gray-50">
                                <td class="py-4 px-6">
                                    <div class="flex items-center space-x-2">
                                        <p class="text-gray-700 text-sm font-medium">
                                            <a href="#" class="hover:text-indigo-500">
                                                {{ $user->name }}
                                            </a>
                                        </p>
                                        @if($user->isAdmin())
                                            <span class="inline-flex items-center rounded-full bg-indigo-50 px-2 py-1 text-xs font-medium text-indigo-700 ring-1 ring-inset ring-indigo-600/20">
                                                Admin
                                            </span>
                                        @elseif($user->isMember())
                                            <span class="inline-flex items-center rounded-full bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">
                                                Member
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <p class="text-gray-700 text-sm">
                                            {{ $user->email }}
                                        </p>
                                        @if($user->email_verified_at)
                                            <svg class="ml-2 w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        @endif
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <p class="text-gray-700 text-sm">
                                        {{ $user->created_at->format('F j, Y') }}
                                    </p>
                                </td>
                                <td class="py-4 px-6">
                                    @if($user->isAdmin())
                                        <!-- Empty cell for admin users -->
                                    @else
                                        <div class="relative inline-block text-left" x-data="{ open: false }">
                                            <div>
                                                <button type="button" 
                                                        @click="open = !open"
                                                        class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" 
                                                        id="menu-button-{{ $user->id }}" 
                                                        aria-expanded="true" 
                                                        aria-haspopup="true">
                                                    @if($user->isMember())
                                                        <span class="text-gray-600 font-medium">Member</span>
                                                    @else
                                                        <span class="text-gray-600 font-medium">Guest</span>
                                                    @endif
                                                    <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <div x-show="open" 
                                                 @click.away="open = false"
                                                 x-transition:enter="transition ease-out duration-100"
                                                 x-transition:enter-start="transform opacity-0 scale-95"
                                                 x-transition:enter-end="transform opacity-100 scale-100"
                                                 x-transition:leave="transition ease-in duration-75"
                                                 x-transition:leave-start="transform opacity-100 scale-100"
                                                 x-transition:leave-end="transform opacity-0 scale-95"
                                                 class="absolute right-0 z-50 mt-2 w-32 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" 
                                                 role="menu" 
                                                 aria-orientation="vertical" 
                                                 aria-labelledby="menu-button-{{ $user->id }}" 
                                                 tabindex="-1"
                                                 style="display: none;">
                                                <div class="py-1" role="none">
                                                    <button wire:click="updateUserRole({{ $user->id }}, 'guest')" 
                                                            @click="open = false"
                                                            class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 {{ !$user->roles->count() ? 'bg-gray-50 font-medium' : '' }}" 
                                                            role="menuitem" 
                                                            tabindex="-1">
                                                        Guest
                                                    </button>
                                                    <button wire:click="updateUserRole({{ $user->id }}, 'member')" 
                                                            @click="open = false"
                                                            class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 {{ $user->isMember() && !$user->isAdmin() ? 'bg-gray-50 font-medium' : '' }}" 
                                                            role="menuitem" 
                                                            tabindex="-1">
                                                        Member
                                                    </button>
                                                    <button wire:click="updateUserRole({{ $user->id }}, 'admin')" 
                                                            @click="open = false"
                                                            class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" 
                                                            role="menuitem" 
                                                            tabindex="-1">
                                                        Admin
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-8 px-6 text-center">
                                    <div class="text-gray-500">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No users found</h3>
                                        <p class="mt-1 text-sm text-gray-500">
                                            Get started by creating your first user.
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="mt-4 flex items-center justify-end text-sm text-gray-500">
                <div class="flex items-center space-x-2">
                    <label for="perPage" class="text-sm">Per page:</label>
                    <select wire:model.live="perPage" id="perPage" class="border-gray-300 rounded-md text-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
