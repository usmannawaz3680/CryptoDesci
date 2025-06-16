<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desci - @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    @stack('style')
</head>

<body>
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
        <main class="@hasSection('sidebar') md:pe-5 @else md:px-10 @endif flex-1 px-5 lg:px-0 overflow-y-auto bg-black custom-scrollbar">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('assets/js/app-bundle.js') }}?v={{ time() }}"></script>
    @stack('script')
</body>

</html>
