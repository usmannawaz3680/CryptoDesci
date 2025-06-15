@extends('web.layout.app')
@section('title', 'Home')
@section('content')
    <section>
        <div class="min-h-screen w-full bg-black">
            <div class="max-w-7xl mx-auto py-12">
                <div class="grid grid-cols-1 lg:grid-cols-10 xl:grid-cols-12 gap-8 items-start">
                    <!-- Left Section - Hero Content -->
                    <div class="lg:col-span-5 space-y-8">
                        <div>
                            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                                Trade with 100 million users on Desci
                            </h1>
                            <p class="text-lg text-gray-300 mb-8">
                                Sign up now to claim a welcome pack worth <span class="text-crypto-primary font-semibold">$200 USDT!</span>
                            </p>
                        </div>

                        <!-- Sign Up Form -->
                        <div class="space-y-4">
                            <div class="flex flex-col sm:flex-row gap-3">
                                <input type="text" placeholder="Email/Phone number" class="flex-1 bg-crypto-accent/70 border text-crypto-accent border-gray-700 rounded-lg px-4 py-3 text-white placeholder-gray-400 focus:outline-none focus:border-crypto-primary focus:ring-1 focus:ring-crypto-primary">
                                <button class="bg-white text-black px-8 py-3 rounded-lg font-semibold hover:bg-crypto-primary transition-colors whitespace-nowrap">
                                    Start now
                                </button>
                            </div>

                            <!-- Social Login Options -->
                            <div class="flex items-center justify-between">
                                <span class="text-gray-400 text-sm">Or continue with</span>
                                <span class="text-gray-400 text-sm">Download the app</span>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex space-x-3">
                                    <!-- Google -->
                                    <button class="w-12 h-12 bg-crypto-accent/70 border border-gray-700 rounded-lg flex items-center justify-center hover:border-gray-600 transition-colors">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24">
                                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                                        </svg>
                                    </button>

                                    <!-- Apple -->
                                    <button class="w-12 h-12 bg-crypto-accent/70 border border-gray-700 rounded-lg flex items-center justify-center hover:border-gray-600 transition-colors">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z" />
                                        </svg>
                                    </button>

                                    <!-- Telegram -->
                                    <button class="w-12 h-12 bg-crypto-accent/70 border border-gray-700 rounded-lg flex items-center justify-center hover:border-gray-600 transition-colors">
                                        <svg class="w-5 h-5 text-[#0088cc]" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z" />
                                        </svg>
                                    </button>
                                </div>

                                <!-- App Download -->
                                <button class="w-12 h-12 bg-crypto-accent/70 border border-gray-700 rounded-lg flex items-center justify-center hover:border-gray-600 transition-colors">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Middle Section - Statistics Cards -->
                    <div class="lg:col-span-3 space-y-4">
                        <!-- Copy Trading Card -->
                        <div class="bg-crypto-accent/70 rounded-2xl p-6 border border-gray-800">
                            <div class="text-sm text-gray-400 mb-2">Copy trading</div>
                            <div class="text-3xl font-bold mb-4">200,000</div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-400">Elite trader</span>
                                <div class="flex -space-x-2">
                                    <div class="w-8 h-8 rounded-full bg-gradient-to-r from-blue-500 to-purple-500 border-2 border-Desci-card"></div>
                                    <div class="w-8 h-8 rounded-full bg-gradient-to-r from-green-500 to-teal-500 border-2 border-Desci-card"></div>
                                    <div class="w-8 h-8 rounded-full bg-gradient-to-r from-orange-500 to-red-500 border-2 border-Desci-card"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Trading Volume Card -->
                        <div class="bg-crypto-accent/70 rounded-2xl p-6 border border-gray-800">
                            <div class="text-sm text-gray-400 mb-2">24h trading volume</div>
                            <div class="text-3xl font-bold mb-4">25.64B</div>
                            <button class="text-sm text-gray-400 hover:text-white transition-colors">View</button>
                        </div>
                    </div>

                    <!-- Right Section - Popular Cryptocurrencies -->
                    <div class="lg:col-span-4">
                        <div class="bg-crypto-accent/70 rounded-2xl p-6 border border-gray-800">
                            <h3 class="text-lg font-semibold mb-6">Popular</h3>

                            <div class="space-y-4">
                                <!-- ETH -->
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 rounded-full bg-[#627EEA] flex items-center justify-center">
                                            <span class="text-white text-xs font-bold">ETH</span>
                                        </div>
                                        <span class="font-medium">ETH</span>
                                    </div>
                                    <div class="text-right">
                                        <div class="font-semibold">$2530.14</div>
                                        <div class="text-sm text-crypto-primary">+0.4%</div>
                                    </div>
                                </div>

                                <!-- BTC -->
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 rounded-full bg-[#F7931A] flex items-center justify-center">
                                            <span class="text-white text-xs font-bold">₿</span>
                                        </div>
                                        <span class="font-medium">BTC</span>
                                    </div>
                                    <div class="text-right">
                                        <div class="font-semibold">$105003.00</div>
                                        <div class="text-sm text-red-500">-0.21%</div>
                                    </div>
                                </div>

                                <!-- SOL -->
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 rounded-full bg-gradient-to-r from-[#9945FF] to-[#14F195] flex items-center justify-center">
                                            <span class="text-white text-xs font-bold">◎</span>
                                        </div>
                                        <span class="font-medium">SOL</span>
                                    </div>
                                    <div class="text-right">
                                        <div class="font-semibold">$145.59</div>
                                        <div class="text-sm text-crypto-primary">+0.51%</div>
                                    </div>
                                </div>

                                <!-- XRP -->
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 rounded-full bg-[#23292F] flex items-center justify-center">
                                            <span class="text-white text-xs font-bold">✕</span>
                                        </div>
                                        <span class="font-medium">XRP</span>
                                    </div>
                                    <div class="text-right">
                                        <div class="font-semibold">$2.17</div>
                                        <div class="text-sm text-crypto-primary">+1.54%</div>
                                    </div>
                                </div>

                                <!-- AB -->
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 rounded-full bg-[#4A90E2] flex items-center justify-center">
                                            <span class="text-white text-xs font-bold">AB</span>
                                        </div>
                                        <span class="font-medium">AB</span>
                                    </div>
                                    <div class="text-right">
                                        <div class="font-semibold">$0.01250</div>
                                        <div class="text-sm text-crypto-primary">+2%</div>
                                    </div>
                                </div>

                                <!-- WIF -->
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 rounded-full bg-[#FF6B6B] flex items-center justify-center">
                                            <span class="text-white text-xs font-bold">🐕</span>
                                        </div>
                                        <span class="font-medium">WIF</span>
                                    </div>
                                    <div class="text-right">
                                        <div class="font-semibold">$0.8470</div>
                                        <div class="text-sm text-crypto-primary">+4.44%</div>
                                    </div>
                                </div>

                                <!-- LA -->
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 rounded-full bg-[#00D4AA] flex items-center justify-center">
                                            <span class="text-white text-xs font-bold">LA</span>
                                        </div>
                                        <span class="font-medium">LA</span>
                                    </div>
                                    <div class="text-right">
                                        <div class="font-semibold">$0.8574</div>
                                        <div class="text-sm text-crypto-primary">+4.37%</div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 pt-4 border-t border-gray-700">
                                <button class="text-sm text-gray-400 hover:text-crypto-primary transition-colors">
                                    Explore over 800 assets
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="min-h-screen bg-black">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
                <!-- Tab Navigation -->
                <div class="mb-12">
                    <ul class="flex flex-wrap justify-center text-sm font-medium text-center text-gray-400 border-b border-gray-700" id="default-tab" data-tabs-toggle="#default-tab-content" data-tabs-active-classes="border-crypto-primary text-crypto-primary" role="tablist">
                        <li class="me-2" role="presentation">
                            <button class="inline-block p-4 text-2xl font-semibold border-b-2 border-transparent rounded-t-lg hover:text-gray-300 hover:border-gray-600" id="exchange-tab" data-tabs-target="#exchange" type="button" role="tab" aria-controls="exchange" aria-selected="false">
                                Exchange
                            </button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button class="inline-block p-4 text-2xl font-semibold border-b-2 rounded-t-lg active" id="web3-tab" data-tabs-target="#web3" data- type="button" role="tab" aria-controls="web3" aria-selected="true">
                                Web3
                            </button>
                        </li>
                    </ul>
                </div>

                <!-- Tab Content -->
                <div id="default-tab-content">
                    <!-- Exchange Tab Content -->
                    <div class="hidden p-4 rounded-lg" id="exchange" role="tabpanel" aria-labelledby="exchange-tab">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                            <!-- Exchange Mobile Mockup -->
                            <div class="flex justify-center">
                                <div class="relative">
                                    <div class="w-80 h-[600px] bg-bitget-card rounded-[3rem] p-6 border border-gray-700">
                                        <div class="bg-black rounded-[2.5rem] h-full p-6">
                                            <div class="flex items-center justify-between mb-6">
                                                <span class="text-sm font-medium">9:41</span>
                                                <div class="flex items-center space-x-1">
                                                    <div class="w-4 h-2 bg-white rounded-sm"></div>
                                                    <div class="w-1 h-1 bg-white rounded-full"></div>
                                                    <div class="w-6 h-3 border border-white rounded-sm"></div>
                                                </div>
                                            </div>

                                            <div class="text-center">
                                                <h3 class="text-xl font-bold mb-8">Exchange Features</h3>
                                                <div class="space-y-4">
                                                    <div class="bg-bitget-light-gray rounded-lg p-4">
                                                        <div class="text-crypto-primary font-semibold">Spot Trading</div>
                                                        <div class="text-sm text-gray-400">Trade with low fees</div>
                                                    </div>
                                                    <div class="bg-bitget-light-gray rounded-lg p-4">
                                                        <div class="text-crypto-primary font-semibold">Futures</div>
                                                        <div class="text-sm text-gray-400">Leverage up to 125x</div>
                                                    </div>
                                                    <div class="bg-bitget-light-gray rounded-lg p-4">
                                                        <div class="text-crypto-primary font-semibold">Copy Trading</div>
                                                        <div class="text-sm text-gray-400">Follow expert traders</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Exchange Features -->
                            <div class="space-y-8">
                                <h2 class="text-4xl md:text-5xl font-bold leading-tight">
                                    Advanced Trading Platform
                                </h2>

                                <div class="space-y-6">
                                    <div>
                                        <h3 class="text-xl font-semibold mb-2 text-crypto-primary">Professional Trading</h3>
                                        <p class="text-gray-300">Access advanced trading tools and real-time market data.</p>
                                    </div>

                                    <div>
                                        <h3 class="text-xl font-semibold mb-2 text-crypto-primary">Low Fees</h3>
                                        <p class="text-gray-300">Enjoy competitive trading fees and maximize your profits.</p>
                                    </div>

                                    <div>
                                        <h3 class="text-xl font-semibold mb-2 text-crypto-primary">High Liquidity</h3>
                                        <p class="text-gray-300">Trade with confidence on our high-liquidity platform.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Web3 Tab Content (Active) -->
                    <div class="p-4 rounded-lg" id="web3" role="tabpanel" aria-labelledby="web3-tab">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                            <!-- Mobile App Mockup -->
                            <div class="flex justify-center">
                                <div class="relative">
                                    <div class="w-80 h-[600px] bg-bitget-card rounded-[3rem] p-6 border border-gray-700">
                                        <div class="bg-black rounded-[2.5rem] h-full p-6 max-h-full overflow-hidden">
                                            <!-- Status Bar -->
                                            <div class="flex items-center justify-between mb-6">
                                                <span class="text-sm font-medium">9:41</span>
                                                <div class="flex items-center space-x-1">
                                                    <div class="w-4 h-2 bg-white rounded-sm"></div>
                                                    <div class="w-1 h-1 bg-white rounded-full"></div>
                                                    <div class="w-6 h-3 border border-white rounded-sm"></div>
                                                </div>
                                            </div>

                                            <!-- Back Arrow -->
                                            <div class="mb-6">
                                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                                </svg>
                                            </div>

                                            <!-- Popular DApps Header -->
                                            <h3 class="text-lg font-semibold mb-6">Popular DApps</h3>

                                            <!-- DApps List -->
                                            <div class="space-y-4 max-h-full overflow-hidden">
                                                <!-- JA Uniswap -->
                                                <div class="flex items-center space-x-3 p-3 rounded-lg hover:bg-bitget-light-gray">
                                                    <div class="w-10 h-10 bg-crypto-primary rounded-lg flex items-center justify-center">
                                                        <span class="text-black font-bold text-sm">JA</span>
                                                    </div>
                                                    <div class="flex-1">
                                                        <div class="font-medium text-sm">JA Uniswap</div>
                                                        <div class="text-xs text-gray-400">Uniswap is a decentralized exchange protocol</div>
                                                    </div>
                                                </div>

                                                <!-- Grass -->
                                                <div class="flex items-center space-x-3 p-3 rounded-lg hover:bg-bitget-light-gray">
                                                    <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center">
                                                        <span class="text-white font-bold text-sm">🌱</span>
                                                    </div>
                                                    <div class="flex-1">
                                                        <div class="font-medium text-sm">Grass - Earn Passive Income</div>
                                                        <div class="text-xs text-gray-400">Earn by sharing your unused internet</div>
                                                    </div>
                                                </div>

                                                <!-- Swell -->
                                                <div class="flex items-center space-x-3 p-3 rounded-lg hover:bg-bitget-light-gray">
                                                    <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
                                                        <span class="text-white font-bold text-sm">S</span>
                                                    </div>
                                                    <div class="flex-1">
                                                        <div class="font-medium text-sm">Swell</div>
                                                        <div class="text-xs text-gray-400">A liquid staking protocol</div>
                                                    </div>
                                                </div>

                                                <!-- REVOX -->
                                                <div class="flex items-center space-x-3 p-3 rounded-lg hover:bg-bitget-light-gray">
                                                    <div class="w-10 h-10 bg-gray-600 rounded-lg flex items-center justify-center">
                                                        <span class="text-white font-bold text-xs">RX</span>
                                                    </div>
                                                    <div class="flex-1">
                                                        <div class="font-medium text-sm">REVOX</div>
                                                        <div class="text-xs text-gray-400">A modular blockchain network</div>
                                                    </div>
                                                </div>

                                                <!-- ONCHAIN -->
                                                <div class="flex items-center space-x-3 p-3 rounded-lg hover:bg-bitget-light-gray">
                                                    <div class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center">
                                                        <span class="text-white font-bold text-xs">ON</span>
                                                    </div>
                                                    <div class="flex-1">
                                                        <div class="font-medium text-sm">ONCHAIN</div>
                                                        <div class="text-xs text-gray-400">Onchain data and analytics</div>
                                                    </div>
                                                </div>

                                                <!-- X empire -->
                                                <div class="flex items-center space-x-3 p-3 rounded-lg hover:bg-bitget-light-gray">
                                                    <div class="w-10 h-10 bg-purple-600 rounded-lg flex items-center justify-center">
                                                        <span class="text-white font-bold text-sm">X</span>
                                                    </div>
                                                    <div class="flex-1">
                                                        <div class="font-medium text-sm">X empire</div>
                                                        <div class="text-xs text-gray-400">Build your own empire</div>
                                                    </div>
                                                </div>

                                                <!-- The Sandbox -->
                                                <div class="flex items-center space-x-3 p-3 rounded-lg hover:bg-bitget-light-gray">
                                                    <div class="w-10 h-10 bg-blue-400 rounded-lg flex items-center justify-center">
                                                        <span class="text-white font-bold text-sm">S</span>
                                                    </div>
                                                    <div class="flex-1">
                                                        <div class="font-medium text-sm">The Sandbox</div>
                                                        <div class="text-xs text-gray-400">The Sandbox is a virtual world</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Web3 Features -->
                            <div class="space-y-8">
                                <h2 class="text-4xl md:text-5xl font-bold leading-tight">
                                    Start your Web3 journey
                                </h2>

                                <div class="space-y-6">
                                    <div>
                                        <h3 class="text-xl font-semibold mb-2 text-crypto-primary">Desci Wallet</h3>
                                        <p class="text-gray-300">Discover a safer, decentralized experience with a Web3 wallet.</p>
                                    </div>

                                    <div>
                                        <h3 class="text-xl font-semibold mb-2 text-crypto-primary">Desci Swap</h3>
                                        <p class="text-gray-300">Cross-chain swap with flexible price limits.</p>
                                    </div>

                                    <div>
                                        <h3 class="text-xl font-semibold mb-2 text-crypto-primary">Desci NFT</h3>
                                        <p class="text-gray-300">Place batch orders and buy NFTs with any coin.</p>
                                    </div>

                                    <div>
                                        <h3 class="text-xl font-semibold mb-2 text-crypto-primary">2000+ DApps</h3>
                                        <p class="text-gray-300">A massive collection of popular DApps.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="min-h-screen bg-black relative">
        <!-- Background gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-bitget-dark/50 to-black"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <!-- Header Section -->
            <div class="text-center mb-20">
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 bg-gradient-to-r from-white via-gray-100 to-crypto-primary bg-clip-text text-transparent">
                    Safe and reliable
                </h2>
                <p class="text-lg md:text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
                    We are committed to safeguarding your assets and ensuring the security of your information.
                </p>
            </div>

            <!-- 3D Shield Visual -->
            <div class="flex justify-center mb-20">
                <div class="relative">
                    <!-- Outer rotating rings -->
                    <div class="absolute inset-0 animate-rotate-slow">
                        <div class="w-96 h-96 border border-crypto-primary/20 rounded-full"></div>
                    </div>
                    <div class="absolute inset-4 animate-rotate-slow" style="animation-direction: reverse; animation-duration: 15s;">
                        <div class="w-full h-full border border-crypto-primary/30 rounded-full"></div>
                    </div>
                    
                    <!-- Central shield -->
                    <div class="relative w-96 h-96 flex items-center justify-center">
                        <div class="w-32 h-40 bg-gradient-to-b from-crypto-accent/90 to-bg-crypto-accent/20 rounded-t-full rounded-b-lg border-2 border-crypto-primary animate-float animate-pulse-glow relative overflow-hidden">
                            <!-- Shield glow effect -->
                            <div class="absolute inset-0 bg-gradient-to-b from-crypto-primary/20 to-transparent"></div>
                            
                            <!-- Desci logo/symbol -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <svg class="w-12 h-12 text-crypto-primary" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                                </svg>
                            </div>
                            
                            <!-- Inner glow -->
                            <div class="absolute inset-2 bg-gradient-to-b from-crypto-primary/10 to-transparent rounded-t-full rounded-b-lg"></div>
                        </div>
                        
                        <!-- Floating particles -->
                        <div class="absolute top-10 left-10 w-2 h-2 bg-crypto-primary rounded-full animate-pulse"></div>
                        <div class="absolute top-20 right-8 w-1 h-1 bg-crypto-primary rounded-full animate-pulse" style="animation-delay: 1s;"></div>
                        <div class="absolute bottom-16 left-16 w-1.5 h-1.5 bg-crypto-primary rounded-full animate-pulse" style="animation-delay: 2s;"></div>
                        <div class="absolute bottom-10 right-12 w-1 h-1 bg-crypto-primary rounded-full animate-pulse" style="animation-delay: 0.5s;"></div>
                    </div>
                </div>
            </div>

            <!-- Security Features Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-12">
                <!-- Protection Fund -->
                <div class="group relative">
                    <div class="bg-gradient-to-br from-crypto-accent/90 to-bg-crypto-accent/20 rounded-2xl p-8 border border-gray-800 hover:border-crypto-primary/50 transition-all duration-300 hover:shadow-lg hover:shadow-crypto-primary/10 h-full">
                        <!-- Icon -->
                        <div class="w-16 h-16 bg-gradient-to-br from-crypto-primary to-teal-400 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        
                        <h3 class="text-2xl font-bold mb-4 group-hover:text-crypto-primary transition-colors duration-300">
                            Protection Fund
                        </h3>
                        <p class="text-gray-300 mb-6 leading-relaxed">
                            Our <span class="text-crypto-primary font-semibold">$689M Protection Fund</span> ensures the security of your assets with comprehensive coverage.
                        </p>
                        
                        <!-- Learn more link -->
                        <div class="flex items-center text-crypto-primary group-hover:translate-x-2 transition-transform duration-300">
                            <span class="text-sm font-medium mr-2">Learn more</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Proof of Reserves -->
                <div class="group relative">
                    <div class="bg-gradient-to-br from-crypto-accent/90 to-bg-crypto-accent/20 rounded-2xl p-8 border border-gray-800 hover:border-crypto-primary/50 transition-all duration-300 hover:shadow-lg hover:shadow-crypto-primary/10 h-full">
                        <!-- Icon -->
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-crypto-primary rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        
                        <h3 class="text-2xl font-bold mb-4 group-hover:text-crypto-primary transition-colors duration-300">
                            Proof of Reserves
                        </h3>
                        <p class="text-gray-300 mb-6 leading-relaxed">
                            We guarantee at least a <span class="text-crypto-primary font-semibold">1:1 reserve ratio</span> of our customer funds with full transparency.
                        </p>
                        
                        <!-- Learn more link -->
                        <div class="flex items-center text-crypto-primary group-hover:translate-x-2 transition-transform duration-300">
                            <span class="text-sm font-medium mr-2">View reserves</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Cold Storage -->
                <div class="group relative">
                    <div class="bg-gradient-to-br from-crypto-accent/90 to-bg-crypto-accent/20 rounded-2xl p-8 border border-gray-800 hover:border-crypto-primary/50 transition-all duration-300 hover:shadow-lg hover:shadow-crypto-primary/10 h-full">
                        <!-- Icon -->
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-crypto-primary rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        
                        <h3 class="text-2xl font-bold mb-4 group-hover:text-crypto-primary transition-colors duration-300">
                            Cold Storage
                        </h3>
                        <p class="text-gray-300 mb-6 leading-relaxed">
                            We store most digital assets in <span class="text-crypto-primary font-semibold">offline, multi-signature wallets</span> for maximum security.
                        </p>
                        
                        <!-- Learn more link -->
                        <div class="flex items-center text-crypto-primary group-hover:translate-x-2 transition-transform duration-300">
                            <span class="text-sm font-medium mr-2">Security details</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Trust Indicators -->
            <div class="mt-20 text-center">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-crypto-primary mb-2">100M+</div>
                        <div class="text-gray-400 text-sm">Trusted Users</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-crypto-primary mb-2">99.9%</div>
                        <div class="text-gray-400 text-sm">Uptime</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-crypto-primary mb-2">24/7</div>
                        <div class="text-gray-400 text-sm">Security Monitoring</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-crypto-primary mb-2">ISO</div>
                        <div class="text-gray-400 text-sm">Certified</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <section class="min-h-screen bg-black py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- FAQ Header -->
            <div class="text-center mb-12">
                <h2 class="text-4xl md:text-5xl font-bold text-white">
                    Desci FAQ
                </h2>
            </div>

            <!-- FAQ Accordion -->
            <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-transparent text-white" data-inactive-classes="text-gray-300">
                
                <!-- FAQ Item 1 -->
                <h2 id="accordion-flush-heading-1">
                    <button type="button" class="flex items-center justify-between w-full py-6 font-medium text-left text-white border-b border-gray-800 hover:text-crypto-primary transition-colors duration-200" data-accordion-target="#accordion-flush-body-1" aria-expanded="false" aria-controls="accordion-flush-body-1">
                        <span class="text-lg md:text-xl">What is a cryptocurrency exchange?</span>
                        <svg data-accordion-icon class="w-6 h-6 shrink-0 text-gray-400 hover:text-crypto-primary transition-colors duration-200" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                    <div class="py-6 border-b border-gray-800">
                        <p class="text-gray-300 leading-relaxed">
                            A cryptocurrency exchange is a digital platform that allows users to buy, sell, and trade cryptocurrencies. It serves as a marketplace where users can exchange digital assets for other cryptocurrencies or traditional fiat currencies. Desci is a leading cryptocurrency exchange that offers spot trading, futures trading, and various other financial services in the crypto space.
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <h2 id="accordion-flush-heading-2">
                    <button type="button" class="flex items-center justify-between w-full py-6 font-medium text-left text-white border-b border-gray-800 hover:text-crypto-primary transition-colors duration-200" data-accordion-target="#accordion-flush-body-2" aria-expanded="false" aria-controls="accordion-flush-body-2">
                        <span class="text-lg md:text-xl">What products does Desci offer?</span>
                        <svg data-accordion-icon class="w-6 h-6 shrink-0 text-gray-400 hover:text-crypto-primary transition-colors duration-200" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                    <div class="py-6 border-b border-gray-800">
                        <p class="text-gray-300 leading-relaxed mb-4">
                            Desci offers a comprehensive suite of cryptocurrency trading and financial products:
                        </p>
                        <ul class="text-gray-300 space-y-2 ml-4">
                            <li class="flex items-start">
                                <span class="text-crypto-primary mr-2">•</span>
                                <span><strong class="text-white">Spot Trading:</strong> Buy and sell cryptocurrencies at current market prices</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-crypto-primary mr-2">•</span>
                                <span><strong class="text-white">Futures Trading:</strong> Trade cryptocurrency derivatives with leverage up to 125x</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-crypto-primary mr-2">•</span>
                                <span><strong class="text-white">Copy Trading:</strong> Follow and automatically copy successful traders</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-crypto-primary mr-2">•</span>
                                <span><strong class="text-white">P2P Trading:</strong> Peer-to-peer cryptocurrency trading</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-crypto-primary mr-2">•</span>
                                <span><strong class="text-white">Earn Products:</strong> Staking, savings, and yield farming opportunities</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <h2 id="accordion-flush-heading-3">
                    <button type="button" class="flex items-center justify-between w-full py-6 font-medium text-left text-white border-b border-gray-800 hover:text-crypto-primary transition-colors duration-200" data-accordion-target="#accordion-flush-body-3" aria-expanded="false" aria-controls="accordion-flush-body-3">
                        <span class="text-lg md:text-xl">How do you track cryptocurrency prices?</span>
                        <svg data-accordion-icon class="w-6 h-6 shrink-0 text-gray-400 hover:text-crypto-primary transition-colors duration-200" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-3" class="hidden" aria-labelledby="accordion-flush-heading-3">
                    <div class="py-6 border-b border-gray-800">
                        <p class="text-gray-300 leading-relaxed mb-4">
                            Desci provides multiple ways to track cryptocurrency prices in real-time:
                        </p>
                        <ul class="text-gray-300 space-y-2 ml-4">
                            <li class="flex items-start">
                                <span class="text-crypto-primary mr-2">•</span>
                                <span><strong class="text-white">Live Price Charts:</strong> Advanced TradingView charts with technical indicators</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-crypto-primary mr-2">•</span>
                                <span><strong class="text-white">Market Overview:</strong> Comprehensive market data for 600+ cryptocurrencies</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-crypto-primary mr-2">•</span>
                                <span><strong class="text-white">Price Alerts:</strong> Set custom notifications for price movements</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-crypto-primary mr-2">•</span>
                                <span><strong class="text-white">Mobile App:</strong> Track prices on-the-go with our mobile application</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <h2 id="accordion-flush-heading-4">
                    <button type="button" class="flex items-center justify-between w-full py-6 font-medium text-left text-white border-b border-gray-800 hover:text-crypto-primary transition-colors duration-200" data-accordion-target="#accordion-flush-body-4" aria-expanded="false" aria-controls="accordion-flush-body-4">
                        <span class="text-lg md:text-xl">How to trade cryptocurrencies on Desci?</span>
                        <svg data-accordion-icon class="w-6 h-6 shrink-0 text-gray-400 hover:text-crypto-primary transition-colors duration-200" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-4" class="hidden" aria-labelledby="accordion-flush-heading-4">
                    <div class="py-6 border-b border-gray-800">
                        <p class="text-gray-300 leading-relaxed mb-4">
                            Trading cryptocurrencies on Desci is simple and straightforward:
                        </p>
                        <ol class="text-gray-300 space-y-3 ml-4">
                            <li class="flex items-start">
                                <span class="text-crypto-primary mr-3 font-bold">1.</span>
                                <span><strong class="text-white">Create Account:</strong> Sign up and complete identity verification</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-crypto-primary mr-3 font-bold">2.</span>
                                <span><strong class="text-white">Deposit Funds:</strong> Add funds via bank transfer, credit card, or crypto deposit</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-crypto-primary mr-3 font-bold">3.</span>
                                <span><strong class="text-white">Choose Trading Pair:</strong> Select the cryptocurrency pair you want to trade</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-crypto-primary mr-3 font-bold">4.</span>
                                <span><strong class="text-white">Place Order:</strong> Set your buy/sell order with desired price and quantity</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-crypto-primary mr-3 font-bold">5.</span>
                                <span><strong class="text-white">Execute Trade:</strong> Your order will be executed when market conditions are met</span>
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <h2 id="accordion-flush-heading-5">
                    <button type="button" class="flex items-center justify-between w-full py-6 font-medium text-left text-white border-b border-gray-800 hover:text-crypto-primary transition-colors duration-200" data-accordion-target="#accordion-flush-body-5" aria-expanded="false" aria-controls="accordion-flush-body-5">
                        <span class="text-lg md:text-xl">How to earn with crypto on Desci?</span>
                        <svg data-accordion-icon class="w-6 h-6 shrink-0 text-gray-400 hover:text-crypto-primary transition-colors duration-200" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-5" class="hidden" aria-labelledby="accordion-flush-heading-5">
                    <div class="py-6 border-b border-gray-800">
                        <p class="text-gray-300 leading-relaxed mb-4">
                            Desci offers multiple ways to earn passive income with your cryptocurrency:
                        </p>
                        <ul class="text-gray-300 space-y-2 ml-4">
                            <li class="flex items-start">
                                <span class="text-crypto-primary mr-2">•</span>
                                <span><strong class="text-white">Staking:</strong> Earn rewards by staking supported cryptocurrencies</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-crypto-primary mr-2">•</span>
                                <span><strong class="text-white">Savings Products:</strong> Flexible and fixed-term savings with competitive APY</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-crypto-primary mr-2">•</span>
                                <span><strong class="text-white">Liquidity Mining:</strong> Provide liquidity to earn trading fees and rewards</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-crypto-primary mr-2">•</span>
                                <span><strong class="text-white">Launchpad:</strong> Participate in new token launches and earn exclusive rewards</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-crypto-primary mr-2">•</span>
                                <span><strong class="text-white">Copy Trading:</strong> Earn by sharing your trading strategies with other users</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- FAQ Item 6 -->
                <h2 id="accordion-flush-heading-6">
                    <button type="button" class="flex items-center justify-between w-full py-6 font-medium text-left text-white border-b border-gray-800 hover:text-crypto-primary transition-colors duration-200" data-accordion-target="#accordion-flush-body-6" aria-expanded="false" aria-controls="accordion-flush-body-6">
                        <span class="text-lg md:text-xl">Why choose Desci as your cryptocurrency exchange?</span>
                        <svg data-accordion-icon class="w-6 h-6 shrink-0 text-gray-400 hover:text-crypto-primary transition-colors duration-200" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-6" class="hidden" aria-labelledby="accordion-flush-heading-6">
                    <div class="py-6 border-b border-gray-800">
                        <p class="text-gray-300 leading-relaxed mb-4">
                            Desci stands out as a leading cryptocurrency exchange for several key reasons:
                        </p>
                        <ul class="text-gray-300 space-y-2 ml-4">
                            <li class="flex items-start">
                                <span class="text-crypto-primary mr-2">•</span>
                                <span><strong class="text-white">Security First:</strong> $689M protection fund and industry-leading security measures</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-crypto-primary mr-2">•</span>
                                <span><strong class="text-white">Global Reach:</strong> Serving 100+ million users across 100+ countries</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-crypto-primary mr-2">•</span>
                                <span><strong class="text-white">Low Fees:</strong> Competitive trading fees and transparent pricing</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-crypto-primary mr-2">•</span>
                                <span><strong class="text-white">Innovation:</strong> Leading copy trading platform and cutting-edge features</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-crypto-primary mr-2">•</span>
                                <span><strong class="text-white">24/7 Support:</strong> Round-the-clock customer service in multiple languages</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-crypto-primary mr-2">•</span>
                                <span><strong class="text-white">Regulatory Compliance:</strong> Licensed and regulated in multiple jurisdictions</span>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
