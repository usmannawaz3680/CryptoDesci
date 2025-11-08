@extends('web.layout.app')
@section('title', 'NFT Item')
@push('style')
    <style>
        .container {
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><pattern id="city" x="0" y="0" width="100" height="100" patternUnits="userSpaceOnUse"><rect width="100" height="100" fill="%23131314"/><rect x="10" y="20" width="15" height="60" fill="%231a1a1a"/><rect x="30" y="10" width="20" height="70" fill="%231a1a1a"/><rect x="55" y="25" width="12" height="55" fill="%231a1a1a"/><rect x="75" y="15" width="18" height="65" fill="%231a1a1a"/></pattern></defs><rect width="1000" height="1000" fill="url(%23city)"/></svg>');
        }

        .nft-card-1 {
            background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
        }

        .nft-card-2 {
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        }

        .nft-card-3 {
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
        }

        .nft-card-4 {
            background: linear-gradient(135deg, #a18cd1 0%, #fbc2eb 100%);
        }

        .nft-card-5 {
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        }

        .nft-card-6 {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        }

        .nft-card-7 {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        .nft-card-8 {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .nft-card-9 {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }

        .nft-card-10 {
            background: linear-gradient(135deg, #ff8a80 0%, #ea4c89 100%);
        }

        .nft-card-11 {
            background: linear-gradient(135deg, #96fbc4 0%, #f9f586 100%);
        }

        .nft-card-12 {
            background: linear-gradient(135deg, #ffeaa7 0%, #fab1a0 100%);
        }

        .featured-nft {
            background: linear-gradient(135deg, #d4af37 0%, #ffd700 100%);
        }
    </style>
@endpush
@section('content')
    <div class="container mx-auto px-4 py-6 max-w-7xl">
        <!-- Featured NFT Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
            <!-- Left Side - Featured NFT Image -->
            <div class="space-y-4">
                <div class="bg-crypto-accent rounded-2xl overflow-hidden border border-gray-800">
                    <div class="featured-nft aspect-square flex items-center justify-center p-8">
                        <div class="text-center">
                            <div class="text-8xl mb-4">🐻</div>
                            <div class="text-2xl font-bold text-gray-800">ShadowHunt</div>
                        </div>
                    </div>
                </div>

                <!-- NFT Details Tabs -->
                <div class="bg-crypto-accent rounded-xl border border-gray-800">
                    <div class="border-b border-gray-800">
                        <nav class="flex space-x-8 px-6">
                            <button class="py-4 text-crypto-primary border-b-2 border-crypto-primary font-medium">Details</button>
                            <button class="py-4 text-gray-400 hover:text-white">Price History</button>
                            <button class="py-4 text-gray-400 hover:text-white">Listings</button>
                            <button class="py-4 text-gray-400 hover:text-white">Offers</button>
                        </nav>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex justify-between">
                            <span class="text-gray-400">Contract Address</span>
                            <span class="text-white font-mono text-sm">0x41dc...246f</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Token ID</span>
                            <span class="text-white">22672</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Token Standard</span>
                            <span class="text-white">ERC-721</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Blockchain</span>
                            <span class="text-white">Ethereum</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - NFT Info and Purchase -->
            <div class="space-y-6">
                <!-- Collection Info -->
                <div>
                    <div class="text-crypto-primary text-sm font-medium mb-2">DX Terminal Collection</div>
                    <h1 class="text-4xl font-bold mb-4">ShadowHunt</h1>
                    <div class="flex items-center space-x-4 text-sm text-gray-400 mb-6">
                        <span>Owned by <span class="text-crypto-primary">terminal_user</span></span>
                        <span>•</span>
                        <div class="flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <span>4.2</span>
                        </div>
                        <span>•</span>
                        <span>👁 1.2K views</span>
                        <span>•</span>
                        <span>❤️ 89 favorites</span>
                    </div>
                </div>

                <!-- Price Section -->
                <div class="bg-crypto-accent rounded-xl border border-gray-800 p-6">
                    <div class="mb-4">
                        <div class="text-gray-400 text-sm mb-1">Current price</div>
                        <div class="flex items-baseline space-x-2">
                            <span class="text-3xl font-bold">0.0843</span>
                            <span class="text-xl text-gray-400">ETH</span>
                            <span class="text-gray-400">($156.78)</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <button class="bg-crypto-primary text-black py-3 px-6 rounded-lg font-semibold hover:bg-crypto-primary/80 transition-colors">
                            Buy now
                        </button>
                        <button class="border border-gray-600 py-3 px-6 rounded-lg font-semibold hover:border-gray-500 transition-colors">
                            Make offer
                        </button>
                    </div>

                    <div class="border-t border-gray-800 pt-4">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-400">Service fee</span>
                            <span class="text-white">2.5%</span>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="bg-crypto-accent rounded-xl border border-gray-800 p-6">
                    <button type="button" class="flex items-center justify-between w-full text-left" data-collapse-toggle="description-collapse" aria-expanded="true" aria-controls="description-collapse">
                        <h3 class="text-lg font-semibold">Description</h3>
                        <svg class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="description-collapse" class="mt-4">
                        <p class="text-gray-300 leading-relaxed">
                            ShadowHunt is a unique digital collectible from the DX Terminal universe. This character represents the mysterious hunters who navigate the cyberpunk cityscape, equipped with advanced technology and stealth capabilities.
                        </p>
                    </div>
                </div>

                <!-- Properties -->
                <div class="bg-crypto-accent rounded-xl border border-gray-800 p-6">
                    <button type="button" class="flex items-center justify-between w-full text-left mb-4" data-collapse-toggle="properties-collapse" aria-expanded="false" aria-controls="properties-collapse">
                        <h3 class="text-lg font-semibold">Properties</h3>
                        <svg class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="properties-collapse" class="hidden">
                        <div class="grid grid-cols-2 gap-3">
                            <div class="bg-gray-800 rounded-lg p-3 text-center">
                                <div class="text-crypto-primary text-sm font-medium">Background</div>
                                <div class="text-white font-semibold">Cyberpunk City</div>
                                <div class="text-xs text-gray-400">12% have this trait</div>
                            </div>
                            <div class="bg-gray-800 rounded-lg p-3 text-center">
                                <div class="text-crypto-primary text-sm font-medium">Character</div>
                                <div class="text-white font-semibold">Bear Hunter</div>
                                <div class="text-xs text-gray-400">8% have this trait</div>
                            </div>
                            <div class="bg-gray-800 rounded-lg p-3 text-center">
                                <div class="text-crypto-primary text-sm font-medium">Rarity</div>
                                <div class="text-white font-semibold">Legendary</div>
                                <div class="text-xs text-gray-400">3% have this trait</div>
                            </div>
                            <div class="bg-gray-800 rounded-lg p-3 text-center">
                                <div class="text-crypto-primary text-sm font-medium">Power Level</div>
                                <div class="text-white font-semibold">Elite</div>
                                <div class="text-xs text-gray-400">5% have this trait</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Collection Items Section -->
        <div class="border-t border-gray-800 pt-8">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar Filters -->
                <div class="lg:w-64 space-y-6">
                    <!-- Mobile Filter Toggle -->
                    <div class="lg:hidden">
                        <button type="button" class="flex items-center space-x-2 text-white bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded-lg w-full justify-center" data-drawer-target="collection-filters" data-drawer-show="collection-filters" aria-controls="collection-filters">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.414A1 1 0 013 6.707V4z" />
                            </svg>
                            <span>Filter Collection</span>
                        </button>
                    </div>

                    <!-- Desktop Filters -->
                    <div class="hidden lg:block space-y-6">
                        <h2 class="text-xl font-bold">More from this collection</h2>

                        <!-- Status Filter -->
                        <div>
                            <button type="button" class="flex items-center justify-between w-full text-white font-semibold mb-3 hover:text-crypto-primary" data-collapse-toggle="status-filter" aria-expanded="true" aria-controls="status-filter">
                                <span>Status</span>
                                <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div id="status-filter" class="space-y-2">
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                                    <span class="text-gray-300">Buy Now</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                                    <span class="text-gray-300">On Auction</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                                    <span class="text-gray-300">New</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                                    <span class="text-gray-300">Has Offers</span>
                                </label>
                            </div>
                        </div>

                        <!-- Price Filter -->
                        <div>
                            <button type="button" class="flex items-center justify-between w-full text-white font-semibold mb-3 hover:text-crypto-primary" data-collapse-toggle="price-filter" aria-expanded="false" aria-controls="price-filter">
                                <span>Price</span>
                                <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div id="price-filter" class="hidden space-y-3">
                                <select class="w-full bg-gray-800 border border-gray-700 rounded px-3 py-2 text-white focus:outline-none focus:border-crypto-primary">
                                    <option>USD</option>
                                    <option>ETH</option>
                                </select>
                                <div class="flex space-x-2">
                                    <input type="number" placeholder="Min" class="flex-1 bg-gray-800 border border-gray-700 rounded px-3 py-2 text-white placeholder-gray-400 focus:outline-none focus:border-crypto-primary">
                                    <input type="number" placeholder="Max" class="flex-1 bg-gray-800 border border-gray-700 rounded px-3 py-2 text-white placeholder-gray-400 focus:outline-none focus:border-crypto-primary">
                                </div>
                                <button class="w-full bg-crypto-primary text-black py-2 rounded font-semibold hover:bg-crypto-primary/80">Apply</button>
                            </div>
                        </div>

                        <!-- Rarity Filter -->
                        <div>
                            <button type="button" class="flex items-center justify-between w-full text-white font-semibold mb-3 hover:text-crypto-primary" data-collapse-toggle="rarity-filter" aria-expanded="false" aria-controls="rarity-filter">
                                <span>Rarity</span>
                                <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div id="rarity-filter" class="hidden space-y-2">
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                                    <span class="text-gray-300">Common</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                                    <span class="text-gray-300">Rare</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                                    <span class="text-gray-300">Epic</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                                    <span class="text-gray-300">Legendary</span>
                                </label>
                            </div>
                        </div>

                        <!-- Character Type Filter -->
                        <div>
                            <button type="button" class="flex items-center justify-between w-full text-white font-semibold mb-3 hover:text-crypto-primary" data-collapse-toggle="character-filter" aria-expanded="false" aria-controls="character-filter">
                                <span>Character Type</span>
                                <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div id="character-filter" class="hidden space-y-2">
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                                    <span class="text-gray-300">Hunter</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                                    <span class="text-gray-300">Warrior</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                                    <span class="text-gray-300">Mage</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" class="rounded border-gray-600 bg-gray-700 text-crypto-primary focus:ring-crypto-primary">
                                    <span class="text-gray-300">Assassin</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mobile Filter Drawer -->
                <div id="collection-filters" class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-crypto-accent w-80 border-r border-gray-800" tabindex="-1">
                    <h5 class="inline-flex items-center mb-4 text-base font-semibold text-white">
                        <svg class="w-4 h-4 me-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.414A1 1 0 013 6.707V4z" />
                        </svg>
                        Collection Filters
                    </h5>
                    <button type="button" data-drawer-hide="collection-filters" class="text-gray-400 bg-transparent hover:bg-gray-600 hover:text-white rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 flex items-center justify-center">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                    <!-- Mobile filter content would go here, similar to desktop -->
                </div>

                <!-- Collection Grid -->
                <div class="flex-1">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center space-x-4">
                            <span class="text-gray-400">2,847 items</span>
                        </div>
                        <div class="flex items-center space-x-4">
                            <select class="bg-gray-800 border border-gray-700 rounded px-3 py-2 text-white focus:outline-none focus:border-crypto-primary">
                                <option>Recently Listed</option>
                                <option>Price: Low to High</option>
                                <option>Price: High to Low</option>
                                <option>Most Favorited</option>
                            </select>
                        </div>
                    </div>

                    <!-- NFT Grid -->
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                        <!-- NFT Card 1 -->
                        <div class="bg-crypto-accent rounded-lg overflow-hidden hover:bg-gray-800 transition-all duration-300 border border-gray-800 hover:border-gray-700">
                            <div class="nft-card-1 aspect-square flex items-center justify-center">
                                <span class="text-4xl">🦊</span>
                            </div>
                            <div class="p-3">
                                <div class="text-white font-semibold mb-1 text-sm">CyberFox</div>
                                <div class="text-crypto-primary font-bold text-sm">0.045 ETH</div>
                                <div class="text-gray-400 text-xs">Last: 0.042 ETH</div>
                            </div>
                        </div>

                        <!-- NFT Card 2 -->
                        <div class="bg-crypto-accent rounded-lg overflow-hidden hover:bg-gray-800 transition-all duration-300 border border-gray-800 hover:border-gray-700">
                            <div class="nft-card-2 aspect-square flex items-center justify-center">
                                <span class="text-4xl">🐺</span>
                            </div>
                            <div class="p-3">
                                <div class="text-white font-semibold mb-1 text-sm">NeonWolf</div>
                                <div class="text-crypto-primary font-bold text-sm">0.067 ETH</div>
                                <div class="text-gray-400 text-xs">Last: 0.065 ETH</div>
                            </div>
                        </div>

                        <!-- NFT Card 3 -->
                        <div class="bg-crypto-accent rounded-lg overflow-hidden hover:bg-gray-800 transition-all duration-300 border border-gray-800 hover:border-gray-700">
                            <div class="nft-card-3 aspect-square flex items-center justify-center">
                                <span class="text-4xl">🐱</span>
                            </div>
                            <div class="p-3">
                                <div class="text-white font-semibold mb-1 text-sm">QuantumCat</div>
                                <div class="text-crypto-primary font-bold text-sm">0.089 ETH</div>
                                <div class="text-gray-400 text-xs">Last: 0.081 ETH</div>
                            </div>
                        </div>

                        <!-- NFT Card 4 -->
                        <div class="bg-crypto-accent rounded-lg overflow-hidden hover:bg-gray-800 transition-all duration-300 border border-gray-800 hover:border-gray-700">
                            <div class="nft-card-4 aspect-square flex items-center justify-center">
                                <span class="text-4xl">🐸</span>
                            </div>
                            <div class="p-3">
                                <div class="text-white font-semibold mb-1 text-sm">TechFrog</div>
                                <div class="text-crypto-primary font-bold text-sm">0.034 ETH</div>
                                <div class="text-gray-400 text-xs">Last: 0.032 ETH</div>
                            </div>
                        </div>

                        <!-- NFT Card 5 -->
                        <div class="bg-crypto-accent rounded-lg overflow-hidden hover:bg-gray-800 transition-all duration-300 border border-gray-800 hover:border-gray-700">
                            <div class="nft-card-5 aspect-square flex items-center justify-center">
                                <span class="text-4xl">🐰</span>
                            </div>
                            <div class="p-3">
                                <div class="text-white font-semibold mb-1 text-sm">DigitalRabbit</div>
                                <div class="text-crypto-primary font-bold text-sm">0.056 ETH</div>
                                <div class="text-gray-400 text-xs">Last: 0.054 ETH</div>
                            </div>
                        </div>

                        <!-- NFT Card 6 -->
                        <div class="bg-crypto-accent rounded-lg overflow-hidden hover:bg-gray-800 transition-all duration-300 border border-gray-800 hover:border-gray-700">
                            <div class="nft-card-6 aspect-square flex items-center justify-center">
                                <span class="text-4xl">🐯</span>
                            </div>
                            <div class="p-3">
                                <div class="text-white font-semibold mb-1 text-sm">CyberTiger</div>
                                <div class="text-crypto-primary font-bold text-sm">0.123 ETH</div>
                                <div class="text-gray-400 text-xs">Last: 0.118 ETH</div>
                            </div>
                        </div>

                        <!-- NFT Card 7 -->
                        <div class="bg-crypto-accent rounded-lg overflow-hidden hover:bg-gray-800 transition-all duration-300 border border-gray-800 hover:border-gray-700">
                            <div class="nft-card-7 aspect-square flex items-center justify-center">
                                <span class="text-4xl">🐨</span>
                            </div>
                            <div class="p-3">
                                <div class="text-white font-semibold mb-1 text-sm">PixelKoala</div>
                                <div class="text-crypto-primary font-bold text-sm">0.078 ETH</div>
                                <div class="text-gray-400 text-xs">Last: 0.075 ETH</div>
                            </div>
                        </div>

                        <!-- NFT Card 8 -->
                        <div class="bg-crypto-accent rounded-lg overflow-hidden hover:bg-gray-800 transition-all duration-300 border border-gray-800 hover:border-gray-700">
                            <div class="nft-card-8 aspect-square flex items-center justify-center">
                                <span class="text-4xl">🐼</span>
                            </div>
                            <div class="p-3">
                                <div class="text-white font-semibold mb-1 text-sm">NeonPanda</div>
                                <div class="text-crypto-primary font-bold text-sm">0.092 ETH</div>
                                <div class="text-gray-400 text-xs">Last: 0.089 ETH</div>
                            </div>
                        </div>

                        <!-- NFT Card 9 -->
                        <div class="bg-crypto-accent rounded-lg overflow-hidden hover:bg-gray-800 transition-all duration-300 border border-gray-800 hover:border-gray-700">
                            <div class="nft-card-9 aspect-square flex items-center justify-center">
                                <span class="text-4xl">🦁</span>
                            </div>
                            <div class="p-3">
                                <div class="text-white font-semibold mb-1 text-sm">DigitalLion</div>
                                <div class="text-crypto-primary font-bold text-sm">0.156 ETH</div>
                                <div class="text-gray-400 text-xs">Last: 0.149 ETH</div>
                            </div>
                        </div>

                        <!-- NFT Card 10 -->
                        <div class="bg-crypto-accent rounded-lg overflow-hidden hover:bg-gray-800 transition-all duration-300 border border-gray-800 hover:border-gray-700">
                            <div class="nft-card-10 aspect-square flex items-center justify-center">
                                <span class="text-4xl">🐵</span>
                            </div>
                            <div class="p-3">
                                <div class="text-white font-semibold mb-1 text-sm">CyberMonkey</div>
                                <div class="text-crypto-primary font-bold text-sm">0.087 ETH</div>
                                <div class="text-gray-400 text-xs">Last: 0.084 ETH</div>
                            </div>
                        </div>

                        <!-- NFT Card 11 -->
                        <div class="bg-crypto-accent rounded-lg overflow-hidden hover:bg-gray-800 transition-all duration-300 border border-gray-800 hover:border-gray-700">
                            <div class="nft-card-11 aspect-square flex items-center justify-center">
                                <span class="text-4xl">🐧</span>
                            </div>
                            <div class="p-3">
                                <div class="text-white font-semibold mb-1 text-sm">TechPenguin</div>
                                <div class="text-crypto-primary font-bold text-sm">0.043 ETH</div>
                                <div class="text-gray-400 text-xs">Last: 0.041 ETH</div>
                            </div>
                        </div>

                        <!-- NFT Card 12 -->
                        <div class="bg-crypto-accent rounded-lg overflow-hidden hover:bg-gray-800 transition-all duration-300 border border-gray-800 hover:border-gray-700">
                            <div class="nft-card-12 aspect-square flex items-center justify-center">
                                <span class="text-4xl">🦉</span>
                            </div>
                            <div class="p-3">
                                <div class="text-white font-semibold mb-1 text-sm">QuantumOwl</div>
                                <div class="text-crypto-primary font-bold text-sm">0.098 ETH</div>
                                <div class="text-gray-400 text-xs">Last: 0.095 ETH</div>
                            </div>
                        </div>

                        <!-- Additional cards would continue here... -->
                        <!-- Repeat pattern for more NFT cards -->
                    </div>

                    <!-- Load More Button -->
                    <div class="text-center mt-8">
                        <button class="bg-gray-800 hover:bg-gray-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors border border-gray-700 hover:border-gray-600">
                            Load More Items
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
