@extends('web.layout.app')
@section('title', 'Trading Bots')
@push('style')
<style>
        .crypto-card-hover:hover {
            background: linear-gradient(135deg, rgba(240, 185, 11, 0.1) 0%, rgba(240, 185, 11, 0.05) 100%);
            border-color: rgba(240, 185, 11, 0.3);
        }
        .earn-glow {
            box-shadow: 0 0 20px rgba(240, 185, 11, 0.2);
        }
        .percentage-positive {
            color: #02C076;
        }
        .percentage-negative {
            color: #F84960;
        }
        .binance-gradient {
            background: linear-gradient(135deg, #F0B90B 0%, #F8D12F 100%);
        }
        .crypto-icon {
            width: 24px;
            height: 24px;
            border-radius: 50%;
        }
    </style>
@endpush
@section('content')
 <!-- Sub Navigation -->
    <div class="bg-binance-dark border-b border-cypto-accent py-3">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center space-x-8 h-12">
                <a href="{{ route('web.earn.overview') }}" class="text-crypto-primary font-medium text-sm border-b-2 border-crypto-primary pb-3">Overview</a>
                <a href="#" class="text-gray-400 hover:text-white text-sm pb-3">Simple Earn</a>
                <a href="#" class="text-gray-400 hover:text-white text-sm pb-3">Advanced Earn</a>
                <a href="#" class="text-gray-400 hover:text-white text-sm pb-3">Loan</a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="max-w-7xl mx-auto px-4 py-8">
        <!-- Hero Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
            <!-- Left Content -->
            <div class="lg:col-span-2">
                <div class="mb-8">
                    <h1 class="text-4xl font-bold text-white mb-4">Desci Earn</h1>
                    <p class="text-gray-400 text-lg">Smart Earning Starts Here - 300+ Crypto Assets Supported</p>
                </div>

                <!-- What is Earn Section -->
                <div class="mb-8">
                    <div class="flex items-center space-x-2 mb-4">
                        <h2 class="text-lg font-semibold text-white">What is Earn?</h2>
                        <button class="text-gray-400 hover:text-white">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Earnings Display -->
                <div class="grid grid-cols-3 gap-6 mb-8">
                    <div>
                        <div class="text-gray-400 text-sm mb-1">My Holdings</div>
                        <div class="text-2xl font-bold text-white">≈ $0.00</div>
                    </div>
                    <div>
                        <div class="text-gray-400 text-sm mb-1">Total Profit</div>
                        <div class="text-2xl font-bold text-white">≈ $0.00</div>
                    </div>
                    <div>
                        <div class="text-gray-400 text-sm mb-1">Last Day Profit</div>
                        <div class="text-2xl font-bold text-white">≈ $0.00</div>
                    </div>
                </div>
            </div>

            <!-- Right Promotional Card -->
            <div class="lg:col-span-1">
                <div class="bg-gradient-to-br from-crypto-primary to-yellow-500 rounded-2xl p-6 text-black relative overflow-hidden earn-glow">
                    <div class="absolute top-4 right-4">
                        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="text-xs font-medium mb-2 opacity-80">🎯 BINANCE EARN</div>
                        <h3 class="text-xl font-bold mb-2">WIN UP TO</h3>
                        <div class="text-2xl font-bold">3,000 USDC</div>
                        <div class="text-sm opacity-80">REWARDS</div>
                    </div>
                    <button class="bg-black text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-800 transition-colors">
                        Join Now
                    </button>
                    <div class="absolute -bottom-4 -right-4 w-20 h-20 bg-white/10 rounded-full"></div>
                </div>
            </div>
        </div>

        <!-- Crypto Performance Cards -->
        <div class="mb-12">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center space-x-4">
                    <button class="p-2 rounded-full bg-crypto-accent/90 hover:bg-binance-light-gray transition-colors">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <button class="p-2 rounded-full bg-crypto-accent/90 hover:bg-binance-light-gray transition-colors">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- RVN Card -->
                <div class="bg-crypto-accent/90 rounded-lg p-4 border border-cypto-accent crypto-card-hover transition-all duration-300">
                    <div class="flex items-center space-x-3 mb-3">
                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                            <span class="text-white font-bold text-sm">R</span>
                        </div>
                        <div>
                            <div class="font-medium text-white">RVN</div>
                            <div class="text-xs text-gray-400">Ravencoin</div>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-lg font-bold percentage-positive">20.64%</div>
                        <div class="text-xs text-gray-400">7 Days</div>
                    </div>
                </div>

                <!-- BABY Card -->
                <div class="bg-crypto-accent/90 rounded-lg p-4 border border-cypto-accent crypto-card-hover transition-all duration-300">
                    <div class="flex items-center space-x-3 mb-3">
                        <div class="w-8 h-8 bg-pink-500 rounded-full flex items-center justify-center">
                            <span class="text-white font-bold text-sm">B</span>
                        </div>
                        <div>
                            <div class="font-medium text-white">BABY</div>
                            <div class="text-xs text-gray-400">BabyDoge Coin</div>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-lg font-bold percentage-positive">77%-20.9%</div>
                        <div class="text-xs text-gray-400">7 Days</div>
                    </div>
                </div>

                <!-- USDT Card -->
                <div class="bg-crypto-accent/90 rounded-lg p-4 border border-cypto-accent crypto-card-hover transition-all duration-300">
                    <div class="flex items-center space-x-3 mb-3">
                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                            <span class="text-white font-bold text-sm">U</span>
                        </div>
                        <div>
                            <div class="font-medium text-white">USDT</div>
                            <div class="text-xs text-gray-400">Tether</div>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-lg font-bold percentage-positive">7.14%</div>
                        <div class="text-xs text-gray-400">7 Days</div>
                    </div>
                </div>

                <!-- BTC Card -->
                <div class="bg-crypto-accent/90 rounded-lg p-4 border border-cypto-accent crypto-card-hover transition-all duration-300">
                    <div class="flex items-center space-x-3 mb-3">
                        <div class="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center">
                            <span class="text-white font-bold text-sm">₿</span>
                        </div>
                        <div>
                            <div class="font-medium text-white">BTC</div>
                            <div class="text-xs text-gray-400">Bitcoin</div>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-lg font-bold percentage-positive">0.27%</div>
                        <div class="text-xs text-gray-400">7 Days</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search and Filters -->
        <div class="mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <input type="text" placeholder="Search coins" class="bg-crypto-accent/90 border border-cypto-accent rounded-lg pl-10 pr-4 py-2 text-white placeholder-binance-text-secondary focus:outline-none focus:border-crypto-primary">
                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <select class="bg-crypto-accent/90 border border-cypto-accent rounded-lg px-4 py-2 text-white focus:outline-none focus:border-crypto-primary">
                        <option>All Durations</option>
                        <option>Flexible</option>
                        <option>7 Days</option>
                        <option>30 Days</option>
                        <option>60 Days</option>
                        <option>90 Days</option>
                    </select>
                    
                    <select class="bg-crypto-accent/90 border border-cypto-accent rounded-lg px-4 py-2 text-white focus:outline-none focus:border-crypto-primary">
                        <option>All Products</option>
                        <option>Simple Earn</option>
                        <option>Staking</option>
                        <option>DeFi Staking</option>
                    </select>

                    <label class="flex items-center space-x-2 text-gray-400">
                        <input type="checkbox" class="rounded border-cypto-accent bg-crypto-accent/90 text-crypto-primary focus:ring-crypto-primary">
                        <span class="text-sm">Match My Assets</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Popular Products Section -->
        <div class="mb-12">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-white">Popular Products</h2>
                <div class="flex items-center space-x-2">
                    <span class="text-crypto-primary text-sm">🔥 Yield Arena</span>
                    <svg class="w-4 h-4 text-crypto-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </div>
            </div>

            <!-- Products Table -->
            <div class="bg-crypto-accent/90 rounded-lg border border-cypto-accent overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-crypto-accent">
                            <tr>
                                <th class="text-left py-4 px-6 text-gray-400 text-sm font-medium">Coin</th>
                                <th class="text-right py-4 px-6 text-gray-400 text-sm font-medium">Est. APR</th>
                                <th class="text-right py-4 px-6 text-gray-400 text-sm font-medium">Duration</th>
                                <th class="text-right py-4 px-6 text-gray-400 text-sm font-medium"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- USDC Row -->
                            <tr class="border-b border-cypto-accent hover:bg-crypto-accent/50 transition-colors">
                                <td class="py-4 px-6">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                            <span class="text-white font-bold text-sm">U</span>
                                        </div>
                                        <span class="font-medium text-white">USDC</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <span class="text-crypto-primary font-medium">10.88%</span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <span class="text-gray-400">Flexible/Locked</span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <button class="text-gray-400 hover:text-white">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>

                            <!-- USDT Row -->
                            <tr class="border-b border-cypto-accent hover:bg-crypto-accent/50 transition-colors">
                                <td class="py-4 px-6">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                            <span class="text-white font-bold text-sm">₮</span>
                                        </div>
                                        <span class="font-medium text-white">USDT</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <span class="text-crypto-primary font-medium">7.14%</span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <span class="text-gray-400">Flexible/Locked</span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <button class="text-gray-400 hover:text-white">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>

                            <!-- ETH Row -->
                            <tr class="border-b border-cypto-accent hover:bg-crypto-accent/50 transition-colors">
                                <td class="py-4 px-6">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center">
                                            <span class="text-white font-bold text-sm">Ξ</span>
                                        </div>
                                        <span class="font-medium text-white">ETH</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <span class="text-crypto-primary font-medium">2.71%~151.35%</span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <span class="text-gray-400">Flexible/Locked</span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <button class="text-gray-400 hover:text-white">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>

                            <!-- SOL Row -->
                            <tr class="border-b border-cypto-accent hover:bg-crypto-accent/50 transition-colors">
                                <td class="py-4 px-6">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full flex items-center justify-center">
                                            <span class="text-white font-bold text-sm">S</span>
                                        </div>
                                        <span class="font-medium text-white">SOL</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <span class="text-crypto-primary font-medium">1.96%~152.35%</span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <span class="text-gray-400">Flexible/Locked</span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <button class="text-gray-400 hover:text-white">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>

                            <!-- BNB Row -->
                            <tr class="border-b border-cypto-accent hover:bg-crypto-accent/50 transition-colors">
                                <td class="py-4 px-6">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 bg-crypto-primary rounded-full flex items-center justify-center">
                                            <span class="text-black font-bold text-sm">B</span>
                                        </div>
                                        <span class="font-medium text-white">BNB</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <span class="text-crypto-primary font-medium">0.16%~68.47%</span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <span class="text-gray-400">Flexible/Locked</span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <button class="text-gray-400 hover:text-white">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>

                            <!-- XUSD Row -->
                            <tr class="border-b border-cypto-accent hover:bg-crypto-accent/50 transition-colors">
                                <td class="py-4 px-6">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 bg-teal-500 rounded-full flex items-center justify-center">
                                            <span class="text-white font-bold text-sm">X</span>
                                        </div>
                                        <span class="font-medium text-white">XUSD</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <span class="text-crypto-primary font-medium">31.44%</span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <span class="text-gray-400">Flexible</span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <button class="text-gray-400 hover:text-white">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>

                            <!-- FDUSD Row -->
                            <tr class="border-b border-cypto-accent hover:bg-crypto-accent/50 transition-colors">
                                <td class="py-4 px-6">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 bg-gray-500 rounded-full flex items-center justify-center">
                                            <span class="text-white font-bold text-sm">F</span>
                                        </div>
                                        <span class="font-medium text-white">FDUSD</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <span class="text-crypto-primary font-medium">10.82%</span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <span class="text-gray-400">Flexible/Locked</span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <button class="text-gray-400 hover:text-white">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>

                            <!-- TUSD Row -->
                            <tr class="border-b border-cypto-accent hover:bg-crypto-accent/50 transition-colors">
                                <td class="py-4 px-6">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                                            <span class="text-white font-bold text-sm">T</span>
                                        </div>
                                        <span class="font-medium text-white">TUSD</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <span class="text-crypto-primary font-medium">8.37% Max</span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <span class="text-gray-400">Flexible</span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <button class="text-gray-400 hover:text-white">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>

                            <!-- AXL Row -->
                            <tr class="border-b border-cypto-accent hover:bg-crypto-accent/50 transition-colors">
                                <td class="py-4 px-6">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 bg-indigo-500 rounded-full flex items-center justify-center">
                                            <span class="text-white font-bold text-sm">A</span>
                                        </div>
                                        <span class="font-medium text-white">AXL</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <span class="text-crypto-primary font-medium">3.54%~23.66%</span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <span class="text-gray-400">Flexible/Locked</span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <button class="text-gray-400 hover:text-white">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>

                            <!-- HIVE Row -->
                            <tr class="hover:bg-crypto-accent/50 transition-colors">
                                <td class="py-4 px-6">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center">
                                            <span class="text-white font-bold text-sm">H</span>
                                        </div>
                                        <span class="font-medium text-white">HIVE</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <span class="text-crypto-primary font-medium">1.34%</span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <span class="text-gray-400">Flexible</span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <button class="text-gray-400 hover:text-white">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- View More Button -->
                <div class="text-center py-6 border-t border-cypto-accent">
                    <button class="text-crypto-primary hover:text-yellow-400 font-medium transition-colors">
                        View More
                    </button>
                </div>
            </div>
        </div>

        <!-- Calculate Earnings Section -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-white mb-6">Calculate your crypto earnings</h2>
            
            <div class="bg-crypto-accent/90 rounded-lg border border-cypto-accent p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Left Side - Input -->
                    <div>
                        <h3 class="text-lg font-semibold text-white mb-4">Products on offer</h3>
                        
                        <div class="space-y-4">
                            <div class="flex items-center space-x-4">
                                <span class="text-gray-400">I have</span>
                                <div class="flex-1">
                                    <input type="number" value="1000" class="bg-crypto-accent border border-cypto-accent rounded-lg px-4 py-2 text-white w-full focus:outline-none focus:border-crypto-primary">
                                </div>
                                <div class="flex items-center space-x-2">
                                    <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                                        <span class="text-white font-bold text-xs">₮</span>
                                    </div>
                                    <span class="text-white font-medium">USDT</span>
                                </div>
                            </div>
                            
                            <div class="flex items-center space-x-4">
                                <span class="text-gray-400">and I am interested in</span>
                                <select class="bg-crypto-accent border border-cypto-accent rounded-lg px-4 py-2 text-white focus:outline-none focus:border-crypto-primary">
                                    <option>Flexible</option>
                                    <option>7 Days</option>
                                    <option>30 Days</option>
                                    <option>60 Days</option>
                                    <option>90 Days</option>
                                </select>
                                <select class="bg-crypto-accent border border-cypto-accent rounded-lg px-4 py-2 text-white focus:outline-none focus:border-crypto-primary">
                                    <option>Locked</option>
                                    <option>Flexible</option>
                                </select>
                                <span class="text-gray-400">investment.</span>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side - Results -->
                    <div>
                        <h3 class="text-lg font-semibold text-white mb-4">Estimated Earnings</h3>
                        <div class="text-3xl font-bold text-white">--</div>
                        
                        <div class="mt-6 p-4 bg-crypto-accent rounded-lg">
                            <div class="text-xs text-gray-400 mb-2">
                                This calculation is an estimate of rewards you will earn for the selected timeframe. It does not display the actual or predicted APR for any specific asset. APR is subject to change and may vary based on market conditions and other factors.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-white mb-6">Frequently Asked Questions</h2>
            
            <div class="space-y-4">
                <!-- FAQ Item 1 -->
                <div class="bg-crypto-accent/90 rounded-lg border border-cypto-accent">
                    <button class="w-full flex items-center justify-between p-6 text-left" data-accordion-target="#faq-1" aria-expanded="false">
                        <span class="font-medium text-white">What is Desci Earn?</span>
                        <svg class="w-5 h-5 text-gray-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div id="faq-1" class="hidden px-6 pb-6">
                        <p class="text-gray-400">Desci Earn is a suite of investment products that allows you to earn rewards on your cryptocurrency holdings through various earning opportunities including staking, savings, and DeFi protocols.</p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="bg-crypto-accent/90 rounded-lg border border-cypto-accent">
                    <button class="w-full flex items-center justify-between p-6 text-left" data-accordion-target="#faq-2" aria-expanded="false">
                        <span class="font-medium text-white">How does Desci Earn work?</span>
                        <svg class="w-5 h-5 text-gray-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div id="faq-2" class="hidden px-6 pb-6">
                        <p class="text-gray-400">Desci Earn works by allowing you to deposit your cryptocurrencies into various earning products. Your assets are then used in different protocols to generate returns, which are distributed back to you as rewards.</p>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="bg-crypto-accent/90 rounded-lg border border-cypto-accent">
                    <button class="w-full flex items-center justify-between p-6 text-left" data-accordion-target="#faq-3" aria-expanded="false">
                        <span class="font-medium text-white">Which cryptocurrencies are supported?</span>
                        <svg class="w-5 h-5 text-gray-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div id="faq-3" class="hidden px-6 pb-6">
                        <p class="text-gray-400">Desci Earn supports over 300 cryptocurrencies including Bitcoin (BTC), Ethereum (ETH), Desci Coin (BNB), and many other popular digital assets.</p>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="bg-crypto-accent/90 rounded-lg border border-cypto-accent">
                    <button class="w-full flex items-center justify-between p-6 text-left" data-accordion-target="#faq-4" aria-expanded="false">
                        <span class="font-medium text-white">Am I eligible for Desci Earn?</span>
                        <svg class="w-5 h-5 text-gray-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div id="faq-4" class="hidden px-6 pb-6">
                        <p class="text-gray-400">Most Desci users are eligible for Desci Earn products. However, availability may vary based on your location and local regulations. Please check the specific product requirements for details.</p>
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="bg-crypto-accent/90 rounded-lg border border-cypto-accent">
                    <button class="w-full flex items-center justify-between p-6 text-left" data-accordion-target="#faq-5" aria-expanded="false">
                        <span class="font-medium text-white">How do I start earning?</span>
                        <svg class="w-5 h-5 text-gray-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div id="faq-5" class="hidden px-6 pb-6">
                        <p class="text-gray-400">To start earning, simply choose a product from the list above, click on it to view details, and follow the subscription process. You can start with any amount that meets the minimum requirement.</p>
                    </div>
                </div>
            </div>

            <!-- View More FAQ -->
            <div class="text-center mt-8">
                <button class="text-crypto-primary hover:text-yellow-400 font-medium transition-colors">
                    View More
                </button>
            </div>
        </div>
    </section>
@endsection
@push('script')
        <script>
        // Simple accordion functionality
        document.addEventListener('DOMContentLoaded', function() {
            const accordionButtons = document.querySelectorAll('[data-accordion-target]');
            
            accordionButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const target = document.querySelector(this.getAttribute('data-accordion-target'));
                    const icon = this.querySelector('svg');
                    
                    if (target.classList.contains('hidden')) {
                        target.classList.remove('hidden');
                        icon.style.transform = 'rotate(180deg)';
                        this.setAttribute('aria-expanded', 'true');
                    } else {
                        target.classList.add('hidden');
                        icon.style.transform = 'rotate(0deg)';
                        this.setAttribute('aria-expanded', 'false');
                    }
                });
            });
        });
    </script>
@endpush