@extends('web.layout.app')
@section('title', __('Markets'))
@push('style')
    <style>
        .ticker-scroll {
            animation: scroll 120s linear infinite;
        }

        @keyframes scroll {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .ticker-item {
            white-space: nowrap;
            flex-shrink: 0;
        }

        @media (max-width: 768px) {
            .ticker-scroll {
                animation: scroll 80s linear infinite;
            }
        }

        .table-header {
            font-size: 12px;
            font-weight: 500;
            color: #848e9c;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .crypto-icon {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
            color: white;
        }
    </style>
        <style>
        @media (max-width: 1024px) {
            .grid.grid-cols-12 {
                display: flex;
                flex-direction: column;
                gap: 0.5rem;
            }

            .grid.grid-cols-12 > div {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 0.25rem 0;
            }

            .grid.grid-cols-12 > div:first-child {
                order: 1;
            }

            .grid.grid-cols-12 > div:nth-child(2) {
                order: 2;
                justify-content: flex-start;
            }

            .table-header {
                display: none;
            }

            .grid.grid-cols-12 > div:not(:first-child):not(:nth-child(2))::before {
                content: attr(data-label);
                font-size: 12px;
                color: #6b7280;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                margin-right: 1rem;
            }
        }

        /* Flowbite Tab Overrides */
        [role="tablist"] button[aria-selected="true"] {
            border-color: #f0bb0b !important;
            color: white !important;
        }

        [role="tablist"] button:not([aria-selected="true"]) {
            border-color: transparent !important;
            color: #9ca3af !important;
        }

        [role="tablist"] button:not([aria-selected="true"]):hover {
            color: white !important;
            border-color: #4b5563 !important;
        }
    </style>
@endpush
@section('content')
<!-- Price Ticker -->
    <div class="bg-gray-800 border-b border-gray-700 overflow-hidden h-12">
        <div class="ticker-scroll flex items-center h-full space-x-6 py-0">
            <!-- Hot Section -->
            <div class="ticker-item flex items-center space-x-1 px-4">
                <span class="text-xs text-gray-400">Hot</span>
            </div>

            <!-- BTC -->
            <div class="ticker-item flex items-center space-x-2 px-2">
                <div class="crypto-icon bg-orange-500">₿</div>
                <span class="text-white text-sm font-medium">BTC</span>
                <span class="text-white text-sm font-semibold">$64,147</span>
                <span class="text-green-400 text-xs">+0.80%</span>
            </div>

            <!-- ETH -->
            <div class="ticker-item flex items-center space-x-2 px-2">
                <div class="crypto-icon bg-gray-600">E</div>
                <span class="text-white text-sm font-medium">ETH</span>
                <span class="text-white text-sm font-semibold">$3,519.76</span>
                <span class="text-red-400 text-xs">-1.12%</span>
            </div>

            <!-- New Section -->
            <div class="ticker-item flex items-center space-x-1 px-4">
                <span class="text-xs text-gray-400">New</span>
            </div>

            <!-- SOL -->
            <div class="ticker-item flex items-center space-x-2 px-2">
                <div class="crypto-icon bg-purple-500">S</div>
                <span class="text-white text-sm font-medium">SOL</span>
                <span class="text-white text-sm font-semibold">$0.01213</span>
                <span class="text-red-400 text-xs">-2.54%</span>
            </div>

            <!-- More Section -->
            <div class="ticker-item flex items-center space-x-1 px-4">
                <span class="text-xs text-gray-400">More</span>
            </div>

            <!-- Top Gainer Section -->
            <div class="ticker-item flex items-center space-x-1 px-4">
                <span class="text-xs text-gray-400">Top Gainer</span>
            </div>

            <!-- FTM -->
            <div class="ticker-item flex items-center space-x-2 px-2">
                <div class="crypto-icon bg-green-500">F</div>
                <span class="text-white text-sm font-medium">FTM</span>
                <span class="text-white text-sm font-semibold">$0.00081</span>
                <span class="text-red-400 text-xs">-24.68%</span>
            </div>

            <!-- More Section -->
            <div class="ticker-item flex items-center space-x-1 px-4">
                <span class="text-xs text-gray-400">More</span>
            </div>

            <!-- Top Volume Section -->
            <div class="ticker-item flex items-center space-x-1 px-4">
                <span class="text-xs text-gray-400">Top Volume</span>
            </div>

            <!-- BTC -->
            <div class="ticker-item flex items-center space-x-2 px-2">
                <div class="crypto-icon bg-orange-500">₿</div>
                <span class="text-white text-sm font-medium">BTC</span>
                <span class="text-white text-sm font-semibold">$103.57K</span>
                <span class="text-red-400 text-xs">-8.74%</span>
            </div>

            <!-- ETH -->
            <div class="ticker-item flex items-center space-x-2 px-2">
                <div class="crypto-icon bg-gray-600">E</div>
                <span class="text-white text-sm font-medium">ETH</span>
                <span class="text-white text-sm font-semibold">$2.52K</span>
                <span class="text-red-400 text-xs">-6.12%</span>
            </div>

            <!-- SOL -->
            <div class="ticker-item flex items-center space-x-2 px-2">
                <div class="crypto-icon bg-purple-500">S</div>
                <span class="text-white text-sm font-medium">SOL</span>
                <span class="text-white text-sm font-semibold">$148.33</span>
                <span class="text-red-400 text-xs">-1.78%</span>
            </div>

            <!-- More Section -->
            <div class="ticker-item flex items-center space-x-1 px-4">
                <span class="text-xs text-gray-400">More</span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-full mx-auto px-6 py-0">
        <!-- Flowbite Tab Navigation -->
        <div class="border-b border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 border-crypto-primary text-white rounded-t-lg active" id="overview-tab" data-tabs-target="#overview" type="button" role="tab" aria-controls="overview" aria-selected="true">
                        Overview
                    </button>
                </li>
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 border-transparent text-gray-400 rounded-t-lg hover:text-white hover:border-gray-300" id="trading-data-tab" data-tabs-target="#trading-data" type="button" role="tab" aria-controls="trading-data" aria-selected="false">
                        Trading Data
                    </button>
                </li>
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 border-transparent text-gray-400 rounded-t-lg hover:text-white hover:border-gray-300" id="opportunity-tab" data-tabs-target="#opportunity" type="button" role="tab" aria-controls="opportunity" aria-selected="false">
                        Opportunity
                    </button>
                </li>
                <li role="presentation">
                    <button class="inline-block p-4 border-b-2 border-transparent text-gray-400 rounded-t-lg hover:text-white hover:border-gray-300" id="token-unlock-tab" data-tabs-target="#token-unlock" type="button" role="tab" aria-controls="token-unlock" aria-selected="false">
                        Token Unlock
                    </button>
                </li>
            </ul>
        </div>

        <!-- Flowbite Tab Content -->
        <div id="default-tab-content" class="py-6">
            <!-- Overview Tab -->
            <div class="block" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                <!-- Crypto Filters -->
                <div class="mb-6">
                    <h2 class="text-lg font-medium text-white mb-4">Cryptos</h2>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <button class="crypto-filter active bg-gray-700 text-white px-3 py-1.5 rounded text-sm font-medium hover:bg-gray-600 transition-colors">
                            All
                        </button>
                        <button class="crypto-filter bg-transparent text-gray-400 px-3 py-1.5 rounded text-sm font-medium hover:bg-gray-700 hover:text-white transition-colors">
                            Volume Rank
                        </button>
                        <button class="crypto-filter bg-transparent text-gray-400 px-3 py-1.5 rounded text-sm font-medium hover:bg-gray-700 hover:text-white transition-colors">
                            DeFi
                        </button>
                        <button class="crypto-filter bg-transparent text-gray-400 px-3 py-1.5 rounded text-sm font-medium hover:bg-gray-700 hover:text-white transition-colors">
                            Meme
                        </button>
                        <button class="crypto-filter bg-transparent text-gray-400 px-3 py-1.5 rounded text-sm font-medium hover:bg-gray-700 hover:text-white transition-colors">
                            Payments
                        </button>
                        <button class="crypto-filter bg-transparent text-gray-400 px-3 py-1.5 rounded text-sm font-medium hover:bg-gray-700 hover:text-white transition-colors">
                            AI
                        </button>
                        <button class="crypto-filter bg-transparent text-gray-400 px-3 py-1.5 rounded text-sm font-medium hover:bg-gray-700 hover:text-white transition-colors">
                            Layer 1 / Layer 2
                        </button>
                        <button class="crypto-filter bg-transparent text-gray-400 px-3 py-1.5 rounded text-sm font-medium hover:bg-gray-700 hover:text-white transition-colors">
                            Metaverse
                        </button>
                        <button class="crypto-filter bg-transparent text-gray-400 px-3 py-1.5 rounded text-sm font-medium hover:bg-gray-700 hover:text-white transition-colors">
                            Others
                        </button>
                        <div class="ml-auto">
                            <button class="p-2 hover:bg-gray-700 rounded transition-colors">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Top Tokens Table -->
                <div class="overflow-hidden">
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-white mb-2">Top Tokens by Market Capitalization</h3>
                        <p class="text-gray-400 text-sm leading-relaxed">
                            Get a comprehensive snapshot of all cryptocurrencies available on Binance. This page displays the latest prices, 24-hour trading volumes, price changes, and market capitalizations for all supported digital assets.
                        </p>
                    </div>

                    <!-- Table -->
                    <div class="bg-transparent">
                        <!-- Table Header -->
                        <div class="grid grid-cols-12 gap-4 py-3 border-b border-gray-700">
                            <div class="col-span-1 table-header">Rank #</div>
                            <div class="col-span-3 table-header">Name</div>
                            <div class="col-span-2 table-header">Price</div>
                            <div class="col-span-2 table-header">24h %</div>
                            <div class="col-span-2 table-header">24h Volume</div>
                            <div class="col-span-2 table-header">Market Cap</div>
                        </div>

                        <!-- Table Rows -->
                        <div class="space-y-0">
                            <!-- BTC Row -->
                            <div class="grid grid-cols-12 gap-4 py-4 hover:bg-gray-800 rounded transition-colors group">
                                <div class="col-span-1 flex items-center">
                                    <span class="text-gray-400 text-sm">1</span>
                                </div>
                                <div class="col-span-3 flex items-center space-x-3">
                                    <div class="crypto-icon bg-orange-500">₿</div>
                                    <div>
                                        <div class="text-white font-medium text-sm">BTC</div>
                                        <div class="text-gray-400 text-xs">Bitcoin</div>
                                    </div>
                                </div>
                                <div class="col-span-2 flex items-center">
                                    <span class="text-white font-medium text-sm">$103,577.46</span>
                                </div>
                                <div class="col-span-2 flex items-center">
                                    <span class="text-red-400 font-medium text-sm">-0.92%</span>
                                </div>
                                <div class="col-span-2 flex items-center">
                                    <span class="text-gray-400 text-sm">$49.77B</span>
                                </div>
                                <div class="col-span-2 flex items-center justify-between">
                                    <span class="text-gray-400 text-sm">$2.05T</span>
                                    <div class="flex items-center space-x-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button class="p-1.5 hover:bg-gray-700 rounded transition-colors">
                                            <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                                            </svg>
                                        </button>
                                        <button class="p-1.5 hover:bg-gray-700 rounded transition-colors">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- ETH Row -->
                            <div class="grid grid-cols-12 gap-4 py-4 hover:bg-gray-800 rounded transition-colors group">
                                <div class="col-span-1 flex items-center">
                                    <span class="text-gray-400 text-sm">2</span>
                                </div>
                                <div class="col-span-3 flex items-center space-x-3">
                                    <div class="crypto-icon bg-gray-600">E</div>
                                    <div>
                                        <div class="text-white font-medium text-sm">ETH</div>
                                        <div class="text-gray-400 text-xs">Ethereum</div>
                                    </div>
                                </div>
                                <div class="col-span-2 flex items-center">
                                    <span class="text-white font-medium text-sm">$3,429.38</span>
                                </div>
                                <div class="col-span-2 flex items-center">
                                    <span class="text-red-400 font-medium text-sm">-3.40%</span>
                                </div>
                                <div class="col-span-2 flex items-center">
                                    <span class="text-gray-400 text-sm">$27.78B</span>
                                </div>
                                <div class="col-span-2 flex items-center justify-between">
                                    <span class="text-gray-400 text-sm">$292.53B</span>
                                    <div class="flex items-center space-x-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button class="p-1.5 hover:bg-gray-700 rounded transition-colors">
                                            <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                                            </svg>
                                        </button>
                                        <button class="p-1.5 hover:bg-gray-700 rounded transition-colors">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- USDT Row -->
                            <div class="grid grid-cols-12 gap-4 py-4 hover:bg-gray-800 rounded transition-colors group">
                                <div class="col-span-1 flex items-center">
                                    <span class="text-gray-400 text-sm">3</span>
                                </div>
                                <div class="col-span-3 flex items-center space-x-3">
                                    <div class="crypto-icon bg-green-600">₮</div>
                                    <div>
                                        <div class="text-white font-medium text-sm">USDT</div>
                                        <div class="text-gray-400 text-xs">Tether USDt</div>
                                    </div>
                                </div>
                                <div class="col-span-2 flex items-center">
                                    <span class="text-white font-medium text-sm">$0.9999004</span>
                                </div>
                                <div class="col-span-2 flex items-center">
                                    <span class="text-green-400 font-medium text-sm">+0.02%</span>
                                </div>
                                <div class="col-span-2 flex items-center">
                                    <span class="text-gray-400 text-sm">$75.28B</span>
                                </div>
                                <div class="col-span-2 flex items-center justify-between">
                                    <span class="text-gray-400 text-sm">$135.89B</span>
                                    <div class="flex items-center space-x-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button class="p-1.5 hover:bg-gray-700 rounded transition-colors">
                                            <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                                            </svg>
                                        </button>
                                        <button class="p-1.5 hover:bg-gray-700 rounded transition-colors">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- XRP Row -->
                            <div class="grid grid-cols-12 gap-4 py-4 hover:bg-gray-800 rounded transition-colors group">
                                <div class="col-span-1 flex items-center">
                                    <span class="text-gray-400 text-sm">4</span>
                                </div>
                                <div class="col-span-3 flex items-center space-x-3">
                                    <div class="crypto-icon bg-gray-500">X</div>
                                    <div>
                                        <div class="text-white font-medium text-sm">XRP</div>
                                        <div class="text-gray-400 text-xs">XRP</div>
                                    </div>
                                </div>
                                <div class="col-span-2 flex items-center">
                                    <span class="text-white font-medium text-sm">$2.13</span>
                                </div>
                                <div class="col-span-2 flex items-center">
                                    <span class="text-red-400 font-medium text-sm">-1.52%</span>
                                </div>
                                <div class="col-span-2 flex items-center">
                                    <span class="text-gray-400 text-sm">$7.41B</span>
                                </div>
                                <div class="col-span-2 flex items-center justify-between">
                                    <span class="text-gray-400 text-sm">$125.79B</span>
                                    <div class="flex items-center space-x-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button class="p-1.5 hover:bg-gray-700 rounded transition-colors">
                                            <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                                            </svg>
                                        </button>
                                        <button class="p-1.5 hover:bg-gray-700 rounded transition-colors">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- BNB Row -->
                            <div class="grid grid-cols-12 gap-4 py-4 hover:bg-gray-800 rounded transition-colors group">
                                <div class="col-span-1 flex items-center">
                                    <span class="text-gray-400 text-sm">5</span>
                                </div>
                                <div class="col-span-3 flex items-center space-x-3">
                                    <div class="crypto-icon bg-crypto-primary text-black">B</div>
                                    <div>
                                        <div class="text-white font-medium text-sm">BNB</div>
                                        <div class="text-gray-400 text-xs">BNB</div>
                                    </div>
                                </div>
                                <div class="col-span-2 flex items-center">
                                    <span class="text-white font-medium text-sm">$664.47</span>
                                </div>
                                <div class="col-span-2 flex items-center">
                                    <span class="text-green-400 font-medium text-sm">+0.05%</span>
                                </div>
                                <div class="col-span-2 flex items-center">
                                    <span class="text-gray-400 text-sm">$1.41B</span>
                                </div>
                                <div class="col-span-2 flex items-center justify-between">
                                    <span class="text-gray-400 text-sm">$99.74B</span>
                                    <div class="flex items-center space-x-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button class="p-1.5 hover:bg-gray-700 rounded transition-colors">
                                            <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                                            </svg>
                                        </button>
                                        <button class="p-1.5 hover:bg-gray-700 rounded transition-colors">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- SOL Row -->
                            <div class="grid grid-cols-12 gap-4 py-4 hover:bg-gray-800 rounded transition-colors group">
                                <div class="col-span-1 flex items-center">
                                    <span class="text-gray-400 text-sm">6</span>
                                </div>
                                <div class="col-span-3 flex items-center space-x-3">
                                    <div class="crypto-icon bg-purple-600">S</div>
                                    <div>
                                        <div class="text-white font-medium text-sm">SOL</div>
                                        <div class="text-gray-400 text-xs">Solana</div>
                                    </div>
                                </div>
                                <div class="col-span-2 flex items-center">
                                    <span class="text-white font-medium text-sm">$148.33</span>
                                </div>
                                <div class="col-span-2 flex items-center">
                                    <span class="text-red-400 font-medium text-sm">-1.78%</span>
                                </div>
                                <div class="col-span-2 flex items-center">
                                    <span class="text-gray-400 text-sm">$4.60B</span>
                                </div>
                                <div class="col-span-2 flex items-center justify-between">
                                    <span class="text-gray-400 text-sm">$71.33B</span>
                                    <div class="flex items-center space-x-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button class="p-1.5 hover:bg-gray-700 rounded transition-colors">
                                            <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                                            </svg>
                                        </button>
                                        <button class="p-1.5 hover:bg-gray-700 rounded transition-colors">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- USDC Row -->
                            <div class="grid grid-cols-12 gap-4 py-4 hover:bg-gray-800 rounded transition-colors group">
                                <div class="col-span-1 flex items-center">
                                    <span class="text-gray-400 text-sm">7</span>
                                </div>
                                <div class="col-span-3 flex items-center space-x-3">
                                    <div class="crypto-icon bg-blue-600">U</div>
                                    <div>
                                        <div class="text-white font-medium text-sm">USDC</div>
                                        <div class="text-gray-400 text-xs">USDC</div>
                                    </div>
                                </div>
                                <div class="col-span-2 flex items-center">
                                    <span class="text-white font-medium text-sm">$0.9998</span>
                                </div>
                                <div class="col-span-2 flex items-center">
                                    <span class="text-red-400 font-medium text-sm">-0.01%</span>
                                </div>
                                <div class="col-span-2 flex items-center">
                                    <span class="text-gray-400 text-sm">$10.11B</span>
                                </div>
                                <div class="col-span-2 flex items-center justify-between">
                                    <span class="text-gray-400 text-sm">$41.28B</span>
                                    <div class="flex items-center space-x-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button class="p-1.5 hover:bg-gray-700 rounded transition-colors">
                                            <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                                            </svg>
                                        </button>
                                        <button class="p-1.5 hover:bg-gray-700 rounded transition-colors">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- TRX Row -->
                            <div class="grid grid-cols-12 gap-4 py-4 hover:bg-gray-800 rounded transition-colors group">
                                <div class="col-span-1 flex items-center">
                                    <span class="text-gray-400 text-sm">8</span>
                                </div>
                                <div class="col-span-3 flex items-center space-x-3">
                                    <div class="crypto-icon bg-red-600">T</div>
                                    <div>
                                        <div class="text-white font-medium text-sm">TRX</div>
                                        <div class="text-gray-400 text-xs">TRON</div>
                                    </div>
                                </div>
                                <div class="col-span-2 flex items-center">
                                    <span class="text-white font-medium text-sm">$0.2734</span>
                                </div>
                                <div class="col-span-2 flex items-center">
                                    <span class="text-red-400 font-medium text-sm">-0.62%</span>
                                </div>
                                <div class="col-span-2 flex items-center">
                                    <span class="text-gray-400 text-sm">$536.80M</span>
                                </div>
                                <div class="col-span-2 flex items-center justify-between">
                                    <span class="text-gray-400 text-sm">$25.96B</span>
                                    <div class="flex items-center space-x-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button class="p-1.5 hover:bg-gray-700 rounded transition-colors">
                                            <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                                            </svg>
                                        </button>
                                        <button class="p-1.5 hover:bg-gray-700 rounded transition-colors">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Trading Data Tab -->
            <div class="hidden" id="trading-data" role="tabpanel" aria-labelledby="trading-data-tab">
                <div class="text-center py-16">
                    <h3 class="text-xl font-medium text-white mb-4">Trading Data</h3>
                    <p class="text-gray-400">Advanced trading analytics and market data will be displayed here.</p>
                </div>
            </div>

            <!-- Opportunity Tab -->
            <div class="hidden" id="opportunity" role="tabpanel" aria-labelledby="opportunity-tab">
                <div class="text-center py-16">
                    <h3 class="text-xl font-medium text-white mb-4">Opportunity</h3>
                    <p class="text-gray-400">Investment opportunities and market insights will be shown here.</p>
                </div>
            </div>

            <!-- Token Unlock Tab -->
            <div class="hidden" id="token-unlock" role="tabpanel" aria-labelledby="token-unlock-tab">
                <div class="text-center py-16">
                    <h3 class="text-xl font-medium text-white mb-4">Token Unlock</h3>
                    <p class="text-gray-400">Token unlock schedules and vesting information will be displayed here.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
<script>
        document.addEventListener('DOMContentLoaded', function() {
            // Crypto filter functionality
            const cryptoFilters = document.querySelectorAll('.crypto-filter');

            cryptoFilters.forEach(filter => {
                filter.addEventListener('click', function() {
                    // Remove active class from all filters
                    cryptoFilters.forEach(f => {
                        f.classList.remove('active', 'bg-gray-700', 'text-white');
                        f.classList.add('bg-transparent', 'text-gray-400');
                    });

                    // Add active class to clicked filter
                    this.classList.remove('bg-transparent', 'text-gray-400');
                    this.classList.add('active', 'bg-gray-700', 'text-white');
                });
            });

            // Add data labels for mobile responsive table
            const tableRows = document.querySelectorAll('.grid.grid-cols-12:not(:first-child)');
            tableRows.forEach(row => {
                const cells = row.children;
                if (cells.length >= 6) {
                    cells[2].setAttribute('data-label', 'Price');
                    cells[3].setAttribute('data-label', '24h %');
                    cells[4].setAttribute('data-label', '24h Volume');
                    cells[5].setAttribute('data-label', 'Market Cap');
                }
            });
        });
    </script>
@endpush
