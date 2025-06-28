<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desci - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    @stack('style')
</head>

<body class="dark">
    <header>
        <nav class="bg-white border-gray-200 dark:bg-crypto-accent dark:border-gray-700">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between md:justify-start md:gap-8 p-4">
                <a href="{{ url('/') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Desci</span>
                </a>
                <button data-collapse-toggle="navbar-dropdown" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown"
                    aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                {{-- <div class="hidden w-full justify-between items-center md:flex md:w-auto" id="navbar-dropdown">
                    <ul class="flex flex-col font-normal p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-5 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-crypto-accent">
                        <li>
                            <a href="#"
                                class="block py-2 px-3 text-white rounded-sm md:bg-transparent md:p-0 hover:bg-gray-700 md:hover:bg-transparent md:border-0 md:hover:text-crypto-primary md:p-0 dark:text-white md:dark:hover:text-crypto-primary dark:hover:text-white md:dark:bg-transparent">Buy
                                Crypto</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-crypto-primary md:p-0 dark:text-white md:dark:hover:text-crypto-primary dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Markets</a>
                        </li>
                        <li>
                            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" data-dropdown-trigger='hover' data-dropdown-delay=100
                                class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-crypto-primary md:p-0 md:w-auto dark:text-white md:dark:hover:text-crypto-primary dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Trade
                                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg></button>
                            <!-- Dropdown menu -->
                            <div id="dropdownNavbar" class="z-50 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-45 dark:bg-neutral-800 dark:divide-gray-600 p-4">
                                <div class="text-gray-400 text-sm font-medium space-y-2">
                                    <div class="flex items-center space-x-2 py-1">
                                        <span>Arbitrage</span>
                                    </div>
                                    <a href="#" class="hover:text-crypto-primary">
                                        <div class="flex items-center space-x-2 py-1 flex-wrap">
                                            <i class="fa-solid fa-robot text-crypto-primary text-lg"></i>
                                            <span>Trading Bots</span>
                                        </div>
                                        <span class="text-gray-500 text-xs">Trade smarter with our various automated strategies - easy, fast and reliable</span>
                                    </a>
                                    <a href="#" class="hover:text-crypto-primary">
                                        <div class="flex items-center space-x-2 py-1 flex-wrap">
                                            <i class="fa-solid fa-clone text-crypto-primary text-lg"></i>
                                            <span>Copy Trading</span>
                                        </div>
                                        <span class="text-gray-500 text-xs">Follow the most popular traders</span>
                                    </a>

                                </div>
                            </div>
                        </li>
                        <li>
                            <button id="dropdownNavbarLinkProjects" data-dropdown-toggle="dropdownNavbarProjects" data-dropdown-trigger='hover' data-dropdown-delay=100
                                class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-crypto-primary md:p-0 md:w-auto dark:text-white md:dark:hover:text-crypto-primary dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Projects
                                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg></button>
                            <!-- Dropdown menu -->
                            <div id="dropdownNavbarProjects" class="z-50 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-65 dark:bg-neutral-800 dark:divide-gray-600 p-4">
                                <div class="text-gray-400 text-sm font-medium space-y-2">
                                    <a href="#" class="hover:text-crypto-primary">
                                        <div class="flex items-center space-x-2 py-1 flex-wrap">
                                            <i class="fa-solid fa-dollar-sign text-crypto-primary text-lg"></i>
                                            <span>Origin trail</span>
                                        </div>
                                        <span class="text-gray-500 text-xs">Contracts settled in USDT & USDC</span>
                                    </a>
                                    <a href="#" class="hover:text-crypto-primary">
                                        <div class="flex items-center space-x-2 py-1 flex-wrap">
                                            <i class="fa-solid fa-boxes-packing text-crypto-primary text-lg"></i>
                                            <span>Vita Dao</span>
                                        </div>
                                        <span class="text-gray-500 text-xs">Contracts settled in cryptocurrency</span>
                                    </a>
                                    <a href="#" class="hover:text-crypto-primary">
                                        <div class="flex items-center space-x-2 py-1 flex-wrap">
                                            <i class="fa-solid fa-flask-vial text-crypto-primary text-lg"></i>
                                            <span>Al Chemist AI</span>
                                        </div>
                                        <span class="text-gray-500 text-xs">USDT options with limited downside and afforable entry</span>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <button id="dropdownNavbarLinkProjects" data-dropdown-toggle="dropdownNavbarEarn" data-dropdown-trigger='hover' data-dropdown-delay=100
                                class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-crypto-primary md:p-0 md:w-auto dark:text-white md:dark:hover:text-crypto-primary dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Earn
                                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg></button>
                            <!-- Dropdown menu -->
                            <div id="dropdownNavbarEarn" class="z-50 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-55 dark:bg-neutral-800 dark:divide-gray-600 p-4">
                                <div class="text-gray-400 text-sm font-medium space-y-4">
                                    <!-- Original 3 Sections -->
                                    <a href="#" class="hover:text-crypto-primary block">
                                        <div class="flex items-center space-x-2 py-1">
                                            <i class="fa-solid fa-circle-info text-crypto-primary text-lg"></i>
                                            <span class="text-white font-medium">Overview</span>
                                        </div>
                                        <span class="text-gray-500 text-xs pl-6 block">One-stop portal for all Earn products</span>
                                    </a>
                                    <a href="#" class="hover:text-crypto-primary block">
                                        <div class="flex items-center space-x-2 py-1">
                                            <i class="fa-solid fa-coins text-crypto-primary text-lg"></i>
                                            <span class="text-white font-medium">Simple Earn</span>
                                        </div>
                                        <span class="text-gray-500 text-xs pl-6 block">
                                            Earn passive income on 300+ crypto assets with flexible and locked terms
                                        </span>
                                    </a>
                                    <a href="#" class="hover:text-crypto-primary block">
                                        <div class="flex items-center space-x-2 py-1">
                                            <i class="fa-solid fa-chart-line text-crypto-primary text-lg"></i>
                                            <span class="text-white font-medium">Advanced Earn</span>
                                        </div>
                                        <span class="text-gray-500 text-xs pl-6 block">
                                            Maximize your returns with our advanced yield investment products
                                        </span>
                                    </a>

                                </div>

                            </div>
                        </li>
                        <li>
                            <button id="dropdownNavbarLinkProjects" data-dropdown-toggle="dropdownNavbarNfts" data-dropdown-trigger='hover' data-dropdown-delay=100
                                class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-crypto-primary md:p-0 md:w-auto dark:text-white md:dark:hover:text-crypto-primary dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">NFTs
                                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg></button>
                            <!-- Dropdown menu -->
                            <div id="dropdownNavbarNfts" class="z-50 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-neutral-800 dark:divide-gray-600">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                    </li>
                                </ul>
                                <div class="py-1">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <button id="dropdownNavbarLinkProjects" data-dropdown-toggle="dropdownNavbarSquare" data-dropdown-trigger='hover' data-dropdown-delay=100
                                class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-crypto-primary md:p-0 md:w-auto dark:text-white md:dark:hover:text-crypto-primary dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Square
                                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg></button>
                            <!-- Dropdown menu -->
                            <div id="dropdownNavbarSquare" class="z-50 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-neutral-800 dark:divide-gray-600">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                    </li>
                                </ul>
                                <div class="py-1">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div> --}}
                <!-- Icon Group -->
                <div class="hidden xl:flex items-center space-x-4 ml-auto">


                    <button id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification" class="relative inline-flex items-center text-sm font-medium text-center text-gray-500 hover:text-gray-900 focus:outline-none dark:hover:text-white dark:text-gray-400" type="button">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 20">
                            <path
                                d="M12.133 10.632v-1.8A5.406 5.406 0 0 0 7.979 3.57.946.946 0 0 0 8 3.464V1.1a1 1 0 0 0-2 0v2.364a.946.946 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C1.867 13.018 0 13.614 0 14.807 0 15.4 0 16 .538 16h12.924C14 16 14 15.4 14 14.807c0-1.193-1.867-1.789-1.867-4.175ZM3.823 17a3.453 3.453 0 0 0 6.354 0H3.823Z" />
                        </svg>
                        @if(auth()->user()->unreadNotifications->count() > 0)
                        <div class="absolute block w-3 h-3 bg-red-500 border-2 border-white rounded-full -top-0.5 start-2.5 dark:border-gray-900"></div>
                        @endif
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownNotification" class="z-20 hidden w-full max-w-sm bg-white divide-y divide-gray-100 rounded-lg shadow-sm dark:bg-zinc-800 dark:divide-gray-700" aria-labelledby="dropdownNotificationButton">
                        <div class="block px-4 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-50 dark:dark:bg-zinc-800 dark:text-white">
                            Notifications
                        </div>
                        <div class="divide-y divide-gray-100 dark:divide-gray-700">
                            @forelse (Auth::guard('admin')->user()->unreadNotifications as $notification)
                                <a href="#" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                                <div class="shrink-0">
                                    <div class="w-11 h-11 bg-blue-700 rounded-full flex items-center justify-center"><i class="fas fa-bell"></i></div>
                                    <div class="absolute flex items-center justify-center w-5 h-5 ms-6 -mt-5 bg-blue-600 border border-white rounded-full dark:border-gray-800">
                                        <svg class="w-2 h-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                            <path d="M1 18h16a1 1 0 0 0 1-1v-6h-4.439a.99.99 0 0 0-.908.6 3.978 3.978 0 0 1-7.306 0 .99.99 0 0 0-.908-.6H0v6a1 1 0 0 0 1 1Z" />
                                            <path d="M4.439 9a2.99 2.99 0 0 1 2.742 1.8 1.977 1.977 0 0 0 3.638 0A2.99 2.99 0 0 1 13.561 9H17.8L15.977.783A1 1 0 0 0 15 0H3a1 1 0 0 0-.977.783L.2 9h4.239Z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="w-full ps-3">
                                    <div class="text-gray-500 text-sm mb-1 dark:text-gray-400">{{ $notification->data['message'] }}</div>
                                    @if ($notification->type === 'App\Notifications\DepositSubmitted')
                                        <div class="text-sm text-gray-900 dark:text-white flex flex-col gap-1">
                                            <div>
                                                <span class="font-semibold">Deposit Amount:</span> {{ $notification->data['amount'] }} </span>
                                            </div>
                                            <div>
                                                <span class="font-semibold">Trx ID:</span> {{ $notification->data['trx_id'] }}</span>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="text-xs text-blue-600 dark:text-blue-500">{{ $notification->created_at->diffForHumans() }}</div>
                                </div>
                            </a>
                            @empty
                            <div class="px-4 py-3 text-center text-gray-500 dark:text-gray-400">
                                No new notifications
                            </div>
                            @endforelse
                        </div>
                        <a href="{{ route('notifications.markAsRead') }}" class="block py-2 text-sm font-medium text-center text-gray-900 rounded-b-lg bg-gray-50 hover:bg-gray-100 dark:dark:bg-zinc-800 dark:hover:bg-gray-700 dark:text-white">
                            <div class="inline-flex items-center ">
                                <svg class="w-4 h-4 me-2 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                                    <path d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                                </svg>
                                Mark as Read
                            </div>
                        </a>
                    </div>

                    <div class="relative group">
                        <button class="flex items-center focus:outline-none">
                            <i class="fas fa-user text-white hover:text-crypto-primary text-lg"></i>
                            <svg class="w-3 h-3 ml-1 text-white group-hover:text-crypto-primary" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 20 20">
                                <path d="M6 8l4 4 4-4" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                        <div class="absolute -right-10 w-44 bg-white rounded-md shadow-lg z-20 hidden group-hover:block dark:bg-neutral-800">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                                <li>
                                    <a href="/profile" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">Profile</a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('admin.logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </nav>
    </header>
    <div class="flex">
        @hasSection('sidebar')
            @yield('sidebar')
        @endif
        <main class="@hasSection('sidebar')
md:pe-5
@else
md:px-10
@endif flex-1 px-5 lg:px-0 overflow-y-auto bg-black custom-scrollbar">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('assets/js/app-bundle.js') }}?v={{ time() }}"></script>
    @stack('script')
</body>

</html>
