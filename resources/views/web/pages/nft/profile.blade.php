@extends('web.layout.app')
@section('title', 'NFT Profile')
@push('style')
    <style>
        body {
            font-family: 'Figtree', system-ui, sans-serif;
        }

        .nft-art {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .nft-art-2 {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }

        .nft-art-3 {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        .nft-art-4 {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        }

        .nft-art-5 {
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        }

        .nft-art-6 {
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        }

        .nft-art-7 {
            background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
        }

        .nft-art-8 {
            background: linear-gradient(135deg, #a18cd1 0%, #fbc2eb 100%);
        }

        .nft-art-9 {
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
        }

        .nft-art-10 {
            background: linear-gradient(135deg, #ff8a80 0%, #ea4c89 100%);
        }
    </style>
@endpush
@section('content')
    <div class="min-h-screen bg-crypto-accent">
        <!-- Collection Header -->
        <div class="border-b border-gray-800 px-4 lg:px-6 py-4 lg:py-6">
            <div class="flex flex-col lg:flex-row lg:items-center space-y-4 lg:space-y-0 lg:space-x-4 mb-6">
                <div class="w-16 h-16 lg:w-20 lg:h-20 rounded-full overflow-hidden border-2 border-gray-700 mx-auto lg:mx-0">
                    <div class="w-full h-full bg-gradient-to-br from-purple-500 to-pink-500 flex items-center justify-center">
                        <span class="text-white font-bold text-xl lg:text-2xl">🐱</span>
                    </div>
                </div>
                <div class="text-center lg:text-left">
                    <div class="flex items-center justify-center lg:justify-start space-x-2 mb-2">
                        <h1 class="text-xl lg:text-2xl font-bold text-white">Proud Kitty Gang</h1>
                        <svg class="w-4 h-4 lg:w-5 lg:h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <svg class="w-4 h-4 lg:w-5 lg:h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>
                    <div class="flex flex-wrap items-center justify-center lg:justify-start space-x-2 lg:space-x-4 text-xs lg:text-sm text-gray-400">
                        <span>Description</span>
                        <span>🌐</span>
                        <span>📷</span>
                        <span>📱</span>
                        <span>🔗</span>
                        <span>📊</span>
                        <button class="flex items-center space-x-1 text-gray-400 hover:text-white">
                            <span>Share</span>
                            <svg class="w-3 h-3 lg:w-4 lg:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z" />
                            </svg>
                        </button>
                        <div class="flex items-center space-x-2">
                            <span class="bg-crypto-primary text-black px-2 py-1 rounded text-xs font-medium">BNB</span>
                            <span class="text-crypto-primary">USD</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Collection Stats -->
            <div class="grid grid-cols-2 lg:grid-cols-5 gap-4 lg:gap-8">
                <div>
                    <div class="text-gray-400 text-xs lg:text-sm mb-1">Floor Price</div>
                    <div class="text-green-400 text-sm lg:text-lg font-semibold">+6.90%</div>
                    <div class="text-white text-lg lg:text-xl font-bold">36 USD</div>
                </div>
                <div>
                    <div class="text-gray-400 text-xs lg:text-sm mb-1">24h Volume</div>
                    <div class="text-red-400 text-sm lg:text-lg font-semibold">-4.78%</div>
                    <div class="text-white text-lg lg:text-xl font-bold">124K USD</div>
                </div>
                <div>
                    <div class="text-gray-400 text-xs lg:text-sm mb-1">Total Volume</div>
                    <div class="text-white text-lg lg:text-xl font-bold">8.1M USD</div>
                </div>
                <div>
                    <div class="text-gray-400 text-xs lg:text-sm mb-1">Listed/Total Items</div>
                    <div class="text-white text-lg lg:text-xl font-bold">28/4,966</div>
                </div>
                <div class="col-span-2 lg:col-span-1">
                    <div class="text-gray-400 text-xs lg:text-sm mb-1">Owners</div>
                    <div class="text-white text-lg lg:text-xl font-bold">376</div>
                    <div class="text-gray-400 text-xs lg:text-sm mb-1 mt-2">Royalty Fee</div>
                    <div class="text-white text-lg lg:text-xl font-bold">1%</div>
                </div>
            </div>
        </div>

        <!-- Mobile Filter Toggle -->
        <div class="lg:hidden border-b border-gray-800 px-4 py-3">
            <button type="button" class="flex items-center space-x-2 text-white bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded-lg w-full justify-center" data-drawer-target="mobile-filters" data-drawer-show="mobile-filters" aria-controls="mobile-filters">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.414A1 1 0 013 6.707V4z" />
                </svg>
                <span>Filters</span>
            </button>
        </div>

        <!-- Main Content Area -->
        <div class="flex flex-col lg:flex-row">
            <!-- Desktop Left Sidebar - Filters -->
            <div class="hidden lg:block w-64 border-r border-gray-800 p-6 space-y-6">
                <!-- Status Filter -->
                <div>
                    <button type="button" class="flex items-center justify-between w-full text-white font-semibold mb-3 hover:text-crypto-primary" data-collapse-toggle="status-collapse" aria-expanded="true" aria-controls="status-collapse">
                        <span>Status</span>
                        <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="status-collapse" class="space-y-2">
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" checked class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                            <span class="text-gray-300">Buy Now</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                            <span class="text-gray-300">Live Auction</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                            <span class="text-gray-300">Has Offers</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                            <span class="text-gray-300">Coming soon</span>
                        </label>
                    </div>
                </div>

                <!-- Price Filter -->
                <div>
                    <button type="button" class="flex items-center justify-between w-full text-white font-semibold mb-3 hover:text-crypto-primary" data-collapse-toggle="price-collapse" aria-expanded="false" aria-controls="price-collapse">
                        <span>Price</span>
                        <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="price-collapse" class="hidden space-y-3">
                        <div class="flex space-x-2">
                            <input type="number" placeholder="Min" class="flex-1 bg-gray-800 border border-gray-700 rounded px-3 py-2 text-white placeholder-gray-400 focus:outline-none focus:border-crypto-primary">
                            <input type="number" placeholder="Max" class="flex-1 bg-gray-800 border border-gray-700 rounded px-3 py-2 text-white placeholder-gray-400 focus:outline-none focus:border-crypto-primary">
                        </div>
                        <button class="w-full bg-crypto-primary text-black py-2 rounded font-semibold hover:bg-yellow-500">Apply</button>
                    </div>
                </div>

                <!-- Accessories Filter -->
                <div>
                    <button type="button" class="flex items-center justify-between w-full text-white font-semibold mb-3 hover:text-crypto-primary" data-collapse-toggle="accessories-collapse" aria-expanded="false" aria-controls="accessories-collapse">
                        <span>Accessories</span>
                        <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="accessories-collapse" class="hidden space-y-2">
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                            <span class="text-gray-300">None</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                            <span class="text-gray-300">Chain</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                            <span class="text-gray-300">Watch</span>
                        </label>
                    </div>
                </div>

                <!-- Background Filter -->
                <div>
                    <button type="button" class="flex items-center justify-between w-full text-white font-semibold mb-3 hover:text-crypto-primary" data-collapse-toggle="background-collapse" aria-expanded="false" aria-controls="background-collapse">
                        <span>Background</span>
                        <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="background-collapse" class="hidden space-y-2">
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                            <span class="text-gray-300">Blue</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                            <span class="text-gray-300">Pink</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                            <span class="text-gray-300">Green</span>
                        </label>
                    </div>
                </div>

                <!-- Clothes Filter -->
                <div>
                    <button type="button" class="flex items-center justify-between w-full text-white font-semibold mb-3 hover:text-crypto-primary" data-collapse-toggle="clothes-collapse" aria-expanded="false" aria-controls="clothes-collapse">
                        <span>Clothes</span>
                        <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="clothes-collapse" class="hidden space-y-2">
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                            <span class="text-gray-300">T-Shirt</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                            <span class="text-gray-300">Hoodie</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                            <span class="text-gray-300">Suit</span>
                        </label>
                    </div>
                </div>

                <!-- Expression Filter -->
                <div>
                    <button type="button" class="flex items-center justify-between w-full text-white font-semibold mb-3 hover:text-crypto-primary" data-collapse-toggle="expression-collapse" aria-expanded="false" aria-controls="expression-collapse">
                        <span>Expression</span>
                        <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="expression-collapse" class="hidden space-y-2">
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                            <span class="text-gray-300">Happy</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                            <span class="text-gray-300">Serious</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                            <span class="text-gray-300">Angry</span>
                        </label>
                    </div>
                </div>

                <!-- Gesture Filter -->
                <div>
                    <button type="button" class="flex items-center justify-between w-full text-white font-semibold mb-3 hover:text-crypto-primary" data-collapse-toggle="gesture-collapse" aria-expanded="false" aria-controls="gesture-collapse">
                        <span>Gesture</span>
                        <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="gesture-collapse" class="hidden space-y-2">
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                            <span class="text-gray-300">Peace</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                            <span class="text-gray-300">Thumbs Up</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                            <span class="text-gray-300">Wave</span>
                        </label>
                    </div>
                </div>

                <!-- Glasses Filter -->
                <div>
                    <button type="button" class="flex items-center justify-between w-full text-white font-semibold mb-3 hover:text-crypto-primary" data-collapse-toggle="glasses-collapse" aria-expanded="false" aria-controls="glasses-collapse">
                        <span>Glasses</span>
                        <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="glasses-collapse" class="hidden space-y-2">
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                            <span class="text-gray-300">None</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                            <span class="text-gray-300">Sunglasses</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                            <span class="text-gray-300">Reading</span>
                        </label>
                    </div>
                </div>

                <!-- Headwear Filter -->
                <div>
                    <button type="button" class="flex items-center justify-between w-full text-white font-semibold mb-3 hover:text-crypto-primary" data-collapse-toggle="headwear-collapse" aria-expanded="false" aria-controls="headwear-collapse">
                        <span>Headwear</span>
                        <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="headwear-collapse" class="hidden space-y-2">
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                            <span class="text-gray-300">None</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                            <span class="text-gray-300">Cap</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                            <span class="text-gray-300">Beanie</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Mobile Filter Drawer -->
            <div id="mobile-filters" class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-crypto-accent w-80 border-r border-gray-800" tabindex="-1" aria-labelledby="drawer-label">
                <h5 id="drawer-label" class="inline-flex items-center mb-4 text-base font-semibold text-white">
                    <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    Filters
                </h5>
                <button type="button" data-drawer-hide="mobile-filters" aria-controls="mobile-filters" class="text-gray-400 bg-transparent hover:bg-gray-600 hover:text-white rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 flex items-center justify-center">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>

                <!-- Mobile Filter Content (Same as desktop but in drawer) -->
                <div class="space-y-6">
                    <!-- Status Filter -->
                    <div>
                        <button type="button" class="flex items-center justify-between w-full text-white font-semibold mb-3 hover:text-crypto-primary" data-collapse-toggle="mobile-status-collapse" aria-expanded="true" aria-controls="mobile-status-collapse">
                            <span>Status</span>
                            <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div id="mobile-status-collapse" class="space-y-2">
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" checked class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                                <span class="text-gray-300">Buy Now</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                                <span class="text-gray-300">Live Auction</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                                <span class="text-gray-300">Has Offers</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                                <span class="text-gray-300">Coming soon</span>
                            </label>
                        </div>
                    </div>

                    <!-- Price Filter -->
                    <div>
                        <button type="button" class="flex items-center justify-between w-full text-white font-semibold mb-3 hover:text-crypto-primary" data-collapse-toggle="mobile-price-collapse" aria-expanded="false" aria-controls="mobile-price-collapse">
                            <span>Price</span>
                            <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div id="mobile-price-collapse" class="hidden space-y-3">
                            <div class="flex space-x-2">
                                <input type="number" placeholder="Min" class="flex-1 bg-gray-800 border border-gray-700 rounded px-3 py-2 text-white placeholder-gray-400 focus:outline-none focus:border-crypto-primary">
                                <input type="number" placeholder="Max" class="flex-1 bg-gray-800 border border-gray-700 rounded px-3 py-2 text-white placeholder-gray-400 focus:outline-none focus:border-crypto-primary">
                            </div>
                            <button class="w-full bg-crypto-primary text-black py-2 rounded font-semibold hover:bg-yellow-500">Apply</button>
                        </div>
                    </div>

                    <!-- Other filters similar to desktop version -->
                    <!-- ... (truncated for brevity, but would include all other filters) -->
                </div>
            </div>

            <!-- Center Content - NFT Grid -->
            <div class="flex-1 p-4 lg:p-6">
                <!-- Tabs and Controls -->
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between space-y-4 lg:space-y-0 mb-6">
                    <div class="flex space-x-8">
                        <button class="text-white font-semibold border-b-2 border-crypto-primary pb-2">Items</button>
                        <button class="text-gray-400 hover:text-white pb-2">Activity</button>
                    </div>
                    <div class="flex flex-col lg:flex-row lg:items-center space-y-2 lg:space-y-0 lg:space-x-4">
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            <input type="text" placeholder="Search Items" class="bg-gray-800 border border-gray-700 rounded px-3 py-2 text-white placeholder-gray-400 focus:outline-none focus:border-crypto-primary flex-1 lg:w-auto">
                        </div>
                        <div class="flex items-center space-x-2">
                            <select class="bg-gray-800 border border-gray-700 rounded px-3 py-2 text-white focus:outline-none focus:border-crypto-primary flex-1 lg:w-auto">
                                <option>Price Low - High</option>
                                <option>Price High - Low</option>
                                <option>Recently Listed</option>
                            </select>
                            <div class="flex items-center space-x-2">
                                <button class="p-2 bg-gray-800 rounded hover:bg-gray-700">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                    </svg>
                                </button>
                                <button class="p-2 bg-gray-700 rounded">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Items Count and Actions -->
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between space-y-2 lg:space-y-0 mb-4">
                    <span class="text-gray-400 text-sm lg:text-base">27 Items, updated 1 Mins ago</span>
                    <div class="flex items-center space-x-4">
                        <button class="bg-crypto-primary text-black px-4 py-2 rounded font-semibold hover:bg-yellow-500">
                            Buy Now
                        </button>
                        <button class="text-gray-400 hover:text-white">Clear All</button>
                    </div>
                </div>

                <!-- NFT Grid -->
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-3 lg:gap-4">
                    <!-- NFT Item 1 -->
                    <div class="bg-gray-900 rounded-lg overflow-hidden hover:bg-gray-800 transition-colors">
                        <div class="relative">
                            <div class="nft-art w-full h-32 lg:h-48 flex items-center justify-center">
                                <span class="text-white text-2xl lg:text-4xl">🐱</span>
                            </div>
                            <div class="absolute top-2 left-2 bg-black bg-opacity-70 text-white text-xs px-2 py-1 rounded">
                                ⏰ 4 Days left
                            </div>
                            <a href="/nft/collection" class="absolute w-full h-full top-0 start-0"></a>
                        </div>
                        <div class="p-2 lg:p-3">
                            <div class="text-white font-semibold mb-1 text-sm lg:text-base">PKG#1644</div>
                            <div class="text-gray-400 text-xs lg:text-sm mb-2">Price: 36USD</div>
                        </div>
                    </div>

                    <!-- NFT Item 2 -->
                    <div class="bg-gray-900 rounded-lg overflow-hidden hover:bg-gray-800 transition-colors">
                        <div class="relative">
                            <div class="nft-art-2 w-full h-32 lg:h-48 flex items-center justify-center">
                                <span class="text-white text-2xl lg:text-4xl">😸</span>
                            </div>
                            <div class="absolute top-2 left-2 bg-black bg-opacity-70 text-white text-xs px-2 py-1 rounded">
                                ⏰ 1 Days left
                            </div>
                        </div>
                        <div class="p-2 lg:p-3">
                            <div class="text-white font-semibold mb-1 text-sm lg:text-base">PKG#1626</div>
                            <div class="text-gray-400 text-xs lg:text-sm mb-2">Price: 50USD</div>
                        </div>
                    </div>

                    <!-- NFT Item 3 -->
                    <div class="bg-gray-900 rounded-lg overflow-hidden hover:bg-gray-800 transition-colors">
                        <div class="relative">
                            <div class="nft-art-3 w-full h-32 lg:h-48 flex items-center justify-center">
                                <span class="text-white text-2xl lg:text-4xl">😺</span>
                            </div>
                            <div class="absolute top-2 left-2 bg-black bg-opacity-70 text-white text-xs px-2 py-1 rounded">
                                ⏰ 1 Days left
                            </div>
                        </div>
                        <div class="p-2 lg:p-3">
                            <div class="text-white font-semibold mb-1 text-sm lg:text-base">PKG#3834</div>
                            <div class="text-gray-400 text-xs lg:text-sm mb-2">Price: 65.31U</div>
                        </div>
                    </div>

                    <!-- NFT Item 4 -->
                    <div class="bg-gray-900 rounded-lg overflow-hidden hover:bg-gray-800 transition-colors">
                        <div class="relative">
                            <div class="nft-art-4 w-full h-32 lg:h-48 flex items-center justify-center">
                                <span class="text-white text-2xl lg:text-4xl">😻</span>
                            </div>
                            <div class="absolute top-2 left-2 bg-black bg-opacity-70 text-white text-xs px-2 py-1 rounded">
                                ⏰ 2 Days left
                            </div>
                        </div>
                        <div class="p-2 lg:p-3">
                            <div class="text-white font-semibold mb-1 text-sm lg:text-base">PKG#3521</div>
                            <div class="text-gray-400 text-xs lg:text-sm mb-2">Price: 85USD</div>
                        </div>
                    </div>

                    <!-- NFT Item 5 -->
                    <div class="bg-gray-900 rounded-lg overflow-hidden hover:bg-gray-800 transition-colors">
                        <div class="relative">
                            <div class="nft-art-5 w-full h-32 lg:h-48 flex items-center justify-center">
                                <span class="text-white text-2xl lg:text-4xl">😽</span>
                            </div>
                            <div class="absolute top-2 left-2 bg-black bg-opacity-70 text-white text-xs px-2 py-1 rounded">
                                ⏰ 20 Days left
                            </div>
                        </div>
                        <div class="p-2 lg:p-3">
                            <div class="text-white font-semibold mb-1 text-sm lg:text-base">PKG#0234</div>
                            <div class="text-gray-400 text-xs lg:text-sm mb-2">Price: 130.62U</div>
                        </div>
                    </div>

                    <!-- NFT Item 6 -->
                    <div class="bg-gray-900 rounded-lg overflow-hidden hover:bg-gray-800 transition-colors">
                        <div class="relative">
                            <div class="nft-art-6 w-full h-32 lg:h-48 flex items-center justify-center">
                                <span class="text-white text-2xl lg:text-4xl">🙀</span>
                            </div>
                            <div class="absolute top-2 left-2 bg-black bg-opacity-70 text-white text-xs px-2 py-1 rounded">
                                ⏰ 3 Days left
                            </div>
                        </div>
                        <div class="p-2 lg:p-3">
                            <div class="text-white font-semibold mb-1 text-sm lg:text-base">PKG#1000</div>
                            <div class="text-gray-400 text-xs lg:text-sm mb-2">Price: 170U...</div>
                        </div>
                    </div>

                    <!-- NFT Item 7 -->
                    <div class="bg-gray-900 rounded-lg overflow-hidden hover:bg-gray-800 transition-colors">
                        <div class="relative">
                            <div class="nft-art-7 w-full h-32 lg:h-48 flex items-center justify-center">
                                <span class="text-white text-2xl lg:text-4xl">😿</span>
                            </div>
                            <div class="absolute top-2 left-2 bg-black bg-opacity-70 text-white text-xs px-2 py-1 rounded">
                                ⏰ 5 Days left
                            </div>
                        </div>
                        <div class="p-2 lg:p-3">
                            <div class="text-white font-semibold mb-1 text-sm lg:text-base">PKG#2803</div>
                            <div class="text-gray-400 text-xs lg:text-sm mb-2">Price: 250U...</div>
                        </div>
                    </div>

                    <!-- NFT Item 8 -->
                    <div class="bg-gray-900 rounded-lg overflow-hidden hover:bg-gray-800 transition-colors">
                        <div class="relative">
                            <div class="nft-art-8 w-full h-32 lg:h-48 flex items-center justify-center">
                                <span class="text-white text-2xl lg:text-4xl">😾</span>
                            </div>
                            <div class="absolute top-2 left-2 bg-black bg-opacity-70 text-white text-xs px-2 py-1 rounded">
                                ⏰ 6 Days left
                            </div>
                        </div>
                        <div class="p-2 lg:p-3">
                            <div class="text-white font-semibold mb-1 text-sm lg:text-base">PKG#2655</div>
                            <div class="text-gray-400 text-xs lg:text-sm mb-2">Price: 261.22U</div>
                        </div>
                    </div>

                    <!-- NFT Item 9 -->
                    <div class="bg-gray-900 rounded-lg overflow-hidden hover:bg-gray-800 transition-colors">
                        <div class="relative">
                            <div class="nft-art-9 w-full h-32 lg:h-48 flex items-center justify-center">
                                <span class="text-white text-2xl lg:text-4xl">🐈</span>
                            </div>
                            <div class="absolute top-2 left-2 bg-black bg-opacity-70 text-white text-xs px-2 py-1 rounded">
                                ⏰ 6 Days left
                            </div>
                        </div>
                        <div class="p-2 lg:p-3">
                            <div class="text-white font-semibold mb-1 text-sm lg:text-base">PKG#4717</div>
                            <div class="text-gray-400 text-xs lg:text-sm mb-2">Price: 261.24U</div>
                        </div>
                    </div>

                    <!-- NFT Item 10 -->
                    <div class="bg-gray-900 rounded-lg overflow-hidden hover:bg-gray-800 transition-colors">
                        <div class="relative">
                            <div class="nft-art-10 w-full h-32 lg:h-48 flex items-center justify-center">
                                <span class="text-white text-2xl lg:text-4xl">🐈‍⬛</span>
                            </div>
                            <div class="absolute top-2 left-2 bg-black bg-opacity-70 text-white text-xs px-2 py-1 rounded">
                                ⏰ 6 Days left
                            </div>
                        </div>
                        <div class="p-2 lg:p-3">
                            <div class="text-white font-semibold mb-1 text-sm lg:text-base">PKG#2698</div>
                            <div class="text-gray-400 text-xs lg:text-sm mb-2">Price: 293.9U</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar - Charts (Hidden on mobile/tablet) -->
            <div class="hidden xl:block w-80 border-l border-gray-800 p-6">
                <!-- Trades & Floor Price Chart -->
                <div class="mb-8">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-white font-semibold">Trades & Floor Price</h3>
                        <div class="flex items-center space-x-2 text-sm">
                            <button class="text-crypto-primary">7D</button>
                            <button class="text-gray-400">15D</button>
                            <button class="text-gray-400">30D</button>
                            <button class="text-gray-400">All</button>
                            <button class="text-gray-400">📊</button>
                        </div>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-4 h-64">
                        <!-- Chart placeholder -->
                        <div class="w-full h-full bg-gray-800 rounded flex items-center justify-center">
                            <span class="text-gray-500">Price Chart</span>
                        </div>
                    </div>
                </div>

                <!-- Listing Price Range -->
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-white font-semibold">Listing Price Range</h3>
                        <div class="flex items-center space-x-2">
                            <span class="text-gray-400">Bucket Size</span>
                            <select class="bg-gray-800 border border-gray-700 rounded px-2 py-1 text-white text-sm">
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-4 h-64">
                        <!-- Chart placeholder -->
                        <div class="w-full h-full bg-gray-800 rounded flex items-center justify-center">
                            <span class="text-gray-500">Distribution Chart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
