@extends('web.layout.app')
@section('title', 'Arbitrage Bots')
@push('style')
    <style>
        /* Custom scrollbar for the portfolio list */
        .scrollbar-thin::-webkit-scrollbar {
            width: 8px;
        }

        .scrollbar-thin::-webkit-scrollbar-track {
            background: transparent;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb {
            background-color: #4a4a4a;
            /* crypto-border */
            border-radius: 4px;
        }
    </style>
@endpush
@section('content')
    <section class="min-h-screen bg-zinc-950 text-gray-100 grid grid-cols-[1fr_320px] max-w-screen-2xl mx-auto justify-center">
        <div>
            <div class="bg-crypto-accent rounded-xl p-3  m-1">
                <h2 class="text-xl font-bold">Welcome To Arbitrage Bot</h2>
            </div>
            <div class="flex-1 grid grid-cols-1 lg:grid-cols-[310px_1fr] gap-1 mb-2 mx-1 items-start">
                <!-- Left Sidebar -->
                <div class="bg-crypto-accent h-[600px] rounded-xl flex flex-col gap-3">
                    {{-- <h2 class="text-lg font-semibold text-crypto-primary">Welcome to Arbitrage Bot</h2> --}}
                    <div class="relative mt-5 mx-2">
                        <div class="absolute left-0 top-0 m-2 text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search">
                                <circle cx="11" cy="11" r="8" />
                                <path d="m21 21-4.3-4.3" />
                            </svg>
                        </div>
                        <input type="text" placeholder="Search" class="block w-full pl-9 pr-3 py-1 rounded-lg bg-crypto-accent border border-gray-400 text-gray-100 placeholder:text-gray-400 focus:border-crypto-primary focus:ring-crypto-primary" />
                    </div>
                    <div class="flex items-center gap-2 mx-2 justify-center">
                        <select id="usd-m-select" class="bg-crypto-accent border border-gray-400 text-gray-300  text-sm rounded-lg focus:ring-crypto-primary focus:border-crypto-primary block w-full p-2">
                            <option selected value="usd">USD-M</option>
                            <option value="coin-m">COIN-M</option>
                        </select>
                        <select id="3d-select" class="bg-crypto-accent border border-gray-400 text-gray-300 text-sm rounded-lg focus:ring-crypto-primary focus:border-crypto-primary block w-full p-2">
                            <option selected value="3d">3D</option>
                            <option value="7d">7D</option>
                            <option value="30d">30D</option>
                        </select>
                    </div>
                    <div class="flex gap-0 justify-start items-center text-nowrap mx-2">
                        <button type="button" class="px-1 text-xs text-crypto-primary">
                            All
                        </button>
                        <button type="button" class="px-1 text-xs  text-gray-200">
                            Positive Carry
                        </button>
                        <button type="button" class="px-1 text-xs  text-gray-200">
                            Reverse Carry
                        </button>
                    </div>
                    <div class="flex items-center justify-between text-xs text-gray-400 mx-2">
                        <span>Portfolio</span>
                        <div class="flex items-center gap-1">
                            <span>3D Funding%</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M12 16v-4" />
                                <path d="M12 8h.01" />
                            </svg>
                            <span>/ APR</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M12 16v-4" />
                                <path d="M12 8h.01" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1 overflow-y-auto scrollbar-thin">
                        <div class="grid gap-0">
                            {{-- @php
                                $portfolioItems = [
                                    ['name' => 'BTCUSDT Perp', 'symbol' => 'BTC/USDT', 'funding' => '0.0342%', 'apr' => '4.17%', 'icon' => '/placeholder.svg?height=20&width=20', 'isNegative' => false],
                                    ['name' => 'BABYUSDT Perp', 'symbol' => 'BABY/USDT', 'funding' => '-0.1363%', 'apr' => '16.59%', 'icon' => '/placeholder.svg?height=20&width=20', 'isNegative' => true],
                                    ['name' => 'FORTHUSDT Perp', 'symbol' => 'FORTH/USDT', 'funding' => '0.0865%', 'apr' => '10.53%', 'icon' => '/placeholder.svg?height=20&width=20', 'isNegative' => false],
                                    ['name' => 'ETHUSDT Perp', 'symbol' => 'ETH/USDT', 'funding' => '0.0510%', 'apr' => '6.2%', 'icon' => '/placeholder.svg?height=20&width=20', 'isNegative' => false],
                                    ['name' => 'BCHUSDT Perp', 'symbol' => 'BCH/USDT', 'funding' => '-0.1011%', 'apr' => '12.3%', 'icon' => '/placeholder.svg?height=20&width=20', 'isNegative' => true],
                                    ['name' => 'XRPUSDT Perp', 'symbol' => 'XRP/USDT', 'funding' => '0.0305%', 'apr' => '3.72%', 'icon' => '/placeholder.svg?height=20&width=20', 'isNegative' => false],
                                    ['name' => 'LTCUSDT Perp', 'symbol' => 'LTC/USDT', 'funding' => '0.0337%', 'apr' => '4.11%', 'icon' => '/placeholder.svg?height=20&width=20', 'isNegative' => false],
                                    ['name' => 'STOUSDT Perp', 'symbol' => 'STO/USDT', 'funding' => '0.0288%', 'apr' => '3.51%', 'icon' => '/placeholder.svg?height=20&width=20', 'isNegative' => false],
                                    ['name' => 'TRXUSDT Perp', 'symbol' => 'TRX/USDT', 'funding' => '0.0240%', 'apr' => '2.92%', 'icon' => '/placeholder.svg?height=20&width=20', 'isNegative' => false],
                                ];
                            @endphp --}}
                            @foreach ($bots as $item)
                                <div class="flex items-center hover:bg-crypto-primary/10 cursor-pointer duration-75 rounded justify-between text-sm p-2 relative">
                                    <div class="flex flex-col align-top gap-2">
                                        {{-- <img src="{{ $item['icon'] }}" alt="{{ $item['name'] }}" width="20" height="20" /> --}}
                                        <div class="flex items-center gap-1">
                                            <span class="bg-green-900 text-green-500 w-3 h-3 rounded text-xs inline-flex items-center content-center justify-center font-medium">S</span>
                                            <div class="font-medium">{{ $item->tradingPair->base_asset . $item->tradingPair->quote_asset }}</div>
                                        </div>
                                        <div class="flex items-center gap-1">
                                            <span class="bg-red-900 text-red-500 w-3 h-3 rounded text-xs inline-flex items-center content-center justify-center font-medium">B</span>
                                            <div class="font-medium">{{ $item->tradingPair->base_asset . '/' . $item->tradingPair->quote_asset }}</div>
                                        </div>
                                    </div>
                                    <div class="text-right text-xs">
                                        <div class="text-gray-200">{{ $item->intervals->where('is_active', 1)->first()->apr_3d }}%</div>
                                        <div class="text-green-600">
                                            {{ $item->spread_rate }}%
                                        </div>
                                    </div>
                                    <a href="{{ route('web.arbitragebots.detail', $item->id) }}" class="absolute w-full h-full top-0 start-0 z-10"></a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="flex flex-col gap-4">
                    <div class="bg-crypto-accent rounded-lg">
                        <div class="flex items-center justify-start gap-3 text-sm mb-0 px-4 pt-3">
                            <div class="flex flex-col align-top gap-1">
                                {{-- <img src="{{ $item['icon'] }}" alt="{{ $item['name'] }}" width="20" height="20" /> --}}
                                <div class="flex items-center gap-1">
                                    <span class="bg-green-900 text-green-500 w-3 h-3 rounded text-xs inline-flex items-center content-center justify-center font-medium">S</span>
                                    <div class="font-medium">{{ $bot->tradingPair->base_asset . $item->tradingPair->quote_asset }}</div>
                                </div>
                                <div class="flex items-center gap-1">
                                    <span class="bg-red-900 text-red-500 w-3 h-3 rounded text-xs inline-flex items-center content-center justify-center font-medium">B</span>
                                    <div class="font-medium">{{ $bot->tradingPair->base_asset . '/' . $item->tradingPair->quote_asset }}</div>
                                </div>
                            </div>
                            <div class="flex gap-2 text-start text-xs items-center">
                                <div>
                                    <div class="text-gray-400">Spread Rate</div>
                                    <div class="text-green-500">{{ $bot->spread_rate }}%</div>
                                </div>
                                <div>
                                    <div class="text-gray-400">3d Funding APR</div>
                                    <div class="text-green-500">{{ $bot->intervals->first()->apr_3d }}% / 4.17%</div>
                                </div>
                                <div>
                                    <div class="text-gray-400">7d Funding APR</div>
                                    <div class="text-green-500">{{ $bot->intervals->first()->apr_7d }}% / 3.37%</div>
                                </div>
                                <div>
                                    <div class="text-gray-400">30d Funding APR</div>
                                    <div class="text-green-500">{{ $bot->intervals->first()->apr_30d }}% / 4.86%</div>
                                </div>
                                {{-- <div>
                                    <div class="text-gray-400">Next Funding</div>
                                    <div class="text-green-500">0.0011%</div>
                                </div>
                                <div>
                                    <div class="text-gray-400">Countdown</div>
                                    <div class="text-gray-100">02:46:53</div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="mb-4 border-b border-crypto-primary">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" data-tabs-active-classes="text-crypto-primary border-crypto-primary" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                                <li class="me-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 rounded-t-lg data-[tabs-active]:text-crypto-primary data-[tabs-active]:border-crypto-primary data-[tabs-active]:bg-crypto-primary/20 text-gray-100 hover:text-crypto-primary hover:border-crypto-primary" id="chart-tab"
                                        data-tabs-target="#chart" type="button" role="tab" aria-controls="chart" aria-selected="true">
                                        Chart
                                    </button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 rounded-t-lg data-[tabs-active]:text-crypto-primary data-[tabs-active]:border-crypto-primary data-[tabs-active]:bg-crypto-primary/20 text-gray-100 hover:text-crypto-primary hover:border-crypto-primary"
                                        id="funding-rate-history-tab" data-tabs-target="#funding-rate-history" type="button" role="tab" aria-controls="funding-rate-history" aria-selected="false">
                                        Funding Rate History
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div id="default-tab-content">
                            <div class="hidden rounded-lg" id="chart" role="tabpanel" aria-labelledby="chart-tab">
                                <div class="flex flex-col gap-3">
                                    <!-- Chart 1 -->
                                    <div class="bg-crypto-accent">
                                        <div class="flex items-center justify-between text-sm mb-2 px-1">
                                            <div class="flex items-center gap-2">
                                                <span class="font-medium">BTCUSDT Perp</span>
                                                <span class="text-crypto-red">105375.4</span>
                                                <span class="text-crypto-red">-0.22%</span>
                                            </div>
                                            {{-- <div class="flex items-center gap-2 text-gray-400">
                                                <span>15m</span>
                                                <span>1H</span>
                                                <span>4H</span>
                                                <span>1D</span>
                                                <span>1W</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down">
                                                    <path d="m6 9 6 6 6-6" />
                                                </svg>
                                            </div> --}}
                                        </div>
                                        <!-- TradingView Widget BEGIN -->
                                        <div class="tradingview-widget-container" style="height:100%;width:100%">
                                            <div class="tradingview-widget-container__widget" style="height:calc(100% - 32px);width:100%"></div>
                                            {{-- <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets on TradingView</span></a></div> --}}
                                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js" async>
                                                {
                                                    "allow_symbol_change": false,
                                                    "calendar": false,
                                                    "details": false,
                                                    "hide_side_toolbar": true,
                                                    "hide_top_toolbar": true,
                                                    "hide_legend": false,
                                                    "hide_volume": false,
                                                    "hotlist": false,
                                                    "interval": "D",
                                                    "locale": "en",
                                                    "save_image": false,
                                                    "style": "1",
                                                    "symbol": "{{ $bot->exchange_from->tv_prefix . ':' . $bot->tradingPair->base_asset . $item->tradingPair->quote_asset }}",
                                                    "theme": "dark",
                                                    "timezone": "Etc/UTC",
                                                    "backgroundColor": "rgba(19, 19, 20, 1)",
                                                    "gridColor": "rgba(242, 242, 242, 0.06)",
                                                    "watchlist": [],
                                                    "withdateranges": false,
                                                    "compareSymbols": [],
                                                    "studies": [
                                                        "STD;Bull%Bear%Power",
                                                        "STD;Aroon",
                                                        "STD;Price%1Target",
                                                        "STD;BBTrend"
                                                    ],
                                                    "autosize": true
                                                }
                                            </script>
                                        </div>
                                        <!-- TradingView Widget END -->
                                        {{-- <div class="text-xs text-crypto-textMuted mb-2">
                                            2025/06/13 Open: <span class="text-gray-100">105694.1</span> High:
                                            <span class="text-gray-100">105912.0</span> Low:
                                            <span class="text-gray-100">102614.0</span> Close:
                                            <span class="text-gray-100">105375.4</span> CHANGE:
                                            <span class="text-crypto-red">-0.22%</span> AMPLITUDE:
                                            <span class="text-crypto-green">3.12%</span>
                                        </div>
                                        <div class="text-xs text-crypto-textMuted mb-4">
                                            MA(7): <span class="text-crypto-yellowChart">107318.9</span> MA(25):
                                            <span class="text-crypto-purpleChart">106813.3</span> MA(99):
                                            <span class="text-crypto-blueChart">93789.6</span>
                                        </div>
                                        <img src="/placeholder.svg?height=200&width=800" alt="Chart 1" width="800" height="200" class="w-full h-auto object-cover rounded-md" />
                                        <div class="text-xs text-crypto-textMuted mt-4">
                                            Vol(BTC): <span class="text-gray-100">236.348K</span> Vol(USDT):
                                            <span class="text-gray-100">24.691B</span> 150.953K
                                            <span class="text-crypto-green">149.58K</span>
                                        </div> --}}
                                    </div>

                                    <!-- Chart 2 -->
                                    <div class="bg-crypto-accent">
                                        <div class="tradingview-widget-container" style="height:100%;width:100%">
                                            <div class="tradingview-widget-container__widget" style="height:calc(100% - 32px);width:100%"></div>
                                            {{-- <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets on TradingView</span></a></div> --}}
                                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js" async>
                                                {
                                                    "allow_symbol_change": false,
                                                    "calendar": false,
                                                    "details": false,
                                                    "hide_side_toolbar": true,
                                                    "hide_top_toolbar": true,
                                                    "hide_legend": false,
                                                    "hide_volume": false,
                                                    "hotlist": false,
                                                    "interval": "D",
                                                    "locale": "en",
                                                    "save_image": false,
                                                    "style": "1",
                                                    "symbol": "{{ $bot->exchange_to->tv_prefix . ':' . $bot->tradingPair->base_asset . $item->tradingPair->quote_asset }}",
                                                    "theme": "dark",
                                                    "timezone": "Etc/UTC",
                                                    "backgroundColor": "rgba(19, 19, 20, 1)",
                                                    "gridColor": "rgba(242, 242, 242, 0.06)",
                                                    "watchlist": [],
                                                    "withdateranges": false,
                                                    "compareSymbols": [],
                                                    "studies": [
                                                        "STD;Bull%Bear%Power",
                                                        "STD;Aroon",
                                                        "STD;Price%1Target",
                                                        "STD;BBTrend"
                                                    ],
                                                    "autosize": true
                                                }
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden p-4 rounded-lg" id="funding-rate-history" role="tabpanel" aria-labelledby="funding-rate-history-tab">
                                <div class="text-crypto-textMuted">Funding Rate History content goes here.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Right Sidebar -->
        <div class="bg-crypto-accent rounded-lg p-4 flex flex-col gap-4 m-1">
            <div class="flex flex-col gap-3">
                <h3 class="text-sm fw-semibold">1. Portfolio</h3>
                <div class="flex justify-between gap-1 items-center">
                    <div class="flex flex-col align-top gap-1">
                        {{-- <img src="{{ $item['icon'] }}" alt="{{ $item['name'] }}" width="20" height="20" /> --}}
                        <div class="flex items-center gap-1">
                            <span class="bg-green-900 text-green-500 w-3 h-3 rounded text-xs inline-flex items-center content-center justify-center font-medium">S</span>
                            <div class="font-medium">{{ $bot->tradingPair->base_asset . $item->tradingPair->quote_asset }}</div>
                        </div>
                        <div class="flex items-center gap-1">
                            <span class="bg-red-900 text-red-500 w-3 h-3 rounded text-xs inline-flex items-center content-center justify-center font-medium">B</span>
                            <div class="font-medium">{{ $bot->tradingPair->base_asset . '/' . $item->tradingPair->quote_asset }}</div>
                        </div>
                    </div>
                </div>
                {{-- <div class="grid grid-cols-3 gap-2 items-center p-1 py-3 bg-zinc-800 rounded-lg text-center justify-between text-sm">
                        <div>
                            <div class="text-gray-400">3d APR</div>
                            <div class="text-green-500">{{ $bot->intervals->first()->apr_3d }}%</div>
                        </div>
                        <div>
                            <div class="text-gray-400">7d APR</div>
                            <div class="text-green-500">{{ $bot->intervals->first()->apr_7d }}%</div>
                        </div>
                        <div>
                            <div class="text-gray-400">30d APR</div>
                            <div class="text-green-500">{{ $bot->intervals->first()->apr_30d }}%</div>
                        </div>
                    </div> --}}
                <div class="p-3 bg-zinc-900 rounded-xl">
                    <div class="text-sm text-gray-400 flex justify-between items-center">
                        Next Funding: <span class="text-green-500">{{ mt_rand($bot->intervals->first()->apr_3d * 10, $bot->intervals->first()->apr_30d * 10) / 100 }}%</span>
                    </div>
                    <div class="text-sm text-gray-400 flex justify-between items-center">
                        min holding period: <a href="#" class="text-gray-100 underline">{{ $bot->recommended_holding_period ?? '30' }} days</a>
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-1">
                <h3 class="text-sm font-semibold">2. Investment</h3>
                <form method="POST" action="{{ route('arbitrage.subscription.store') }}">
                    @csrf
                    <input type="hidden" name="arbitrage_bot_id" value="{{ $bot->id }}">
                    <label for="investmentAmount" class="block text-xs text-gray-400 mb-1">Investment Amount (USDT)</label>
                    <div class="relative mb-2">
                        <input type="text" id="investmentAmount" name="amount" placeholder="0.00" class="block w-full pr-16 py-2 rounded-lg bg-crypto-accent border border-gray-800 appearance-none text-gray-100 focus:border-crypto-primary focus:ring-crypto-primary" min="0"
                            step="0.01" required onblur="validateAmount()" />
                        <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400">USDT</span>
                    </div>
                    <!-- Flowbite Range Slider -->
                    <input id="default-range" type="range" value="50" class="w-full h-2 bg-crypto-border rounded-lg appearance-none cursor-pointer accent-crypto-primary mb-2" />
                    <div class="mb-2">
                        <label for="aprInterval" class="block text-xs text-gray-400 mb-1">APR Interval</label>
                        <select id="aprInterval" name="apr_interval" class="w-full rounded bg-zinc-800 border border-gray-400 text-gray-100 px-3 py-2" required>
                            <option value="3d">3 Days</option>
                            <option value="7d">7 Days</option>
                            <option value="30d">30 Days</option>
                        </select>
                    </div>
                    {{-- <button type="submit" class="bg-crypto-primary text-crypto-accent px-4 py-2 rounded font-semibold hover:bg-[#e0a800] w-full">Subscribe</button> --}}
                    @auth
                        <div class="flex items-center justify-between text-xs text-gray-400">
                            <span>
                                Available <span class="text-gray-100">{{ number_format(auth()->user()->wallets->sum('balance'), 2) }} USDT</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus inline-block">
                                    <path d="M12 5v14" />
                                    <path d="M5 12h14" />
                                </svg>
                            </span>
                            <span>Est. Position Size</span>
                        </div>
                    @endauth
                    <!-- Fee Level Modal Trigger -->
                    <a href="#" class="text-sm text-crypto-primary hover:underline" data-modal-target="feeLevelModal" data-modal-toggle="feeLevelModal">
                        Fee level
                    </a>
                    @auth
                        <button type="submit" class="bg-crypto-primary text-crypto-accent hover:bg-[#e0a800] w-full py-2 rounded-md text-base font-medium mt-4">
                            Create
                        </button>
                    @endauth
                </form>
                @if (auth('web')->guest())
                    <a href="/login" class="bg-yellow-400 text-black font-semibold px-3 py-1 rounded hover:bg-yellow-500 transition">Login/Signup</a>
                @endif
            </div>

            <!-- Fee Level Modal -->
            <div id="feeLevelModal" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black/60 backdrop-blur-sm">
                <div class="relative w-full max-w-4xl max-h-full mx-auto">
                    <div class="relative bg-crypto-accent rounded-xl shadow">
                        <div class="flex items-center justify-between p-4 border-b rounded-t border-crypto-primary">
                            <h3 class="text-lg font-semibold text-crypto-primary">APR & Fee Level Details</h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-700 hover:text-white rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="feeLevelModal">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="p-4 flex items-start justify-center gap-2">
                            <div class="grow">
                                <div class="grid grid-cols-1 gap-4 mb-4">
                                    <div class="bg-zinc-800 rounded-lg p-4 border border-crypto-primary">
                                        <h4 class="text-crypto-primary font-semibold mb-2">Funding APRs</h4>
                                        <ul class="text-sm text-gray-200">
                                            <li>3d APR: <span class="text-crypto-green font-bold">{{ $bot->intervals->first()->apr_3d }}%</span></li>
                                            <li>7d APR: <span class="text-crypto-green font-bold">{{ $bot->intervals->first()->apr_7d }}%</span></li>
                                            <li>30d APR: <span class="text-crypto-green font-bold">{{ $bot->intervals->first()->apr_30d }}%</span></li>
                                        </ul>
                                    </div>
                                    <div class="bg-zinc-800 rounded-lg p-4 border border-crypto-primary">
                                        <h4 class="text-crypto-primary font-semibold mb-2">Fee Level Ranges</h4>
                                        <ul class="text-sm text-gray-200">
                                            <li>Maker Fee: <span class="text-crypto-yellow font-bold">0.02% - 0.05%</span></li>
                                            <li>Taker Fee: <span class="text-crypto-yellow font-bold">0.04% - 0.07%</span></li>
                                            @foreach ($bot->fees as $fee)
                                                <li>Arbitrage Fee: <span class="text-crypto-yellow font-bold">
                                                        {{ number_format($fee->min_amount, 2) }} - {{ $fee->max_amount ? number_format($fee->max_amount, 2) : '∞' }} USDT: {{ number_format($fee->fee_percentage, 2) }}%
                                                    </span></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="grow w-1/2">
                                <div class="bg-zinc-800 rounded-lg p-4 border border-crypto-primary mb-4">
                                    <h4 class="text-crypto-primary font-semibold mb-2">Profit & Fee Calculator</h4>
                                    <form id="profitCalcForm" class="space-y-3" method="POST" action="{{ route('arbitrage.subscription.store') }}">
                                        @csrf
                                        <input type="hidden" name="arbitrage_bot_id" value="{{ $bot->id }}">
                                        <div>
                                            <label for="calcAmount" class="block text-sm text-gray-300 mb-1">Investment Amount (USDT)</label>
                                            <input type="number" id="calcAmount" name="amount" class="w-full rounded bg-zinc-800 border border-crypto-primary text-gray-100 px-3 py-2" min="0" step="0.01" value="1000" required>
                                        </div>
                                        <div>
                                            <label for="aprPeriod" class="block text-sm text-gray-300 mb-1">APR Period</label>
                                            <select id="aprPeriod" name="apr_interval" class="w-full rounded bg-zinc-800 border border-crypto-primary text-gray-100 px-3 py-2" required>
                                                <option value="3d">3 Days</option>
                                                <option value="7d">7 Days</option>
                                                <option value="30d">30 Days</option>
                                            </select>
                                        </div>
                                        <div class="grid grid-cols-2 gap-2">
                                            <div>
                                                <label class="block text-xs text-gray-400">Estimated Profit</label>
                                                <div id="calcProfit" class="text-green-400 font-bold">0.00 USDT</div>
                                            </div>
                                            <div>
                                                <label class="block text-xs text-gray-400">Estimated Fees</label>
                                                <div id="calcFees" class="text-yellow-400 font-bold">0.00 USDT</div>
                                            </div>
                                        </div>
                                        <button type="button" onclick="calculateProfit()" class="bg-crypto-primary text-crypto-accent px-4 py-2 rounded font-semibold hover:bg-[#e0a800]">Calculate</button>
                                        <button type="submit" class="bg-crypto-primary text-crypto-accent px-4 py-2 rounded font-semibold hover:bg-[#e0a800] ml-2">Subscribe</button>
                                    </form>
                                </div>
                                <div class="bg-zinc-800 rounded-lg p-4 border border-crypto-primary">
                                    <h4 class="text-crypto-primary font-semibold mb-2">Disclaimer & User Consent</h4>
                                    <p class="text-xs text-gray-400 mb-2">This calculator provides only an estimate. Actual profits and fees may vary based on market conditions, exchange policies, and other factors. Please review all terms and risks before investing.</p>
                                    <p class="text-xs text-gray-400">By using this tool, you acknowledge that you understand the risks associated with arbitrage trading and agree to our terms and conditions.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Calculator Script -->
            <script>
                function validateAmount() {
                    const input = document.getElementById('investmentAmount');
                    const maxBalance = {{ auth()->user() ? auth()->user()->wallets->sum('balance') : 0 }};
                    let val = parseFloat(input.value) || 0;
                    if (val > maxBalance) {
                        input.value = 0;
                        alert('Entered amount exceeds your available balance.');
                    }
                }

                function calculateProfit() {
                    const amount = parseFloat(document.getElementById('calcAmount').value) || 0;
                    const period = document.getElementById('aprPeriod').value;
                    let apr = 0;
                    if (period === '3d') {
                        apr = parseFloat({{ $bot->intervals->first()->apr_3d ?? 0 }});
                    } else if (period === '7d') {
                        apr = parseFloat({{ $bot->intervals->first()->apr_7d ?? 0 }});
                    } else if (period === '30d') {
                        apr = parseFloat({{ $bot->intervals->first()->apr_30d ?? 0 }});
                    }

                    // Find correct fee tier
                    let feePercent = 0;
                    @foreach ($bot->fees as $fee)
                        if (amount >= {{ $fee->min_amount }} && ({{ $fee->max_amount ?? 'null' }} === null || amount <= {{ $fee->max_amount ?? 'null' }})) {
                            feePercent = parseFloat({{ $fee->fee_percentage }});
                        }
                    @endforeach
                    // Estimated profit
                    const profit = amount * (apr / 100);
                    // Estimated fees
                    const fees = amount * (feePercent / 100);
                    document.getElementById('calcProfit').innerText = profit.toFixed(2) + ' USDT';
                    document.getElementById('calcFees').innerText = fees.toFixed(2) + ' USDT';
                }
            </script>
        </div>
    </section>
@endsection
