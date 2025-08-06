@extends('web.layout.app')
@section('title', 'Copy Trading')
@section('content')
    <!-- Hero Section -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold mb-4 leading-tight">
                        Trade smarter,<br>
                        just copy trading!
                    </h1>
                    <div class="flex items-center space-x-2 mb-8">
                        <svg class="w-5 h-5 text-crypto-primary" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-gray-300">Upcoming elite trader list requirements and perks</span>
                    </div>
                </div>

                <div class="relative">
                    <div class="bg-gradient-to-br from-crypto-primary to-orange-500 rounded-2xl p-8 text-black relative overflow-hidden">
                        <div class="relative z-10">
                            <h3 class="text-2xl font-bold mb-6">Join Trading Challenge and Win Your LALIGA Rewards!</h3>
                            <button class="bg-black text-white px-6 py-3 rounded-lg font-semibold hover:bg-gray-800 transition-colors">
                                Join Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Top Traders Section -->
    <section class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-2xl font-bold">High ROI</h2>
                    <p class="text-gray-400 text-sm">Elite traders with the highest ROI</p>
                </div>
                <button class="text-crypto-primary hover:text-yellow-400 text-sm font-medium">More</button>
            </div>

            <!-- Traders Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Trader Card 1 - HappyTrading -->
                @forelse($copyTraders as $trader)

                <div class="bg-crypto-accent rounded-lg border border-gray-700 overflow-hidden">
                    <div class="p-4">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="relative">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center">
                                    <span class="text-white font-bold uppercase">{{ Str::limit($trader->name, 1, '') }}</span>
                                </div>
                                <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 rounded-full flex items-center justify-center">
                                    <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <div class="font-medium text-white">{{ $trader->name }}</div>

                                <div class="text-xs text-gray-400">Verified</div>
                            </div>
                        </div>

                        <div class="text-center mb-4">
                            <div class="text-2xl font-bold text-green-400">+{{ number_format($trader->roi * rand(100, 300), 2) }}%</div>

                            <div class="text-xs text-gray-400">ROI (All time)</div>
                        </div>

                        <div class="border-t border-gray-700 pt-4">
                            <div class="grid grid-cols-2 gap-4 text-xs mb-4">
                                <div>
                                    <div class="text-gray-400">Total PnL</div>
                                    <div class="text-white font-medium">${{ number_format($trader->pnl, 2) }}</div>
                                </div>
                                <div>
                                    <div class="text-gray-400">Copiers</div>
                                    <div class="text-white font-medium">{{ number_format($trader->copiers, 0) }}</div>
                                </div>
                                <div>
                                    <div class="text-gray-400">Copy AUM</div>
                                    <div class="text-white font-medium">${{ number_format($trader->total_aum, 2) }}</div>
                                </div>
                                <div>
                                    <div class="text-gray-400">Win Rate</div>
                                    <div class="text-white font-medium">{{ number_format($trader->win_rate, 2) }}%</div>
                                </div>
                            </div>

                            <div class="flex space-x-2">
                                <a href="#" class="flex-1 bg-crypto-primary text-black py-2 px-4 rounded text-sm font-medium hover:bg-yellow-400 transition-colors">
                                    Copy
                                </a>
                                <button class="px-3 py-2 border border-gray-600 rounded text-sm hover:border-gray-500 transition-colors" data-modal-target="copy-{{ $trader->id }}-modal" data-modal-toggle="copy-{{ $trader->id }}-modal">

                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-4 text-center">
                    <p class="text-gray-400">No copy traders found.</p>
                </div>
                @endforelse

                <!-- Trader Card 2 - TradeMaster -->
                {{-- <div class="bg-crypto-accent rounded-lg border border-gray-700 overflow-hidden">
                    <div class="p-4">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="relative">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-teal-500 rounded-full flex items-center justify-center">
                                    <span class="text-white font-bold">T</span>
                                </div>
                                <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 rounded-full flex items-center justify-center">
                                    <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <div class="font-medium text-white">TradeMaster</div>
                                <div class="text-xs text-gray-400">Verified</div>
                            </div>
                        </div>

                        <div class="text-center mb-4">
                            <div class="text-2xl font-bold text-green-400">+46,912.5%</div>
                            <div class="text-xs text-gray-400">ROI (All time)</div>
                        </div>

                        <div class="border-t border-gray-700 pt-4">
                            <div class="grid grid-cols-2 gap-4 text-xs mb-4">
                                <div>
                                    <div class="text-gray-400">Total PnL</div>
                                    <div class="text-white font-medium">$86,392.47</div>
                                </div>
                                <div>
                                    <div class="text-gray-400">Copiers</div>
                                    <div class="text-white font-medium">1,892</div>
                                </div>
                                <div>
                                    <div class="text-gray-400">Copy AUM</div>
                                    <div class="text-white font-medium">$65,234.12</div>
                                </div>
                                <div>
                                    <div class="text-gray-400">Win Rate</div>
                                    <div class="text-white font-medium">72.1%</div>
                                </div>
                            </div>

                            <div class="flex space-x-2">
                                <button class="flex-1 bg-crypto-primary text-black py-2 px-4 rounded text-sm font-medium hover:bg-yellow-400 transition-colors">
                                    Copy
                                </button>
                                <button class="px-3 py-2 border border-gray-600 rounded text-sm hover:border-gray-500 transition-colors" data-modal-target="trademaster-modal" data-modal-toggle="trademaster-modal">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <section class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-2xl font-bold">High Yields</h2>
                    <p class="text-gray-400 text-sm">Elite traders with the highest Yields</p>
                </div>
                <button class="text-crypto-primary hover:text-yellow-400 text-sm font-medium">More</button>
            </div>

            <!-- Traders Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Trader Card 1 - HappyTrading -->
                <div class="bg-crypto-accent rounded-lg border border-gray-700 overflow-hidden">
                    <div class="p-4">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="relative">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center">
                                    <span class="text-white font-bold">H</span>
                                </div>
                                <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 rounded-full flex items-center justify-center">
                                    <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <div class="font-medium text-white">HappyTrading</div>
                                <div class="text-xs text-gray-400">Verified</div>
                            </div>
                        </div>

                        <div class="text-center mb-4">
                            <div class="text-2xl font-bold text-green-400">+47,081.54%</div>
                            <div class="text-xs text-gray-400">ROI (All time)</div>
                        </div>

                        <div class="border-t border-gray-700 pt-4">
                            <div class="grid grid-cols-2 gap-4 text-xs mb-4">
                                <div>
                                    <div class="text-gray-400">Total PnL</div>
                                    <div class="text-white font-medium">$94,539.65</div>
                                </div>
                                <div>
                                    <div class="text-gray-400">Copiers</div>
                                    <div class="text-white font-medium">2,156</div>
                                </div>
                                <div>
                                    <div class="text-gray-400">Copy AUM</div>
                                    <div class="text-white font-medium">$78,456.89</div>
                                </div>
                                <div>
                                    <div class="text-gray-400">Win Rate</div>
                                    <div class="text-white font-medium">67.8%</div>
                                </div>
                            </div>

                            <div class="flex space-x-2">
                                <button class="flex-1 bg-crypto-primary text-black py-2 px-4 rounded text-sm font-medium hover:bg-yellow-400 transition-colors">
                                    Copy
                                </button>
                                <button class="px-3 py-2 border border-gray-600 rounded text-sm hover:border-gray-500 transition-colors" data-modal-target="happytrading-modal" data-modal-toggle="happytrading-modal">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Trader Card 2 - TradeMaster -->
                <div class="bg-crypto-accent rounded-lg border border-gray-700 overflow-hidden">
                    <div class="p-4">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="relative">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-teal-500 rounded-full flex items-center justify-center">
                                    <span class="text-white font-bold">T</span>
                                </div>
                                <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 rounded-full flex items-center justify-center">
                                    <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <div class="font-medium text-white">TradeMaster</div>
                                <div class="text-xs text-gray-400">Verified</div>
                            </div>
                        </div>

                        <div class="text-center mb-4">
                            <div class="text-2xl font-bold text-green-400">+46,912.5%</div>
                            <div class="text-xs text-gray-400">ROI (All time)</div>
                        </div>

                        <div class="border-t border-gray-700 pt-4">
                            <div class="grid grid-cols-2 gap-4 text-xs mb-4">
                                <div>
                                    <div class="text-gray-400">Total PnL</div>
                                    <div class="text-white font-medium">$86,392.47</div>
                                </div>
                                <div>
                                    <div class="text-gray-400">Copiers</div>
                                    <div class="text-white font-medium">1,892</div>
                                </div>
                                <div>
                                    <div class="text-gray-400">Copy AUM</div>
                                    <div class="text-white font-medium">$65,234.12</div>
                                </div>
                                <div>
                                    <div class="text-gray-400">Win Rate</div>
                                    <div class="text-white font-medium">72.1%</div>
                                </div>
                            </div>

                            <div class="flex space-x-2">
                                <button class="flex-1 bg-crypto-primary text-black py-2 px-4 rounded text-sm font-medium hover:bg-yellow-400 transition-colors">
                                    Copy
                                </button>
                                <button class="px-3 py-2 border border-gray-600 rounded text-sm hover:border-gray-500 transition-colors" data-modal-target="trademaster-modal" data-modal-toggle="trademaster-modal">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @foreach ($copyTraders as $trader)        
        <!-- HappyTrading Detailed Modal -->
        <div id="copy-{{ $trader->id }}-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">

            <div class="relative p-4 w-full max-w-6xl max-h-full">
                <div class="relative bg-crypto-accent rounded-lg shadow border border-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b border-gray-700">
                        <div class="flex items-center space-x-4">
                            <div class="relative">
                                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center">
                                    <span class="text-white font-bold text-xl uppercase">{{ Str::limit($trader->name,1, '') }}</span>
                                </div>
                                <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-white">{{ $trader->name }}</h3>
                                <div class="flex items-center space-x-2">
                                    <span class="text-sm text-gray-400">Verified {{ $trader->level }} Trader</span>
                                    <span class="bg-crypto-primary text-black text-xs px-2 py-1 rounded">Pro</span>
                                </div>
                                <div class="text-sm text-gray-400 mt-1">Member since: {{ \Carbon\Carbon::parse($trader->memeber_since)->format('M d, Y') }} • Last active: </div>
                            </div>
                        </div>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-600 hover:text-white rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="happytrading-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>

                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <!-- Performance Overview -->
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                            <!-- Key Metrics -->
                            <div class="lg:col-span-2">
                                <h4 class="text-lg font-semibold mb-4">Performance Overview</h4>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                                    <div class="  rounded-lg p-4 text-center">
                                        <div class="text-2xl font-bold text-green-400">+{{ $trader->roi }}%</div>

                                        <div class="text-xs text-gray-400">Total ROI</div>
                                    </div>
                                    <div class="  rounded-lg p-4 text-center">
                                        <div class="text-2xl font-bold text-white">${{ $trader->pnl }}</div>
                                        <div class="text-xs text-gray-400">Total PnL</div>
                                    </div>
                                    <div class="  rounded-lg p-4 text-center">
                                        <div class="text-2xl font-bold text-crypto-primary">{{ $trader->copiers }}</div>
                                        <div class="text-xs text-gray-400">Copiers</div>
                                    </div>
                                    <div class="  rounded-lg p-4 text-center">
                                        <div class="text-2xl font-bold text-white">{{ $trader->win_rate }}%</div>
                                        <div class="text-xs text-gray-400">Win Rate</div>
                                    </div>
                                </div>

                                <!-- Performance Chart -->
                                <div class="  rounded-lg p-4">
                                    <h5 class="font-semibold mb-4">Portfolio Performance (Last 12 Months)</h5>
                                    <canvas id="happytrading-chart" class="max-h-[200px]" width="400" height="200"></canvas>
                                </div>
                            </div>

                            <!-- Trading Statistics -->
                            <div>
                                <h4 class="text-lg font-semibold mb-4">Trading Statistics</h4>
                                <div class="  rounded-lg p-4 space-y-4">
                                    <div class="flex justify-between">
                                        <span class="text-gray-400">Copy AUM</span>
                                        <span class="text-white font-medium">${{ $trader->aum }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-400">Sharpe Ratio</span>
                                        <span class="text-green-400 font-medium">{{ $trader->sharp_ratio }}</span>

                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-400">Risk Level</span>
                                        @php
                                            $riskLevel = $trader->risk_level;
                                            $yellowDots = match($riskLevel) {
                                                'low' => 1,
                                                'medium' => 3, 
                                                'high' => 5,
                                                default => 0
                                            };
                                        @endphp
                                        <div class="flex space-x-1">
                                            @for($i = 1; $i <= 5; $i++)
                                                <div class="w-2 h-2 {{ $i <= $yellowDots ? 'bg-yellow-500' : 'bg-gray-600' }} rounded-full"></div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>

                                <!-- Copy Settings -->
                                <div class="mt-6">
                                    <h5 class="font-semibold mb-3">Copy Settings</h5>
                                    <div class="  rounded-lg p-4 space-y-3">
                                        <div class="flex justify-between">
                                            <span class="text-gray-400">Min Copy Amount</span>
                                            <span class="text-white font-medium">${{ $trader->min_copy_amount }}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-gray-400">Max Copy Amount</span>
                                            <span class="text-white font-medium">${{ $trader->max_copy_amount }}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-gray-400">Copy Fee</span>
                                            <span class="text-crypto-primary font-medium">{{ $trader->fee ? $trader->fee()->first()->fee : 0 }}%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tabs for detailed information -->
                        <div class="mb-4 border-b border-gray-700">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="happytrading-tabs" data-tabs-toggle="#happytrading-tab-content" role="tablist">
                                <li class="me-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-300 hover:border-gray-600" id="positions-tab" data-tabs-target="#positions" type="button" role="tab" aria-controls="positions" aria-selected="false">Current
                                        Positions</button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button class="inline-block p-4 text-crypto-primary border-b-2 border-crypto-primary rounded-t-lg active" id="history-tab" data-tabs-target="#history" type="button" role="tab" aria-controls="history" aria-selected="true">Trading History</button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-300 hover:border-gray-600" id="analysis-tab" data-tabs-target="#analysis" type="button" role="tab" aria-controls="analysis" aria-selected="false">Analysis</button>
                                </li>
                            </ul>
                        </div>

                        <div id="happytrading-tab-content">
                            <!-- Current Positions Tab -->
                            <div class="hidden" id="positions" role="tabpanel" aria-labelledby="positions-tab">
                                <div class="overflow-x-auto">
                                    <table class="w-full text-sm text-left text-gray-300">
                                        <thead class="text-xs text-gray-400 uppercase  ">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">Symbol</th>
                                                <th scope="col" class="px-6 py-3">Side</th>
                                                <th scope="col" class="px-6 py-3">Size</th>
                                                <th scope="col" class="px-6 py-3">Entry Price</th>
                                                <th scope="col" class="px-6 py-3">Current Price</th>
                                                <th scope="col" class="px-6 py-3">PnL</th>
                                                <th scope="col" class="px-6 py-3">ROI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="bg-crypto-accent border-b border-gray-700">
                                                <td class="px-6 py-4 font-medium text-white">BTC/USDT</td>
                                                <td class="px-6 py-4"><span class="bg-green-500 text-white px-2 py-1 rounded text-xs">Long</span></td>
                                                <td class="px-6 py-4">0.5 BTC</td>
                                                <td class="px-6 py-4">$42,500</td>
                                                <td class="px-6 py-4">$45,200</td>
                                                <td class="px-6 py-4 text-green-400">+$1,350</td>
                                                <td class="px-6 py-4 text-green-400">+6.35%</td>
                                            </tr>
                                            <tr class="bg-crypto-accent border-b border-gray-700">
                                                <td class="px-6 py-4 font-medium text-white">ETH/USDT</td>
                                                <td class="px-6 py-4"><span class="bg-green-500 text-white px-2 py-1 rounded text-xs">Long</span></td>
                                                <td class="px-6 py-4">10 ETH</td>
                                                <td class="px-6 py-4">$2,800</td>
                                                <td class="px-6 py-4">$3,100</td>
                                                <td class="px-6 py-4 text-green-400">+$3,000</td>
                                                <td class="px-6 py-4 text-green-400">+10.71%</td>
                                            </tr>
                                            <tr class="bg-crypto-accent border-b border-gray-700">
                                                <td class="px-6 py-4 font-medium text-white">SOL/USDT</td>
                                                <td class="px-6 py-4"><span class="bg-red-500 text-white px-2 py-1 rounded text-xs">Short</span></td>
                                                <td class="px-6 py-4">100 SOL</td>
                                                <td class="px-6 py-4">$95.50</td>
                                                <td class="px-6 py-4">$89.20</td>
                                                <td class="px-6 py-4 text-green-400">+$630</td>
                                                <td class="px-6 py-4 text-green-400">+6.59%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Trading History Tab -->
                            <div class="" id="history" role="tabpanel" aria-labelledby="history-tab">
                                <div class="overflow-x-auto">
                                    <table class="w-full text-sm text-left text-gray-300">
                                        <thead class="text-xs text-gray-400 uppercase  ">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">Date</th>
                                                <th scope="col" class="px-6 py-3">Symbol</th>
                                                <th scope="col" class="px-6 py-3">Side</th>
                                                <th scope="col" class="px-6 py-3">Entry</th>
                                                <th scope="col" class="px-6 py-3">Exit</th>
                                                <th scope="col" class="px-6 py-3">PnL</th>
                                                <th scope="col" class="px-6 py-3">ROI</th>
                                                <th scope="col" class="px-6 py-3">Duration</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="bg-crypto-accent border-b border-gray-700">
                                                <td class="px-6 py-4">2024-01-15</td>
                                                <td class="px-6 py-4 font-medium text-white">BTC/USDT</td>
                                                <td class="px-6 py-4"><span class="bg-green-500 text-white px-2 py-1 rounded text-xs">Long</span></td>
                                                <td class="px-6 py-4">$41,200</td>
                                                <td class="px-6 py-4">$44,800</td>
                                                <td class="px-6 py-4 text-green-400">+$1,800</td>
                                                <td class="px-6 py-4 text-green-400">+8.74%</td>
                                                <td class="px-6 py-4">3.2 days</td>
                                            </tr>
                                            <tr class="bg-crypto-accent border-b border-gray-700">
                                                <td class="px-6 py-4">2024-01-12</td>
                                                <td class="px-6 py-4 font-medium text-white">ETH/USDT</td>
                                                <td class="px-6 py-4"><span class="bg-red-500 text-white px-2 py-1 rounded text-xs">Short</span></td>
                                                <td class="px-6 py-4">$2,950</td>
                                                <td class="px-6 py-4">$2,720</td>
                                                <td class="px-6 py-4 text-green-400">+$2,300</td>
                                                <td class="px-6 py-4 text-green-400">+7.80%</td>
                                                <td class="px-6 py-4">1.8 days</td>
                                            </tr>
                                            <tr class="bg-crypto-accent border-b border-gray-700">
                                                <td class="px-6 py-4">2024-01-10</td>
                                                <td class="px-6 py-4 font-medium text-white">ADA/USDT</td>
                                                <td class="px-6 py-4"><span class="bg-green-500 text-white px-2 py-1 rounded text-xs">Long</span></td>
                                                <td class="px-6 py-4">$0.485</td>
                                                <td class="px-6 py-4">$0.520</td>
                                                <td class="px-6 py-4 text-green-400">+$875</td>
                                                <td class="px-6 py-4 text-green-400">+7.22%</td>
                                                <td class="px-6 py-4">2.1 days</td>
                                            </tr>
                                            <tr class="bg-crypto-accent border-b border-gray-700">
                                                <td class="px-6 py-4">2024-01-08</td>
                                                <td class="px-6 py-4 font-medium text-white">DOGE/USDT</td>
                                                <td class="px-6 py-4"><span class="bg-green-500 text-white px-2 py-1 rounded text-xs">Long</span></td>
                                                <td class="px-6 py-4">$0.078</td>
                                                <td class="px-6 py-4">$0.072</td>
                                                <td class="px-6 py-4 text-red-400">-$450</td>
                                                <td class="px-6 py-4 text-red-400">-7.69%</td>
                                                <td class="px-6 py-4">0.9 days</td>
                                            </tr>
                                            <tr class="bg-crypto-accent border-b border-gray-700">
                                                <td class="px-6 py-4">2024-01-05</td>
                                                <td class="px-6 py-4 font-medium text-white">MATIC/USDT</td>
                                                <td class="px-6 py-4"><span class="bg-green-500 text-white px-2 py-1 rounded text-xs">Long</span></td>
                                                <td class="px-6 py-4">$0.92</td>
                                                <td class="px-6 py-4">$1.08</td>
                                                <td class="px-6 py-4 text-green-400">+$1,600</td>
                                                <td class="px-6 py-4 text-green-400">+17.39%</td>
                                                <td class="px-6 py-4">4.3 days</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Analysis Tab -->
                            <div class="hidden" id="analysis" role="tabpanel" aria-labelledby="analysis-tab">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Trading Patterns -->
                                    <div class="  rounded-lg p-4">
                                        <h5 class="font-semibold mb-4">Trading Patterns</h5>
                                        <div class="space-y-3">
                                            <div class="flex justify-between">
                                                <span class="text-gray-400">Preferred Assets</span>
                                                <span class="text-white">BTC, ETH, SOL</span>
                                            </div>
                                            <div class="flex justify-between">
                                                <span class="text-gray-400">Trading Style</span>
                                                <span class="text-white">Swing Trading</span>
                                            </div>
                                            <div class="flex justify-between">
                                                <span class="text-gray-400">Best Performance</span>
                                                <span class="text-white">Bull Markets</span>
                                            </div>
                                            <div class="flex justify-between">
                                                <span class="text-gray-400">Risk Management</span>
                                                <span class="text-green-400">Excellent</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Monthly Performance -->
                                    <div class="  rounded-lg p-4">
                                        <h5 class="font-semibold mb-4">Monthly Performance</h5>
                                        <div class="space-y-2">
                                            <div class="flex justify-between items-center">
                                                <span class="text-gray-400">January 2024</span>
                                                <span class="text-green-400">+12.5%</span>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <span class="text-gray-400">December 2023</span>
                                                <span class="text-green-400">+8.9%</span>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <span class="text-gray-400">November 2023</span>
                                                <span class="text-green-400">+15.2%</span>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <span class="text-gray-400">October 2023</span>
                                                <span class="text-red-400">-3.1%</span>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <span class="text-gray-400">September 2023</span>
                                                <span class="text-green-400">+7.8%</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Risk Metrics -->
                                    <div class="  rounded-lg p-4">
                                        <h5 class="font-semibold mb-4">Risk Metrics</h5>
                                        <div class="space-y-3">
                                            <div class="flex justify-between">
                                                <span class="text-gray-400">Value at Risk (VaR)</span>
                                                <span class="text-white">-5.2%</span>
                                            </div>
                                            <div class="flex justify-between">
                                                <span class="text-gray-400">Beta</span>
                                                <span class="text-white">1.15</span>
                                            </div>
                                            <div class="flex justify-between">
                                                <span class="text-gray-400">Alpha</span>
                                                <span class="text-green-400">+8.3%</span>
                                            </div>
                                            <div class="flex justify-between">
                                                <span class="text-gray-400">Volatility</span>
                                                <span class="text-white">18.5%</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Copier Insights -->
                                    <div class="  rounded-lg p-4">
                                        <h5 class="font-semibold mb-4">Copier Insights</h5>
                                        <div class="space-y-3">
                                            <div class="flex justify-between">
                                                <span class="text-gray-400">Avg Copy Amount</span>
                                                <span class="text-white">$2,450</span>
                                            </div>
                                            <div class="flex justify-between">
                                                <span class="text-gray-400">Retention Rate</span>
                                                <span class="text-green-400">89.2%</span>
                                            </div>
                                            <div class="flex justify-between">
                                                <span class="text-gray-400">Copier Satisfaction</span>
                                                <span class="text-green-400">4.8/5.0</span>
                                            </div>
                                            <div class="flex justify-between">
                                                <span class="text-gray-400">New Copiers (30d)</span>
                                                <span class="text-crypto-primary">+156</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex space-x-4 mt-8">
                            <button class="flex-1 bg-crypto-primary text-black py-3 px-6 rounded-lg font-semibold hover:bg-yellow-400 transition-colors">
                                Copy This Trader
                            </button>
                            <button class="px-6 py-3 border border-gray-600 rounded-lg hover:border-gray-500 transition-colors">
                                Add to Watchlist
                            </button>
                            <button class="px-6 py-3 border border-gray-600 rounded-lg hover:border-gray-500 transition-colors">
                                Share Profile
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- TradeMaster Detailed Modal -->
    {{-- <div id="trademaster-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-6xl max-h-full">
            <div class="relative bg-crypto-accent rounded-lg shadow border border-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b border-gray-700">
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-500 rounded-full flex items-center justify-center">
                                <span class="text-white font-bold text-xl">T</span>
                            </div>
                            <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-white">TradeMaster</h3>
                            <div class="flex items-center space-x-2">
                                <span class="text-sm text-gray-400">Verified Elite Trader</span>
                                <span class="bg-crypto-primary text-black text-xs px-2 py-1 rounded">Expert</span>
                            </div>
                            <div class="text-sm text-gray-400 mt-1">Member since: Mar 2021 • Last active: 1 hour ago</div>
                        </div>
                    </div>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-600 hover:text-white rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="trademaster-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <!-- Performance Overview -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                        <!-- Key Metrics -->
                        <div class="lg:col-span-2">
                            <h4 class="text-lg font-semibold mb-4">Performance Overview</h4>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                                <div class="  rounded-lg p-4 text-center">
                                    <div class="text-2xl font-bold text-green-400">+46,912.5%</div>
                                    <div class="text-xs text-gray-400">Total ROI</div>
                                </div>
                                <div class="  rounded-lg p-4 text-center">
                                    <div class="text-2xl font-bold text-white">$86,392.47</div>
                                    <div class="text-xs text-gray-400">Total PnL</div>
                                </div>
                                <div class="  rounded-lg p-4 text-center">
                                    <div class="text-2xl font-bold text-crypto-primary">1,892</div>
                                    <div class="text-xs text-gray-400">Copiers</div>
                                </div>
                                <div class="  rounded-lg p-4 text-center">
                                    <div class="text-2xl font-bold text-white">72.1%</div>
                                    <div class="text-xs text-gray-400">Win Rate</div>
                                </div>
                            </div>

                            <!-- Performance Chart -->
                            <div class="  rounded-lg p-4">
                                <h5 class="font-semibold mb-4">Portfolio Performance (Last 12 Months)</h5>
                                <canvas id="trademaster-chart" class="max-h-[200px]" width="400" height="200"></canvas>
                            </div>
                        </div>

                        <!-- Trading Statistics -->
                        <div>
                            <h4 class="text-lg font-semibold mb-4">Trading Statistics</h4>
                            <div class="  rounded-lg p-4 space-y-4">
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Copy AUM</span>
                                    <span class="text-white font-medium">$65,234.12</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Max Drawdown</span>
                                    <span class="text-red-400 font-medium">-8.92%</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Avg Holding Time</span>
                                    <span class="text-white font-medium">4.2 days</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Trading Frequency</span>
                                    <span class="text-white font-medium">Medium</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Sharpe Ratio</span>
                                    <span class="text-green-400 font-medium">3.12</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-400">Risk Level</span>
                                    <div class="flex space-x-1">
                                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                        <div class="w-2 h-2 bg-gray-600 rounded-full"></div>
                                        <div class="w-2 h-2 bg-gray-600 rounded-full"></div>
                                        <div class="w-2 h-2 bg-gray-600 rounded-full"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Copy Settings -->
                            <div class="mt-6">
                                <h5 class="font-semibold mb-3">Copy Settings</h5>
                                <div class="  rounded-lg p-4 space-y-3">
                                    <div class="flex justify-between">
                                        <span class="text-gray-400">Min Copy Amount</span>
                                        <span class="text-white font-medium">$200</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-400">Max Copy Amount</span>
                                        <span class="text-white font-medium">$100,000</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-400">Copy Fee</span>
                                        <span class="text-crypto-primary font-medium">12%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex space-x-4 mt-8">
                        <button class="flex-1 bg-crypto-primary text-black py-3 px-6 rounded-lg font-semibold hover:bg-yellow-400 transition-colors">
                            Copy This Trader
                        </button>
                        <button class="px-6 py-3 border border-gray-600 rounded-lg hover:border-gray-500 transition-colors">
                            Add to Watchlist
                        </button>
                        <button class="px-6 py-3 border border-gray-600 rounded-lg hover:border-gray-500 transition-colors">
                            Share Profile
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
@push('script')
    <script>
        // Initialize performance charts
        document.addEventListener('DOMContentLoaded', function() {
            // HappyTrading Chart
            const happyTradingCtx = document.getElementById('happytrading-chart');
            if (happyTradingCtx) {
                new Chart(happyTradingCtx, {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        datasets: [{
                            label: 'Portfolio Value',
                            data: [100, 112, 125, 118, 135, 142, 158, 145, 162, 178, 185, 195],
                            borderColor: '#F7D33E',
                            backgroundColor: 'rgba(247, 211, 62, 0.1)',
                            borderWidth: 2,
                            fill: true,
                            tension: 0.4
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            x: {
                                grid: {
                                    color: 'rgba(255, 255, 255, 0.1)'
                                },
                                ticks: {
                                    color: '#9CA3AF'
                                }
                            },
                            y: {
                                grid: {
                                    color: 'rgba(255, 255, 255, 0.1)'
                                },
                                ticks: {
                                    color: '#9CA3AF',
                                    callback: function(value) {
                                        return value + '%';
                                    }
                                }
                            }
                        }
                    }
                });
            }

            // TradeMaster Chart
            const tradeMasterCtx = document.getElementById('trademaster-chart');
            if (tradeMasterCtx) {
                new Chart(tradeMasterCtx, {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        datasets: [{
                            label: 'Portfolio Value',
                            data: [100, 108, 122, 115, 128, 138, 145, 152, 148, 165, 172, 180],
                            borderColor: '#10B981',
                            backgroundColor: 'rgba(16, 185, 129, 0.1)',
                            borderWidth: 2,
                            fill: true,
                            tension: 0.4
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            x: {
                                grid: {
                                    color: 'rgba(255, 255, 255, 0.1)'
                                },
                                ticks: {
                                    color: '#9CA3AF'
                                }
                            },
                            y: {
                                grid: {
                                    color: 'rgba(255, 255, 255, 0.1)'
                                },
                                ticks: {
                                    color: '#9CA3AF',
                                    callback: function(value) {
                                        return value + '%';
                                    }
                                }
                            }
                        }
                    }
                });
            }
        });
    </script>
@endpush
