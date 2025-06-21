<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desci - @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <script src="//unpkg.com/alpinejs" defer></script>
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
                <div class="hidden w-full justify-between items-center md:flex md:w-auto" id="navbar-dropdown">
                    <ul class="flex flex-col font-normal p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-5 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-crypto-accent">
                        <li>
                            <a href="#"
                                class="block py-2 px-3 text-white rounded-sm md:bg-transparent md:p-0 hover:bg-gray-700 md:hover:bg-transparent md:border-0 md:hover:text-crypto-primary md:p-0 dark:text-white md:dark:hover:text-crypto-primary dark:hover:text-white md:dark:bg-transparent">Buy
                                Crypto</a>
                        </li>
                        <li>
                            <a href="{{ route('web.markets') }}"
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
                                    <a href="{{ route('web.tradingbots') }}" class="hover:text-crypto-primary">
                                        <div class="flex items-center space-x-2 py-1 flex-wrap">
                                            <i class="fa-solid fa-robot text-crypto-primary text-lg"></i>
                                            <span>Trading Bots</span>
                                        </div>
                                        <span class="text-gray-500 text-xs">Trade smarter with our various automated strategies - easy, fast and reliable</span>
                                    </a>
                                    <a href="{{ route('web.copytrading') }}" class="hover:text-crypto-primary">
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
                                            <span>Finance</span>
                                        </div>
                                        <span class="text-gray-500">
                                            Discover innovative DeFi projects and investment opportunities
                                        </span>
                                    </a>
                                    <a href="#" class="hover:text-crypto-primary">
                                        <div class="flex items-center space-x-2 py-1 flex-wrap">
                                            <i class="fa-solid fa-blog text-crypto-primary text-lg"></i>
                                            <span>Publishing</span>
                                        </div>
                                        <span class="text-gray-500">
                                            Explore the latest in crypto news, insights, and analysis
                                        </span>
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
                                    <a href="{{ route('web.earn.overview') }}" class="hover:text-crypto-primary block">
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
                            <a href="{{ url('/nft-home') }}"
                                class="block py-2 px-3 text-white rounded-sm md:bg-transparent md:p-0 hover:bg-gray-700 md:hover:bg-transparent md:border-0 md:hover:text-crypto-primary md:p-0 dark:text-white md:dark:hover:text-crypto-primary dark:hover:text-white md:dark:bg-transparent">
                                NFTs </a>
                            {{-- <button id="dropdownNavbarLinkProjects" data-dropdown-toggle="dropdownNavbarNfts" data-dropdown-trigger='hover' data-dropdown-delay=100
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
                            </div> --}}
                        </li>
                        <li>
                            <a href="{{ url('/') }}"
                                class="block py-2 px-3 text-white rounded-sm md:bg-transparent md:p-0 hover:bg-gray-700 md:hover:bg-transparent md:border-0 md:hover:text-crypto-primary md:p-0 dark:text-white md:dark:hover:text-crypto-primary dark:hover:text-white md:dark:bg-transparent">
                                Square </a>
                            {{-- <button id="dropdownNavbarLinkProjects" data-dropdown-toggle="dropdownNavbarSquare" data-dropdown-trigger='hover' data-dropdown-delay=100
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
                            </div> --}}
                        </li>
                        <li>
                            <a href="{{ url('/') }}"
                                class="block py-2 px-3 text-purple-500 rounded-sm md:bg-transparent md:p-0 hover:bg-gray-700 md:hover:bg-transparent md:border-0 md:hover:text-crypto-primary dark:text-purple-400 md:dark:hover:text-crypto-primary dark:hover:text-white md:dark:bg-transparent">
                                Donate </a>
                        </li>
                    </ul>
                </div>
                <!-- Icon Group -->
                <div class="hidden xl:flex items-center space-x-4 ml-auto">
                    <a href="#"><i class="fas fa-search text-white hover:text-crypto-primary text-lg"></i></a>
                    @auth('web')
                    <button class="bg-yellow-400 text-black font-semibold px-3 py-1 rounded hover:bg-yellow-500 transition">Deposit</button>
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
                                    <a href="/dashboard" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">Dashboard</a>
                                </li>
                                <li>
                                    <a href="/profile" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">Profile</a>
                                </li>
                                <li>
                                    <a href="/wallet" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">Wallet</a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a href="#"><i class="fas fa-wallet text-white hover:text-crypto-primary text-lg"></i></a>
                    <a href="#" class="relative">
                        <i class="fas fa-bell text-white hover:text-crypto-primary text-lg"></i>
                        <span class="absolute top-0 right-0 h-2 w-2 bg-yellow-400 rounded-full"></span>
                    </a>
                    @endauth
                    @if (auth('web')->guest())
                    <a href="/login" class="bg-yellow-400 text-black font-semibold px-3 py-1 rounded hover:bg-yellow-500 transition">Login/Signup</a>
                    @endif
                    <a href="#"><i class="fas fa-globe text-white hover:text-crypto-primary text-lg"></i></a>
                    <a href="#"><i class="fas fa-moon text-white hover:text-crypto-primary text-lg"></i></a>
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
    <footer class="bg-crypto-accent/90 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-5 gap-8">
            <!-- Company Info -->
            <div>
                <h3 class="text-lg font-semibold text-yellow-400 mb-4">CryptoApp</h3>
                <p class="text-gray-400 text-sm">Your trusted platform for automated crypto solutions, offering copy trading, bots, earning opportunities, and secure wallet management.</p>
                <p class="text-gray-400 text-sm mt-2">Email: support@cryptoapp.com</p>
            </div>

            <!-- Services -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Services</h3>
                <ul class="space-y-2">
                    <li><a href="/copy-trading" class="text-gray-400 hover:text-yellow-400">Copy Trading</a></li>
                    <li><a href="/trading-bots" class="text-gray-400 hover:text-yellow-400">Trading Bots</a></li>
                    <li><a href="/earn/overview" class="text-gray-400 hover:text-yellow-400">Earn</a></li>
                    <li><a href="/wallet" class="text-gray-400 hover:text-yellow-400">Wallet</a></li>
                </ul>
            </div>

            <!-- Support -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Support</h3>
                <ul class="space-y-2">
                    <li><a href="/faq" class="text-gray-400 hover:text-yellow-400">FAQ</a></li>
                    <li><a href="/help" class="text-gray-400 hover:text-yellow-400">Help Center</a></li>
                    <li><a href="/contact" class="text-gray-400 hover:text-yellow-400">Contact Us</a></li>
                </ul>
            </div>

            <!-- Legal -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Legal</h3>
                <ul class="space-y-2">
                    <li><a href="/terms" class="text-gray-400 hover:text-yellow-400">Terms of Service</a></li>
                    <li><a href="/privacy" class="text-gray-400 hover:text-yellow-400">Privacy Policy</a></li>
                    <li><a href="/disclaimer" class="text-gray-400 hover:text-yellow-400">Disclaimer</a></li>
                </ul>
            </div>

            <!-- Social Media -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Follow Us</h3>
                <div class="flex space-x-4">
                    <a href="https://twitter.com/cryptoapp" class="text-gray-400 hover:text-yellow-400">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M23.954 4.569c-.885.389-1.83.654-2.825.775 1.014-.611 1.794-1.574 2.163-2.723-.951.555-2.005.959-3.127 1.184-.896-.959-2.173-1.559-3.591-1.559-2.717 0-4.92 2.203-4.92 4.917 0 .39.045.765.127 1.124C7.691 8.094 4.066 6.13 1.64 3.161c-.427.722-.666 1.561-.666 2.475 0 1.71.87 3.213 2.188 4.096-.807-.026-1.566-.248-2.228-.616v.061c0 2.385 1.693 4.374 3.946 4.827-.413.111-.849.171-1.296.171-.314 0-.615-.03-.916-.086.631 1.953 2.445 3.377 4.604 3.417-1.68 1.319-3.809 2.105-6.102 2.105-.39 0-.779-.023-1.17-.067 2.189 1.394 4.768 2.209 7.557 2.209 9.054 0 14.008-7.496 14.008-13.985 0-.266-.006-.531-.018-.797.962-.695 1.8-1.562 2.457-2.549z" />
                        </svg>
                    </a>
                    <a href="https://facebook.com/cryptoapp" class="text-gray-400 hover:text-yellow-400">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.879v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.129 22 16.991 22 12z" />
                        </svg>
                    </a>
                    <a href="https://telegram.org/cryptoapp" class="text-gray-400 hover:text-yellow-400">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="mt-8 text-center text-gray-400 text-sm">
            &copy; {{ date('Y') }} CryptoApp. All rights reserved.
        </div>
    </footer>
    <div x-data="{ show: false, message: '', type: '' }" x-init="@if (session('success')) show = true; message = '{{ session('success') }}'; type = 'success';
        @elseif(session('error'))
            show = true; message = '{{ session('error') }}'; type = 'error';
        @elseif(session('warning'))
            show = true; message = '{{ session('warning') }}'; type = 'warning';
        @elseif(session('info'))
            show = true; message = '{{ session('info') }}'; type = 'info'; @endif

    if (show) {
        setTimeout(() => show = false, 5000);
    }" x-show="show" x-transition class="fixed bottom-5 right-5 z-50">
        <div x-show="type === 'success'" class="flex items-center w-full max-w-xs p-4 mb-4 text-green-800 bg-green-100 rounded-lg shadow" role="alert">
            <svg class="w-5 h-5 me-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.707a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414L9 13.414l4.707-4.707z" clip-rule="evenodd" />
            </svg>
            <span class="text-sm font-medium" x-text="message"></span>
        </div>

        <div x-show="type === 'error'" class="flex items-center w-full max-w-xs p-4 mb-4 text-red-800 bg-red-100 rounded-lg shadow" role="alert">
            <svg class="w-5 h-5 me-2 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10A8 8 0 11 2 10a8 8 0 0116 0zM9 9V5a1 1 0 012 0v4a1 1 0 01-2 0zm0 4a1 1 0 102 0 1 1 0 00-2 0z" clip-rule="evenodd" />
            </svg>
            <span class="text-sm font-medium" x-text="message"></span>
        </div>

        <div x-show="type === 'warning'" class="flex items-center w-full max-w-xs p-4 mb-4 text-yellow-800 bg-yellow-100 rounded-lg shadow" role="alert">
            <svg class="w-5 h-5 me-2 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M8.257 3.099c.366-.773 1.396-.773 1.762 0l7.071 14.918c.33.695-.161 1.483-.881 1.483H2.067c-.72 0-1.211-.788-.881-1.483L8.257 3.1zM11 14a1 1 0 11-2 0 1 1 0 012 0zm-1-2a1 1 0 01-1-1V9a1 1 0 012 0v2a1 1 0 01-1 1z" clip-rule="evenodd" />
            </svg>
            <span class="text-sm font-medium" x-text="message"></span>
        </div>

        <div x-show="type === 'info'" class="flex items-center w-full max-w-xs p-4 mb-4 text-blue-800 bg-blue-100 rounded-lg shadow" role="alert">
            <svg class="w-5 h-5 me-2 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10A8 8 0 11 2 10a8 8 0 0116 0zM11 10a1 1 0 10-2 0 1 1 0 002 0zm0 2a1 1 0 10-2 0v2a1 1 0 002 0v-2z" clip-rule="evenodd" />
            </svg>
            <span class="text-sm font-medium" x-text="message"></span>
        </div>
    </div>

    <script src="{{ asset('assets/js/app-bundle.js') }}"></script>
    @stack('script')
</body>

</html>
