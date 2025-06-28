@php
// Navigation Configuration Array
$navigationConfig = [
    'main' => [
        [
            'title' => 'Dashboard',
            'href' => route('user.dashboard'),
            'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6',
            'badge' => null,
            'active' => request()->routeIs('user.dashboard'),
            'dropdown_key' => null
        ],
        [
          'title' => 'Assets',
          'href'=> route('user.assets'),
          'icon' => 'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z',
          'badge' => null,
          'active' => request()->routeIs('user.assets'),
        ]
    ],
];

// Helper function to get active classes
function getActiveClasses($isActive, $baseClasses, $activeClasses) {
    return $isActive ? $baseClasses . ' ' . $activeClasses : $baseClasses;
}
@endphp

<!-- Desktop Sidebar - Fixed positioning with proper z-index -->
<aside class="fixed top-16 left-0 z-30 h-[calc(100vh-4rem)] transition-all duration-300 ease-in-out hidden lg:block"
       :class="sidebarCollapsed ? 'w-16' : 'w-72'">
    <div class="h-full flex flex-col overflow-y-auto border-r border-gray-700 bg-crypto-accent">
        <!-- Desktop Header -->
        <div class="flex px-3 h-auto py-3 shrink-0 items-center justify-between">
            <button @click="sidebarCollapsed = !sidebarCollapsed"
                    class="h-8 min-w-8 rounded-md hover:bg-gray-700 flex items-center justify-center text-white">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Desktop Navigation -->
        <nav class="flex flex-1 flex-col px-3">
            <ul role="list" class="flex flex-1 flex-col gap-y-7">
                <!-- Main Navigation -->
                <li>
                    <ul role="list" class="mt-2 space-y-1">
                        @foreach($navigationConfig['main'] as $item)
                            <li>
                                @if(isset($item['children']))
                                    <!-- Dropdown Item -->
                                    <div>
                                        <button @click="dropdowns.{{ $item['dropdown_key'] }} = !dropdowns.{{ $item['dropdown_key'] }}"
                                                class="{{ getActiveClasses($item['active'] ?? false, 'group flex w-full items-center gap-x-3 rounded-md rounded-e-xl p-2 py-3 text-sm leading-6 font-semibold text-white hover:bg-crypto-primary/20 hover:text-white', 'bg-crypto-primary/20 text-black') }}"
                                                :class="{ 'justify-center': sidebarCollapsed }">
                                            <svg class="h-6 w-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"></path>
                                            </svg>
                                            <span x-show="!sidebarCollapsed" class="flex-1 text-left">{{ $item['title'] }}</span>
                                            @if(isset($item['badge']))
                                                <span x-show="!sidebarCollapsed" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 ml-auto">{{ $item['badge'] }}</span>
                                            @endif
                                            <svg x-show="!sidebarCollapsed" class="ml-auto h-4 w-4 transition-transform"
                                                 :class="{ 'rotate-90': dropdowns.{{ $item['dropdown_key'] }} }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </button>
                                        <ul x-show="dropdowns.{{ $item['dropdown_key'] }} && !sidebarCollapsed" x-transition class="mt-1 px-2">
                                            @foreach($item['children'] as $child)
                                                <li>
                                                    <a href="{{ $child['href'] }}"
                                                       class="{{ getActiveClasses($child['active'] ?? false, 'group flex items-center gap-x-3 rounded-md rounded-e-xl py-4 pl-9 pr-2 text-sm leading-6 text-white hover:bg-crypto-primary/20 hover:text-white', 'bg-crypto-primary/20 text-black') }}">
                                                        @if(isset($child['badge']))
                                                            <span class="flex-1">{{ $child['title'] }}</span>
                                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">{{ $child['badge'] }}</span>
                                                        @else
                                                            {{ $child['title'] }}
                                                        @endif
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @else
                                    <!-- Single Link Item -->
                                    <a href="{{ $item['href'] }}"
                                       class="{{ getActiveClasses($item['active'] ?? false, 'group flex items-center gap-x-3 rounded-md rounded-e-xl p-2 py-3 text-sm leading-6 font-semibold text-white hover:bg-crypto-primary/20 hover:text-white', 'bg-crypto-primary/20 text-black') }}"
                                       :class="{ 'justify-center': sidebarCollapsed }">
                                        <svg class="h-6 w-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"></path>
                                        </svg>
                                        <span x-show="!sidebarCollapsed" class="flex-1 text-left">{{ $item['title'] }}</span>
                                        @if(isset($item['badge']))
                                            <span x-show="!sidebarCollapsed" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 ml-auto">{{ $item['badge'] }}</span>
                                        @endif
                                    </a>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Desktop User Menu -->
        <div class="mt-auto p-3" x-show="!sidebarCollapsed">
            <div class="relative" x-data="{ userDropdown: false }">
                <button @click="userDropdown = !userDropdown"
                        class="group flex w-full items-center gap-x-3 rounded-md rounded-e-xl p-2 py-3 text-sm leading-6 font-semibold text-white hover:bg-crypto-primary/20 hover:text-white">
                    <img class="h-8 w-8 rounded-full bg-gray-50"
                         src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'User') }}&color=7F9CF5&background=EBF4FF"
                         alt="User Avatar">
                    <div class="flex flex-1 flex-col text-left">
                        <span class="text-sm font-semibold">{{ auth()->user()->name ?? 'User Name' }}</span>
                        <span class="text-xs text-gray-300">{{ auth()->user()->email ?? 'user@example.com' }}</span>
                    </div>
                    <svg class="ml-auto h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <div x-show="userDropdown" @click.away="userDropdown = false" x-transition
                     class="absolute bottom-full left-0 mb-2 w-56 rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 z-50">
                    <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <svg class="mr-3 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Profile
                    </a>
                    <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <svg class="mr-3 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5z"></path>
                        </svg>
                        Notifications
                    </a>
                    <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <svg class="mr-3 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Settings
                    </a>
                    <hr class="my-1">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex w-full items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <svg class="mr-3 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            Log out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</aside>

