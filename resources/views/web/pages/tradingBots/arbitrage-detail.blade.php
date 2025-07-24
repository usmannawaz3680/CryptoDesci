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
    <section class="min-h-screen bg-zinc-950 text-gray-100 flex flex-col max-w-screen-2xl mx-auto justify-center">
        <div class="bg-crypto-accent rounded-xl p-3 my-2 m-1">
            <h2 class="text-xl font-bold">Welcome To Arbitrage Bot</h2>
        </div>
        <div class="flex-1 grid grid-cols-1 lg:grid-cols-[280px_1fr_320px] gap-3 mb-2 m-2 items-start">
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
                    <select id="usd-m-select" class="bg-crypto-accent border border-crypto-primary text-gray-300  text-sm rounded-lg focus:ring-crypto-primary focus:border-crypto-primary block w-full p-2">
                        <option selected value="usd">USD-M</option>
                        <option value="coin-m">COIN-M</option>
                    </select>
                    <select id="3d-select" class="bg-crypto-accent border border-crypto-primary text-gray-300 text-sm rounded-lg focus:ring-crypto-primary focus:border-crypto-primary block w-full p-2">
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
                        <div class="hidden rounded-lg max-h-screen" id="chart" role="tabpanel" aria-labelledby="chart-tab">
                            <div class="flex flex-col gap-4">
                                <!-- Chart 1 -->
                                <div class="bg-crypto-accent rounded-lg">
                                    <div class="flex items-center justify-between text-sm mb-2">
                                        <div class="flex items-center gap-2">
                                            <span class="font-medium">BTCUSDT Perp</span>
                                            <span class="text-crypto-red">105375.4</span>
                                            <span class="text-crypto-red">-0.22%</span>
                                        </div>
                                        {{-- <div class="flex items-center gap-2 text-crypto-textMuted">
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
                                                "symbol": "{{ optional($bot->exchange_from?->pair->where('id', $bot->trading_pair_id)->first())->tv_symbol ?? '' }}",
                                                "theme": "dark",
                                                "timezone": "Etc/UTC",
                                                "backgroundColor": "rgba(19, 19, 20, 1)",
                                                "gridColor": "rgba(242, 242, 242, 0.06)",
                                                "watchlist": [],
                                                "withdateranges": false,
                                                "compareSymbols": [],
                                                "studies": [],
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
                                                "symbol": "{{ optional($bot->exchange_to?->pair->where('id', $bot->trading_pair_id)->first())->tv_symbol ?? '' }}",
                                                "theme": "dark",
                                                "timezone": "Etc/UTC",
                                                "backgroundColor": "rgba(19, 19, 20, 1)",
                                                "gridColor": "rgba(242, 242, 242, 0.06)",
                                                "watchlist": [],
                                                "withdateranges": false,
                                                "compareSymbols": [],
                                                "studies": [],
                                                "autosize": true
                                            }
                                        </script>
                                    </div>
                                    {{-- <div class="flex items-center justify-between text-sm mb-2">
                                        <div class="flex items-center gap-2">
                                            <span class="font-medium">BTC/USDT</span>
                                            <span class="text-crypto-red">105414.17</span>
                                            <span class="text-crypto-red">-0.24%</span>
                                        </div>
                                        <div class="flex items-center gap-2 text-crypto-textMuted">
                                            <span>15m</span>
                                            <span>1H</span>
                                            <span>4H</span>
                                            <span>1D</span>
                                            <span>1W</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down">
                                                <path d="m6 9 6 6 6-6" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="text-xs text-crypto-textMuted mb-2">
                                        2025/06/13 Open: <span class="text-gray-100">105671.74</span> High:
                                        <span class="text-gray-100">105981.00</span> Low:
                                        <span class="text-gray-100">102664.31</span> Close:
                                        <span class="text-gray-100">105414.17</span> CHANGE:
                                        <span class="text-crypto-red">-0.24%</span> AMPLITUDE:
                                        <span class="text-crypto-green">3.14%</span>
                                    </div>
                                    <div class="text-xs text-crypto-textMuted mb-4">
                                        MA(7): <span class="text-crypto-yellowChart">107318.9</span> MA(25):
                                        <span class="text-crypto-purpleChart">106860.91</span> MA(99):
                                        <span class="text-crypto-blueChart">93831.87</span>
                                    </div>
                                    <img src="/placeholder.svg?height=200&width=800" alt="Chart 2" width="800" height="200" class="w-full h-auto object-cover rounded-md" />
                                    <div class="text-xs text-crypto-textMuted mt-4">
                                        Vol(BTC): <span class="text-gray-100">25.314K</span> Vol(USDT):
                                        <span class="text-gray-100">2.644B</span> 15.664K
                                        <span class="text-crypto-green">14.96%</span>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="hidden p-4 rounded-lg" id="funding-rate-history" role="tabpanel" aria-labelledby="funding-rate-history-tab">
                            <div class="text-crypto-textMuted">Funding Rate History content goes here.</div>
                        </div>
                    </div>
                </div>

                <div class="bg-crypto-accent rounded-lg p-4 flex items-center justify-between text-sm">
                    <div class="mb-4 border-b border-crypto-primary">
                        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="running-tabs" data-tabs-toggle="#running-tabs-content" role="tablist">
                            <li class="me-2" role="presentation">
                                <button class="inline-block p-4 border-b-2 rounded-t-lg data-[tabs-active]:text-crypto-primary data-[tabs-active]:border-crypto-primary data-[tabs-active]:bg-crypto-primary/20 text-gray-100 hover:text-crypto-primary hover:border-crypto-primary" id="running-tab"
                                    data-tabs-target="#running" type="button" role="tab" aria-controls="running" aria-selected="true">
                                    Running (0)
                                </button>
                            </li>
                            <li class="me-2" role="presentation">
                                <button class="inline-block p-4 border-b-2 rounded-t-lg data-[tabs-active]:text-crypto-primary data-[tabs-active]:border-crypto-primary data-[tabs-active]:bg-crypto-primary/20 text-gray-100 hover:text-crypto-primary hover:border-crypto-primary" id="history-tab"
                                    data-tabs-target="#history" type="button" role="tab" aria-controls="history" aria-selected="false">
                                    History
                                </button>
                            </li>
                            <li class="me-2" role="presentation">
                                <button class="inline-block p-4 border-b-2 rounded-t-lg data-[tabs-active]:text-crypto-primary data-[tabs-active]:border-crypto-primary data-[tabs-active]:bg-crypto-primary/20 text-gray-100 hover:text-crypto-primary hover:border-crypto-primary" id="pnl-analysis-tab"
                                    data-tabs-target="#pnl-analysis" type="button" role="tab" aria-controls="pnl-analysis" aria-selected="false">
                                    PNL Analysis
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="flex items-center gap-2 text-crypto-textMuted">
                        <button type="button" class="text-crypto-textMuted hover:text-crypto-primary text-sm font-medium">
                            Refresh Running list
                        </button>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-more-horizontal">
                            <circle cx="12" cy="12" r="1" />
                            <circle cx="19" cy="12" r="1" />
                            <circle cx="5" cy="12" r="1" />
                        </svg>
                    </div>
                </div>
                <div class="text-xs text-crypto-textMuted text-right pr-4">* Maximum 10 Running Strategies</div>
            </div>

            <!-- Right Sidebar -->
            <div class="bg-crypto-accent rounded-lg p-4 flex flex-col gap-4">
                <div class="flex items-center justify-between text-crypto-textMuted">
                    <div class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-home">
                            <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            <polyline points="9 22 9 12 15 12 15 22" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-more-horizontal">
                            <circle cx="12" cy="12" r="1" />
                            <circle cx="19" cy="12" r="1" />
                            <circle cx="5" cy="12" r="1" />
                        </svg>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 16v-4" />
                        <path d="M12 8h.01" />
                    </svg>
                </div>
                <div class="flex flex-col gap-3">
                    <h3 class="text-lg font-semibold">1. Portfolio</h3>
                    <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center gap-2">
                            <span class="text-crypto-red font-medium">S BTCUSDT Perp</span>
                            <span class="text-crypto-textMuted">2x</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-more-horizontal">
                            <circle cx="12" cy="12" r="1" />
                            <circle cx="19" cy="12" r="1" />
                            <circle cx="5" cy="12" r="1" />
                        </svg>
                    </div>
                    <div class="text-sm text-crypto-textMuted">B BTC/USDT</div>
                    <div class="grid grid-cols-3 gap-2 text-center text-sm">
                        <div>
                            <div class="text-crypto-textMuted">3d APR</div>
                            <div class="text-crypto-green">4.17%</div>
                        </div>
                        <div>
                            <div class="text-crypto-textMuted">7d APR</div>
                            <div class="text-crypto-green">3.37%</div>
                        </div>
                        <div>
                            <div class="text-crypto-textMuted">30d APR</div>
                            <div class="text-crypto-green">4.86%</div>
                        </div>
                    </div>
                    <div class="text-sm text-crypto-textMuted">
                        Next Funding: <span class="text-crypto-green">0.0011%</span>
                    </div>
                    <div class="text-sm text-crypto-textMuted">
                        Recommended min holding period: <span class="text-gray-100">31 days</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down inline-block ml-1">
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </div>
                </div>

                <div class="flex flex-col gap-3 mt-4">
                    <h3 class="text-lg font-semibold">2. Investment</h3>
                    <div class="relative">
                        <input type="text" placeholder="0.00" class="block w-full pr-16 py-2 rounded-lg bg-crypto-accent border border-crypto-primary text-gray-100 focus:border-crypto-primary focus:ring-crypto-primary" />
                        <span class="absolute right-3 top-1/2 -translate-y-1/2 text-crypto-textMuted">USDT</span>
                    </div>
                    <!-- Flowbite Range Slider -->
                    <input id="default-range" type="range" value="50" class="w-full h-2 bg-crypto-border rounded-lg appearance-none cursor-pointer accent-crypto-primary" />
                    <div class="flex items-center justify-between text-xs text-crypto-textMuted">
                        <span>
                            Available <span class="text-gray-100">0.00 USDT</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus inline-block">
                                <path d="M12 5v14" />
                                <path d="M5 12h14" />
                            </svg>
                        </span>
                        <span>Est. Position Size</span>
                    </div>
                    <a href="#" class="text-sm text-crypto-primary hover:underline">
                        Fee level
                    </a>
                    <button type="button" class="bg-crypto-primary text-crypto-accent hover:bg-[#e0a800] w-full py-2 rounded-md text-base font-medium mt-4">
                        Create
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection
