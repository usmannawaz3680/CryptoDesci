@extends('web.layout.app')
@section('title', 'NFT')
@section('content')
    <!-- Hero Section with Detailed NFT Cards -->
    <section class="bg-binance-dark py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold mb-4 leading-tight">
                        One-stop platform for all things NFTs
                    </h1>
                    <p class="text-gray-300 text-lg mb-8">
                        Trade, Stake and Loan NFTs securely on Binance NFT
                    </p>
                </div>

                <!-- Right Content - Detailed NFT Showcase Grid -->
                <div class="relative">
                    <div class="grid grid-cols-2 gap-3">
                        <!-- Top Row -->
                        <div class="bg-gradient-to-br from-crypto-primary via-yellow-500 to-orange-500 rounded-xl p-4 text-black relative overflow-hidden">
                            <div class="absolute top-2 left-2 bg-black/20 text-xs px-2 py-1 rounded text-white">Sponsored</div>
                            <div class="mt-6">
                                <div class="text-2xl font-bold mb-1">Ape NFT</div>
                                <div class="text-sm opacity-80">Collection</div>
                            </div>
                            <div class="absolute -right-4 -bottom-4 w-16 h-16 bg-black/10 rounded-full"></div>
                        </div>

                        <div class="bg-binance-card rounded-xl p-4 border border-gray-700 relative">
                            <div class="text-xs text-crypto-primary mb-2">5 minutes left</div>
                            <div class="text-sm font-bold mb-1 text-crypto-primary">NFT VIP PROGRAM</div>
                            <div class="text-xs text-gray-400">LAUNCHES</div>
                            <div class="absolute top-2 right-2 w-6 h-6 bg-crypto-primary rounded text-black text-xs flex items-center justify-center font-bold">!</div>
                        </div>

                        <!-- Bottom Row -->
                        <div class="bg-binance-card rounded-xl p-4 border border-gray-700 relative">
                            <div class="text-xs text-gray-400 mb-2">5 minutes left</div>
                            <div class="text-sm font-bold mb-1 text-red-400">EXPLORE</div>
                            <div class="text-xs text-gray-400">NFT FAQS</div>
                            <div class="absolute bottom-2 right-2 text-red-400">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>

                        <div class="bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500 rounded-xl p-4 text-white relative overflow-hidden">
                            <div class="absolute top-2 left-2 bg-white/20 text-xs px-2 py-1 rounded">New</div>
                            <div class="mt-6">
                                <div class="text-lg font-bold mb-1">3D Assets</div>
                                <div class="text-sm opacity-80">Collection</div>
                            </div>
                            <div class="absolute -right-2 -bottom-2 w-12 h-12 bg-white/10 rounded-lg transform rotate-12"></div>
                        </div>
                    </div>

                    <!-- Floating 3D NFT Icon -->
                    <div class="absolute -top-4 -right-4 w-20 h-20 bg-gradient-to-br from-crypto-primary to-orange-500 rounded-lg transform rotate-12 opacity-80 flex items-center justify-center">
                        <div class="w-12 h-12 bg-white/20 rounded border-2 border-white/30"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NFT Collections Table Section with Exact Data -->
    <section class="bg-binance-dark py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Tabs -->
            <div class="mb-6">
                <ul class="flex flex-wrap text-sm font-medium text-center text-gray-400 border-b border-gray-700" id="nft-tabs" data-tabs-toggle="#nft-tab-content" role="tablist">
                    <li class="me-8" role="presentation">
                        <button class="inline-block pb-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-300 hover:border-gray-600 text-gray-400" id="trending-tab" data-tabs-target="#trending" type="button" role="tab" aria-controls="trending" aria-selected="false">
                            Trending
                        </button>
                    </li>
                    <li class="me-8" role="presentation">
                        <button class="inline-block pb-4 text-crypto-primary border-b-2 border-crypto-primary rounded-t-lg active font-medium" id="top-tab" data-tabs-target="#top" type="button" role="tab" aria-controls="top" aria-selected="true">
                            Top
                        </button>
                    </li>
                </ul>
            </div>

            <!-- Tab Content -->
            <div id="nft-tab-content">
                <!-- Top Tab (Active) - Exact Layout with 2 Columns -->
                <div class="" id="top" role="tabpanel" aria-labelledby="top-tab">
                    <!-- Table Headers -->
                    <div class="grid grid-cols-2 gap-8 mb-4">
                        <div class="flex text-xs text-gray-400 uppercase tracking-wider px-4">
                            <div class="w-8">#</div>
                            <div class="flex-1">Collections</div>
                            <div class="w-24 text-right">Floor Price</div>
                            <div class="w-24 text-right">Volume</div>
                        </div>
                        <div class="flex text-xs text-gray-400 uppercase tracking-wider px-4">
                            <div class="w-8">#</div>
                            <div class="flex-1">Collections</div>
                            <div class="w-24 text-right">Floor Price</div>
                            <div class="w-24 text-right">Volume</div>
                        </div>
                    </div>

                    <!-- Data Rows - Exact Match -->
                    <div class="space-y-1">
                        <!-- Row 1 -->
                        <div class="grid grid-cols-2 gap-8 hover:bg-binance-gray/30 rounded-lg transition-colors">
                            <!-- Left Column - Rank 1 -->
                            <div class="flex items-center py-3 px-4 relative hover:bg-crypto-accent/70 cursor-pointer rounded-lg duration-200 hover:scale-105">
                                <div class="w-8 text-gray-400 text-sm">1</div>
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-red-500 rounded-full flex items-center justify-center relative">
                                        <span class="text-white font-bold text-sm">🦊</span>
                                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-blue-500 rounded-full flex items-center justify-center">
                                            <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-medium text-white text-sm">Fluffy Metaverse</div>
                                        <div class="text-xs text-gray-400">Verified</div>
                                    </div>
                                    <a href="/nft/profile" class="absolute h-full w-full top-0 start-0 left-0"></a>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">4.83 ETH</div>
                                    <div class="text-red-400 text-xs">-1.4%</div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">2.2k ETH</div>
                                    <div class="text-green-400 text-xs">+42.1%</div>
                                </div>
                            </div>

                            <!-- Right Column - Rank 11 -->
                            <div class="flex items-center py-3 px-4 relative hover:bg-crypto-accent/70 cursor-pointer rounded-lg duration-200 hover:scale-105">
                                <div class="w-8 text-gray-400 text-sm">11</div>
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-pink-500 rounded-full flex items-center justify-center relative">
                                        <span class="text-white font-bold text-sm">B</span>
                                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-blue-500 rounded-full flex items-center justify-center">
                                            <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-medium text-white text-sm">BLANZ Official</div>
                                        <div class="text-xs text-gray-400">Verified</div>
                                    </div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">5.11 ETH</div>
                                    <div class="text-green-400 text-xs">+1.1%</div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">4.11 ETH</div>
                                    <div class="text-red-400 text-xs">-27.7%</div>
                                </div>
                                <a href="/nft/profile" class="absolute h-full w-full top-0 start-0 left-0"></a>
                            </div>
                        </div>

                        <!-- Row 2 -->
                        <div class="grid grid-cols-2 gap-8 hover:bg-binance-gray/30 rounded-lg transition-colors">
                            <div class="flex items-center py-3 px-4">
                                <div class="w-8 text-gray-400 text-sm">2</div>
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center relative">
                                        <span class="text-white font-bold text-sm">🐱</span>
                                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-blue-500 rounded-full flex items-center justify-center">
                                            <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-medium text-white text-sm">Proud Kitty Gang</div>
                                        <div class="text-xs text-gray-400">Verified</div>
                                    </div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">8.51 ETH</div>
                                    <div class="text-green-400 text-xs">+2.1%</div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">48.4k ETH</div>
                                    <div class="text-green-400 text-xs">+15.2%</div>
                                </div>
                            </div>

                            <div class="flex items-center py-3 px-4">
                                <div class="w-8 text-gray-400 text-sm">12</div>
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="w-10 h-10 bg-gradient-to-br from-pink-500 to-purple-500 rounded-full flex items-center justify-center relative">
                                        <span class="text-white font-bold text-sm">D</span>
                                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-blue-500 rounded-full flex items-center justify-center">
                                            <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-medium text-white text-sm">Doodles</div>
                                        <div class="text-xs text-gray-400">Verified</div>
                                    </div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">1.83 ETH</div>
                                    <div class="text-red-400 text-xs">-8.4%</div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">39.12 ETH</div>
                                    <div class="text-green-400 text-xs">+5.7%</div>
                                </div>
                            </div>
                        </div>

                        <!-- Row 3 -->
                        <div class="grid grid-cols-2 gap-8 hover:bg-binance-gray/30 rounded-lg transition-colors">
                            <div class="flex items-center py-3 px-4">
                                <div class="w-8 text-gray-400 text-sm">3</div>
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="w-10 h-10 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-full flex items-center justify-center relative">
                                        <span class="text-white font-bold text-sm">S</span>
                                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-blue-500 rounded-full flex items-center justify-center">
                                            <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-medium text-white text-sm">Sorare</div>
                                        <div class="text-xs text-gray-400">Verified</div>
                                    </div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">4.53 ETH</div>
                                    <div class="text-red-400 text-xs">-2.3%</div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">3.4k ETH</div>
                                    <div class="text-green-400 text-xs">+8.1%</div>
                                </div>
                            </div>

                            <div class="flex items-center py-3 px-4">
                                <div class="w-8 text-gray-400 text-sm">13</div>
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-teal-500 rounded-full flex items-center justify-center relative">
                                        <span class="text-white font-bold text-sm">LR</span>
                                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-blue-500 rounded-full flex items-center justify-center">
                                            <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-medium text-white text-sm">Lit Ragers</div>
                                        <div class="text-xs text-gray-400">Verified</div>
                                    </div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">1.89 ETH</div>
                                    <div class="text-red-400 text-xs">-8.4%</div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">34.57 ETH</div>
                                    <div class="text-red-400 text-xs">-6.1%</div>
                                </div>
                            </div>
                        </div>

                        <!-- Continue with remaining rows... -->
                        <!-- Row 4 -->
                        <div class="grid grid-cols-2 gap-8 hover:bg-binance-gray/30 rounded-lg transition-colors">
                            <div class="flex items-center py-3 px-4">
                                <div class="w-8 text-gray-400 text-sm">4</div>
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center relative">
                                        <span class="text-white font-bold text-sm">🏔️</span>
                                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-blue-500 rounded-full flex items-center justify-center">
                                            <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-medium text-white text-sm">Alpine Race Collectibles</div>
                                        <div class="text-xs text-gray-400">Verified</div>
                                    </div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">4.91 ETH</div>
                                    <div class="text-green-400 text-xs">+1.2%</div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">5.4k ETH</div>
                                    <div class="text-green-400 text-xs">+12.3%</div>
                                </div>
                            </div>

                            <div class="flex items-center py-3 px-4">
                                <div class="w-8 text-gray-400 text-sm">14</div>
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="w-10 h-10 bg-gradient-to-br from-teal-500 to-blue-500 rounded-full flex items-center justify-center relative">
                                        <span class="text-white font-bold text-sm">⚡</span>
                                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-blue-500 rounded-full flex items-center justify-center">
                                            <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-medium text-white text-sm">Pokemon - Generation 1</div>
                                        <div class="text-xs text-gray-400">Verified</div>
                                    </div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">5.89 ETH</div>
                                    <div class="text-green-400 text-xs">+2.1%</div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">2.47 ETH</div>
                                    <div class="text-red-400 text-xs">-1.8%</div>
                                </div>
                            </div>
                        </div>

                        <!-- Row 5 -->
                        <div class="grid grid-cols-2 gap-8 hover:bg-binance-gray/30 rounded-lg transition-colors">
                            <div class="flex items-center py-3 px-4">
                                <div class="w-8 text-gray-400 text-sm">5</div>
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="w-10 h-10 bg-gradient-to-br from-gray-600 to-gray-800 rounded-full flex items-center justify-center relative">
                                        <span class="text-white font-bold text-sm">🌍</span>
                                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-blue-500 rounded-full flex items-center justify-center">
                                            <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-medium text-white text-sm">Otherdeeds Expanded</div>
                                        <div class="text-xs text-gray-400">Verified</div>
                                    </div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">5.1k ETH</div>
                                    <div class="text-green-400 text-xs">+3.2%</div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">34.5k ETH</div>
                                    <div class="text-green-400 text-xs">+18.7%</div>
                                </div>
                            </div>

                            <div class="flex items-center py-3 px-4">
                                <div class="w-8 text-gray-400 text-sm">15</div>
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-teal-500 rounded-full flex items-center justify-center relative">
                                        <span class="text-white font-bold text-sm">🎄</span>
                                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-blue-500 rounded-full flex items-center justify-center">
                                            <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-medium text-white text-sm">Holidays in Snowland</div>
                                        <div class="text-xs text-gray-400">Verified</div>
                                    </div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">4.83 ETH</div>
                                    <div class="text-red-400 text-xs">-2.1%</div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">5.52 ETH</div>
                                    <div class="text-green-400 text-xs">+7.3%</div>
                                </div>
                            </div>
                        </div>

                        <!-- Continue with rows 6-10 following the same pattern... -->
                        <!-- I'll add a few more to complete the table -->

                        <!-- Row 6 -->
                        <div class="grid grid-cols-2 gap-8 hover:bg-binance-gray/30 rounded-lg transition-colors">
                            <div class="flex items-center py-3 px-4">
                                <div class="w-8 text-gray-400 text-sm">6</div>
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-full flex items-center justify-center relative">
                                        <span class="text-white font-bold text-sm">🎮</span>
                                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-blue-500 rounded-full flex items-center justify-center">
                                            <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-medium text-white text-sm">Moonbirds</div>
                                        <div class="text-xs text-gray-400">Verified</div>
                                    </div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">5.41 ETH</div>
                                    <div class="text-green-400 text-xs">+1.8%</div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">34.71 ETH</div>
                                    <div class="text-green-400 text-xs">+9.2%</div>
                                </div>
                            </div>

                            <div class="flex items-center py-3 px-4">
                                <div class="w-8 text-gray-400 text-sm">16</div>
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="w-10 h-10 bg-gradient-to-br from-cyan-500 to-blue-500 rounded-full flex items-center justify-center relative">
                                        <span class="text-white font-bold text-sm">HY</span>
                                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-blue-500 rounded-full flex items-center justify-center">
                                            <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-medium text-white text-sm">HV-MTL</div>
                                        <div class="text-xs text-gray-400">Verified</div>
                                    </div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">8.92 ETH</div>
                                    <div class="text-green-400 text-xs">+4.2%</div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">1.32 ETH</div>
                                    <div class="text-red-400 text-xs">-3.1%</div>
                                </div>
                            </div>
                        </div>

                        <!-- Row 10 -->
                        <div class="grid grid-cols-2 gap-8 hover:bg-binance-gray/30 rounded-lg transition-colors">
                            <div class="flex items-center py-3 px-4">
                                <div class="w-8 text-gray-400 text-sm">10</div>
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-orange-500 rounded-full flex items-center justify-center relative">
                                        <span class="text-white font-bold text-sm">🍔</span>
                                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-blue-500 rounded-full flex items-center justify-center">
                                            <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-medium text-white text-sm">FOOD FOR DEGENS</div>
                                        <div class="text-xs text-gray-400">Verified</div>
                                    </div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">4.83 ETH</div>
                                    <div class="text-red-400 text-xs">-1.2%</div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">5.1 ETH</div>
                                    <div class="text-green-400 text-xs">+2.8%</div>
                                </div>
                            </div>

                            <div class="flex items-center py-3 px-4">
                                <div class="w-8 text-gray-400 text-sm">20</div>
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="w-10 h-10 bg-gradient-to-br from-yellow-500 to-red-500 rounded-full flex items-center justify-center relative">
                                        <span class="text-white font-bold text-sm">🅱️</span>
                                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-blue-500 rounded-full flex items-center justify-center">
                                            <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-medium text-white text-sm">BEANZ</div>
                                        <div class="text-xs text-gray-400">Verified</div>
                                    </div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">5.50 ETH</div>
                                    <div class="text-green-400 text-xs">+3.4%</div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">1.51 ETH</div>
                                    <div class="text-red-400 text-xs">-1.2%</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- View All Button -->
                    <div class="text-center mt-8">
                        <button class="bg-binance-card hover:bg-binance-light-gray text-white px-8 py-3 rounded-lg transition-colors border border-gray-700 hover:border-gray-600">
                            View All
                        </button>
                    </div>
                </div>
                <div class="hidden" id="trending" role="tabpanel" aria-labelledby="trending-tab">
                    <!-- Table Headers -->
                    <div class="grid grid-cols-2 gap-8 mb-4">
                        <div class="flex text-xs text-gray-400 uppercase tracking-wider px-4">
                            <div class="w-8">#</div>
                            <div class="flex-1">Collections</div>
                            <div class="w-24 text-right">Floor Price</div>
                            <div class="w-24 text-right">Volume</div>
                        </div>
                        <div class="flex text-xs text-gray-400 uppercase tracking-wider px-4">
                            <div class="w-8">#</div>
                            <div class="flex-1">Collections</div>
                            <div class="w-24 text-right">Floor Price</div>
                            <div class="w-24 text-right">Volume</div>
                        </div>
                    </div>

                    <!-- Data Rows - Exact Match -->
                    <div class="space-y-1">
                        <!-- Row 1 -->
                        <div class="grid grid-cols-2 gap-8 hover:bg-binance-gray/30 rounded-lg transition-colors">
                            <!-- Left Column - Rank 1 -->
                            <div class="flex items-center py-3 px-4">
                                <div class="w-8 text-gray-400 text-sm">1</div>
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-red-500 rounded-full flex items-center justify-center relative">
                                        <span class="text-white font-bold text-sm">🦊</span>
                                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-blue-500 rounded-full flex items-center justify-center">
                                            <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-medium text-white text-sm">Fluffy Metaverse</div>
                                        <div class="text-xs text-gray-400">Verified</div>
                                    </div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">4.83 ETH</div>
                                    <div class="text-red-400 text-xs">-1.4%</div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">2.2k ETH</div>
                                    <div class="text-green-400 text-xs">+42.1%</div>
                                </div>
                            </div>

                            <!-- Right Column - Rank 11 -->
                            <div class="flex items-center py-3 px-4">
                                <div class="w-8 text-gray-400 text-sm">11</div>
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-pink-500 rounded-full flex items-center justify-center relative">
                                        <span class="text-white font-bold text-sm">B</span>
                                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-blue-500 rounded-full flex items-center justify-center">
                                            <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-medium text-white text-sm">BLANZ Official</div>
                                        <div class="text-xs text-gray-400">Verified</div>
                                    </div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">5.11 ETH</div>
                                    <div class="text-green-400 text-xs">+1.1%</div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">4.11 ETH</div>
                                    <div class="text-red-400 text-xs">-27.7%</div>
                                </div>
                            </div>
                        </div>

                        <!-- Row 2 -->
                        <div class="grid grid-cols-2 gap-8 hover:bg-binance-gray/30 rounded-lg transition-colors">
                            <div class="flex items-center py-3 px-4">
                                <div class="w-8 text-gray-400 text-sm">2</div>
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center relative">
                                        <span class="text-white font-bold text-sm">🐱</span>
                                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-blue-500 rounded-full flex items-center justify-center">
                                            <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-medium text-white text-sm">Proud Kitty Gang</div>
                                        <div class="text-xs text-gray-400">Verified</div>
                                    </div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">8.51 ETH</div>
                                    <div class="text-green-400 text-xs">+2.1%</div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">48.4k ETH</div>
                                    <div class="text-green-400 text-xs">+15.2%</div>
                                </div>
                            </div>

                            <div class="flex items-center py-3 px-4">
                                <div class="w-8 text-gray-400 text-sm">12</div>
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="w-10 h-10 bg-gradient-to-br from-pink-500 to-purple-500 rounded-full flex items-center justify-center relative">
                                        <span class="text-white font-bold text-sm">D</span>
                                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-blue-500 rounded-full flex items-center justify-center">
                                            <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-medium text-white text-sm">Doodles</div>
                                        <div class="text-xs text-gray-400">Verified</div>
                                    </div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">1.83 ETH</div>
                                    <div class="text-red-400 text-xs">-8.4%</div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">39.12 ETH</div>
                                    <div class="text-green-400 text-xs">+5.7%</div>
                                </div>
                            </div>
                        </div>

                        <!-- Row 3 -->
                        <div class="grid grid-cols-2 gap-8 hover:bg-binance-gray/30 rounded-lg transition-colors">
                            <div class="flex items-center py-3 px-4">
                                <div class="w-8 text-gray-400 text-sm">3</div>
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="w-10 h-10 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-full flex items-center justify-center relative">
                                        <span class="text-white font-bold text-sm">S</span>
                                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-blue-500 rounded-full flex items-center justify-center">
                                            <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-medium text-white text-sm">Sorare</div>
                                        <div class="text-xs text-gray-400">Verified</div>
                                    </div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">4.53 ETH</div>
                                    <div class="text-red-400 text-xs">-2.3%</div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">3.4k ETH</div>
                                    <div class="text-green-400 text-xs">+8.1%</div>
                                </div>
                            </div>

                            <div class="flex items-center py-3 px-4">
                                <div class="w-8 text-gray-400 text-sm">13</div>
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-teal-500 rounded-full flex items-center justify-center relative">
                                        <span class="text-white font-bold text-sm">LR</span>
                                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-blue-500 rounded-full flex items-center justify-center">
                                            <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-medium text-white text-sm">Lit Ragers</div>
                                        <div class="text-xs text-gray-400">Verified</div>
                                    </div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">1.89 ETH</div>
                                    <div class="text-red-400 text-xs">-8.4%</div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">34.57 ETH</div>
                                    <div class="text-red-400 text-xs">-6.1%</div>
                                </div>
                            </div>
                        </div>

                        <!-- Continue with remaining rows... -->
                        <!-- Row 4 -->
                        <div class="grid grid-cols-2 gap-8 hover:bg-binance-gray/30 rounded-lg transition-colors">
                            <div class="flex items-center py-3 px-4">
                                <div class="w-8 text-gray-400 text-sm">4</div>
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center relative">
                                        <span class="text-white font-bold text-sm">🏔️</span>
                                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-blue-500 rounded-full flex items-center justify-center">
                                            <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-medium text-white text-sm">Alpine Race Collectibles</div>
                                        <div class="text-xs text-gray-400">Verified</div>
                                    </div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">4.91 ETH</div>
                                    <div class="text-green-400 text-xs">+1.2%</div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">5.4k ETH</div>
                                    <div class="text-green-400 text-xs">+12.3%</div>
                                </div>
                            </div>

                            <div class="flex items-center py-3 px-4">
                                <div class="w-8 text-gray-400 text-sm">14</div>
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="w-10 h-10 bg-gradient-to-br from-teal-500 to-blue-500 rounded-full flex items-center justify-center relative">
                                        <span class="text-white font-bold text-sm">⚡</span>
                                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-blue-500 rounded-full flex items-center justify-center">
                                            <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-medium text-white text-sm">Pokemon - Generation 1</div>
                                        <div class="text-xs text-gray-400">Verified</div>
                                    </div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">5.89 ETH</div>
                                    <div class="text-green-400 text-xs">+2.1%</div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">2.47 ETH</div>
                                    <div class="text-red-400 text-xs">-1.8%</div>
                                </div>
                            </div>
                        </div>

                        <!-- Row 5 -->
                        <div class="grid grid-cols-2 gap-8 hover:bg-binance-gray/30 rounded-lg transition-colors">
                            <div class="flex items-center py-3 px-4">
                                <div class="w-8 text-gray-400 text-sm">5</div>
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="w-10 h-10 bg-gradient-to-br from-gray-600 to-gray-800 rounded-full flex items-center justify-center relative">
                                        <span class="text-white font-bold text-sm">🌍</span>
                                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-blue-500 rounded-full flex items-center justify-center">
                                            <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-medium text-white text-sm">Otherdeeds Expanded</div>
                                        <div class="text-xs text-gray-400">Verified</div>
                                    </div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">5.1k ETH</div>
                                    <div class="text-green-400 text-xs">+3.2%</div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">34.5k ETH</div>
                                    <div class="text-green-400 text-xs">+18.7%</div>
                                </div>
                            </div>

                            <div class="flex items-center py-3 px-4">
                                <div class="w-8 text-gray-400 text-sm">15</div>
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-teal-500 rounded-full flex items-center justify-center relative">
                                        <span class="text-white font-bold text-sm">🎄</span>
                                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-blue-500 rounded-full flex items-center justify-center">
                                            <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-medium text-white text-sm">Holidays in Snowland</div>
                                        <div class="text-xs text-gray-400">Verified</div>
                                    </div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">4.83 ETH</div>
                                    <div class="text-red-400 text-xs">-2.1%</div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">5.52 ETH</div>
                                    <div class="text-green-400 text-xs">+7.3%</div>
                                </div>
                            </div>
                        </div>

                        <!-- Continue with rows 6-10 following the same pattern... -->
                        <!-- I'll add a few more to complete the table -->

                        <!-- Row 6 -->
                        <div class="grid grid-cols-2 gap-8 hover:bg-binance-gray/30 rounded-lg transition-colors">
                            <div class="flex items-center py-3 px-4">
                                <div class="w-8 text-gray-400 text-sm">6</div>
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-full flex items-center justify-center relative">
                                        <span class="text-white font-bold text-sm">🎮</span>
                                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-blue-500 rounded-full flex items-center justify-center">
                                            <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-medium text-white text-sm">Moonbirds</div>
                                        <div class="text-xs text-gray-400">Verified</div>
                                    </div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">5.41 ETH</div>
                                    <div class="text-green-400 text-xs">+1.8%</div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">34.71 ETH</div>
                                    <div class="text-green-400 text-xs">+9.2%</div>
                                </div>
                            </div>

                            <div class="flex items-center py-3 px-4">
                                <div class="w-8 text-gray-400 text-sm">16</div>
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="w-10 h-10 bg-gradient-to-br from-cyan-500 to-blue-500 rounded-full flex items-center justify-center relative">
                                        <span class="text-white font-bold text-sm">HY</span>
                                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-blue-500 rounded-full flex items-center justify-center">
                                            <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-medium text-white text-sm">HV-MTL</div>
                                        <div class="text-xs text-gray-400">Verified</div>
                                    </div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">8.92 ETH</div>
                                    <div class="text-green-400 text-xs">+4.2%</div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">1.32 ETH</div>
                                    <div class="text-red-400 text-xs">-3.1%</div>
                                </div>
                            </div>
                        </div>

                        <!-- Row 10 -->
                        <div class="grid grid-cols-2 gap-8 hover:bg-binance-gray/30 rounded-lg transition-colors">
                            <div class="flex items-center py-3 px-4">
                                <div class="w-8 text-gray-400 text-sm">10</div>
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-orange-500 rounded-full flex items-center justify-center relative">
                                        <span class="text-white font-bold text-sm">🍔</span>
                                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-blue-500 rounded-full flex items-center justify-center">
                                            <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-medium text-white text-sm">FOOD FOR DEGENS</div>
                                        <div class="text-xs text-gray-400">Verified</div>
                                    </div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">4.83 ETH</div>
                                    <div class="text-red-400 text-xs">-1.2%</div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">5.1 ETH</div>
                                    <div class="text-green-400 text-xs">+2.8%</div>
                                </div>
                            </div>

                            <div class="flex items-center py-3 px-4">
                                <div class="w-8 text-gray-400 text-sm">20</div>
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="w-10 h-10 bg-gradient-to-br from-yellow-500 to-red-500 rounded-full flex items-center justify-center relative">
                                        <span class="text-white font-bold text-sm">🅱️</span>
                                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-blue-500 rounded-full flex items-center justify-center">
                                            <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-medium text-white text-sm">BEANZ</div>
                                        <div class="text-xs text-gray-400">Verified</div>
                                    </div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">5.50 ETH</div>
                                    <div class="text-green-400 text-xs">+3.4%</div>
                                </div>
                                <div class="w-24 text-right">
                                    <div class="text-white font-medium text-sm">1.51 ETH</div>
                                    <div class="text-red-400 text-xs">-1.2%</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- View All Button -->
                    <div class="text-center mt-8">
                        <button class="bg-binance-card hover:bg-binance-light-gray text-white px-8 py-3 rounded-lg transition-colors border border-gray-700 hover:border-gray-600">
                            View All
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Section with Exact Layout -->
    <section class="bg-binance-dark py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-xl font-bold mb-6">Featured</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-binance-card rounded-lg overflow-hidden border border-gray-700 hover:border-crypto-primary/50 transition-colors group">
                    <div class="aspect-square bg-gradient-to-br from-crypto-primary via-yellow-500 to-orange-500 relative">
                        <div class="absolute inset-0 bg-black/20"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <div class="text-white font-bold text-lg">Forever Skies: Premium</div>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-400">Volume: <span class="text-white font-medium">25.3k USD</span></span>
                        </div>
                        <div class="flex justify-between text-sm mt-1">
                            <span class="text-gray-400">Floor Price: <span class="text-white font-medium">178.64 USD</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- New Listings Section -->
    <section class="bg-binance-dark py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-xl font-bold mb-6">New Listings</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-binance-card rounded-lg overflow-hidden border border-gray-700 hover:border-crypto-primary/50 transition-colors group">
                    <div class="aspect-square bg-gradient-to-br from-purple-500 via-pink-500 to-red-500 relative">
                        <div class="absolute inset-0 bg-black/20"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <div class="text-white font-bold text-lg">Forever Skies: Premium</div>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-400">Volume: <span class="text-white font-medium">25.3k USD</span></span>
                        </div>
                        <div class="flex justify-between text-sm mt-1">
                            <span class="text-gray-400">Floor Price: <span class="text-white font-medium">178.64 USD</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section with Exact Questions -->
    <section class="bg-binance-dark py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold">FAQ</h2>
                <a href="#" class="text-crypto-primary hover:text-yellow-400 text-sm font-medium">All FAQs →</a>
            </div>

            <!-- FAQ Accordion with Exact Questions -->
            <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-transparent text-white" data-inactive-classes="text-gray-300">

                <h2 id="accordion-flush-heading-1">
                    <button type="button" class="flex items-center justify-between w-full py-4 font-medium text-left text-white border-b border-gray-700 hover:text-crypto-primary transition-colors duration-200" data-accordion-target="#accordion-flush-body-1" aria-expanded="false"
                        aria-controls="accordion-flush-body-1">
                        <span class="text-sm">How to Find NFTs on Binance NFT Marketplace</span>
                        <svg data-accordion-icon class="w-5 h-5 shrink-0 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                    <div class="py-4 border-b border-gray-700">
                        <p class="text-gray-300 text-sm">Browse collections, use search, or explore trending sections to find NFTs on Binance NFT Marketplace.</p>
                    </div>
                </div>

                <h2 id="accordion-flush-heading-2">
                    <button type="button" class="flex items-center justify-between w-full py-4 font-medium text-left text-white border-b border-gray-700 hover:text-crypto-primary transition-colors duration-200" data-accordion-target="#accordion-flush-body-2" aria-expanded="false"
                        aria-controls="accordion-flush-body-2">
                        <span class="text-sm">How do I buy an NFT?</span>
                        <svg data-accordion-icon class="w-5 h-5 shrink-0 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                    <div class="py-4 border-b border-gray-700">
                        <p class="text-gray-300 text-sm">Select an NFT, review details, and complete purchase using your Binance account balance or supported cryptocurrencies.</p>
                    </div>
                </div>

                <h2 id="accordion-flush-heading-3">
                    <button type="button" class="flex items-center justify-between w-full py-4 font-medium text-left text-white border-b border-gray-700 hover:text-crypto-primary transition-colors duration-200" data-accordion-target="#accordion-flush-body-3" aria-expanded="false"
                        aria-controls="accordion-flush-body-3">
                        <span class="text-sm">How do I sell an NFT?</span>
                        <svg data-accordion-icon class="w-5 h-5 shrink-0 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-3" class="hidden" aria-labelledby="accordion-flush-heading-3">
                    <div class="py-4 border-b border-gray-700">
                        <p class="text-gray-300 text-sm">Go to your profile, select the NFT, set your price, and list it on the marketplace.</p>
                    </div>
                </div>

                <h2 id="accordion-flush-heading-4">
                    <button type="button" class="flex items-center justify-between w-full py-4 font-medium text-left text-white border-b border-gray-700 hover:text-crypto-primary transition-colors duration-200" data-accordion-target="#accordion-flush-body-4" aria-expanded="false"
                        aria-controls="accordion-flush-body-4">
                        <span class="text-sm">How do I Deposit an NFT?</span>
                        <svg data-accordion-icon class="w-5 h-5 shrink-0 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-4" class="hidden" aria-labelledby="accordion-flush-heading-4">
                    <div class="py-4 border-b border-gray-700">
                        <p class="text-gray-300 text-sm">Deposit NFTs from external wallets through the deposit function in your profile.</p>
                    </div>
                </div>

                <h2 id="accordion-flush-heading-5">
                    <button type="button" class="flex items-center justify-between w-full py-4 font-medium text-left text-white border-b border-gray-700 hover:text-crypto-primary transition-colors duration-200" data-accordion-target="#accordion-flush-body-5" aria-expanded="false"
                        aria-controls="accordion-flush-body-5">
                        <span class="text-sm">What are the NFT Transaction Fees on Binance?</span>
                        <svg data-accordion-icon class="w-5 h-5 shrink-0 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-5" class="hidden" aria-labelledby="accordion-flush-heading-5">
                    <div class="py-4 border-b border-gray-700">
                        <p class="text-gray-300 text-sm">Desci NFT charges competitive trading fees for NFT transactions with transparent pricing.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