<!-- Mobile Navigation -->
<div class="lg:hidden">
    <!-- Mobile Top Bar -->
    <div class="fixed top-16 left-0 right-0 z-40 bg-crypto-accent border-b border-gray-700">
        <div class="flex items-center justify-between px-4 py-3">
            <button @click="mobileExpanded = !mobileExpanded"
                    class="p-2 text-white hover:bg-gray-700 rounded-md">
                <span class="sr-only">Toggle navigation</span>
                <svg x-show="!mobileExpanded" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <svg x-show="mobileExpanded" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <div class="relative" x-data="{ mobileUserDropdown: false }">
                <button @click="mobileUserDropdown = !mobileUserDropdown" class="p-1.5">
                    <img class="h-8 w-8 rounded-full bg-gray-50"
                         src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'User') }}&color=7F9CF5&background=EBF4FF"
                         alt="User Avatar">
                </button>

                <div x-show="mobileUserDropdown" @click.away="mobileUserDropdown = false" x-transition
                     class="absolute right-0 mt-2 w-56 rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 z-50">
                    <div class="px-4 py-2 text-sm text-gray-900 border-b">
                        <div class="font-semibold">{{ auth()->user()->name ?? 'User Name' }}</div>
                        <div class="text-xs text-gray-500">{{ auth()->user()->email ?? 'user@example.com' }}</div>
                    </div>
                    <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <svg class="mr-3 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Profile
                    </a>
                    <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <svg class="mr-3 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5z"></path>
                        </svg>
                        Notifications
                    </a>
                    <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <svg class="mr-3 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Settings
                    </a>
                    <hr class="my-1">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex w-full items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <svg class="mr-3 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            Log out
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Expanded Mobile Navigation -->
        <div x-show="mobileExpanded" x-transition class="border-t border-gray-700 bg-crypto-accent px-4 py-4">
            <!-- Search -->
            <div class="relative mb-4">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="text" placeholder="Search..."
                       class="block w-full pl-10 pr-3 py-2 border border-gray-600 rounded-md leading-5 bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <!-- Navigation -->
            <nav class="space-y-2">
                @foreach($navigationConfig['main'] as $item)
                    @if(isset($item['children']))
                        <!-- Dropdown Item -->
                        <div>
                            <button @click="dropdowns.{{ $item['dropdown_key'] }} = !dropdowns.{{ $item['dropdown_key'] }}"
                                    class="{{ getActiveClasses($item['active'] ?? false, 'group flex w-full items-center justify-between rounded-md px-3 py-2 text-sm font-medium text-white hover:bg-crypto-primary/20', 'bg-crypto-primary/20') }}">
                                <div class="flex items-center gap-x-3">
                                    <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"></path>
                                    </svg>
                                    <span>{{ $item['title'] }}</span>
                                    @if(isset($item['badge']))
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">{{ $item['badge'] }}</span>
                                    @endif
                                </div>
                                <svg class="h-4 w-4 transition-transform" :class="{ 'rotate-180': dropdowns.{{ $item['dropdown_key'] }} }"
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="dropdowns.{{ $item['dropdown_key'] }}" x-transition class="mt-1 space-y-1 pl-8">
                                @foreach($item['children'] as $child)
                                    <a href="{{ $child['href'] }}"
                                       class="{{ getActiveClasses($child['active'] ?? false, 'group flex items-center rounded-md px-3 py-2 text-sm text-gray-300 hover:bg-crypto-primary/20 hover:text-white', 'bg-crypto-primary/20 text-white') }}">
                                        @if(isset($child['badge']))
                                            <span class="flex-1">{{ $child['title'] }}</span>
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">{{ $child['badge'] }}</span>
                                        @else
                                            {{ $child['title'] }}
                                        @endif
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <!-- Single Link Item -->
                        <a href="{{ $item['href'] }}"
                           class="{{ getActiveClasses($item['active'] ?? false, 'group flex items-center gap-x-3 rounded-md px-3 py-2 text-sm font-medium text-white hover:bg-crypto-primary/20', 'bg-crypto-primary/20') }}">
                            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"></path>
                            </svg>
                            <span>{{ $item['title'] }}</span>
                            @if(isset($item['badge']))
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 ml-auto">{{ $item['badge'] }}</span>
                            @endif
                        </a>
                    @endif
                @endforeach
            </nav>
        </div>
    </div>
</div>