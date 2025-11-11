@extends('web.layout.app')
@section('title', 'Arbitrage Bots')
@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Arbitrage Overview Section -->
        <section class="mb-12 flex justify-between items-center">
            <div>
                <h1 class="text-5xl font-bold uppercase mb-4">Arbitrage Bots</h1>
                <div class="flex items-center mb-2">
                    <span class="text-sm uppercase text-gray-400">Total Balance</span>
                    <span class="ml-2 text-3xl font-bold">$0</span>
                    <span class="ml-2 text-gray-400"><i class="fas fa-info-circle"></i></span>
                </div>
                <div class="text-sm uppercase mb-4">Today's PNL: $0.00</div>
                <button class="bg-crypto-primary text-black font-bold uppercase px-4 py-2 rounded-md">Trade Now</button>
                <a href="#" class="text-crypto-primary underline ml-4">Bots Wallet</a>
            </div>
            <div class="bg-crypto-accent p-6 rounded-lg w-1/3 flex flex-col items-center">
                <h2 class="text-xl font-bold uppercase mb-2">Discover Our Arbitrage Bots</h2>
                <button class="bg-crypto-primary text-black px-4 py-2 rounded-md">Learn More</button>
                <img src="{{ asset('assets/images/trading-bot.png') }}" alt="Robot" class="w-24 h-24 mt-4">
                <div class="flex justify-center mt-2">
                    <span class="text-white">1 / 3</span>
                </div>
            </div>
        </section>

        <!-- Bot Marketplace Section -->
        <section class="mb-12">
            <div class="flex flex-col justify-center gap-4 mb-4">
                <div class="flex space-x-4">
                    <a href="/trading-bots" class="text-gray-400 pb-2 hover:text-crypto-primary">Spot Grid</a>
                    <a href="/arbitrage-bots" class="text-white fw-medium text-lg pb-2 border-b-2 border-crypto-primary">Arbitrage</a>
                </div>
                <div class="flex justify-between items-center w-full space-x-2">
                    <select class="bg-crypto-accent text-white border border-gray-500 rounded-md px-2 py-1">
                        <option>Zone</option>
                    </select>
                    <select class="bg-crypto-accent text-white border border-gray-500 rounded-md px-2 py-1">
                        <option>Direction</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Example Arbitrage Card -->
                @foreach ($bots as $bot)
                    @php
                        $activeInterval = $bot->intervals->where('is_active', 1)->first();
                        // $fundingTime = optional($activeInterval)->ends_at ?? now()->addHour(); // fallback if no active
                        $countdownId = 'countdown-' . $bot->id;
                    @endphp

                    <div class="bg-crypto-accent p-4 duration-200 rounded-lg border border-gray-700 hover:border-crypto-primary flex flex-col justify-between">
                        <div class="flex justify-between items-center mb-2">
                            <div>
                                <span class="text-lg font-bold">{{ $bot->tradingPair->base_asset . $bot->tradingPair->quote_asset }}
                                    <span class="bg-gray-700 text-xs px-2 py-1 rounded ml-1">Perp</span>
                                </span>
                                <div class="text-gray-500 text-sm">{{ $bot->tradingPair->base_asset }}/{{ $bot->tradingPair->quote_asset }}</div>
                            </div>
                            <a href="{{ route('web.arbitragebots.detail', $bot->id) }}" class="bg-crypto-primary text-black font-bold px-4 py-1 rounded-md">
                                Create
                            </a>
                        </div>

                        {{-- TradingView Chart Widget --}}
                        <div class="h-48 w-full mb-3 rounded overflow-hidden">
                            {{-- <div id="tv_chart_{{ $bot->id }}" class="w-full h-full"></div> --}}
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                {{-- <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets on TradingView</span></a></div> --}}
                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                                    {
                                        "symbol": "{{ $bot->tradingPair->tv_symbol }}",
                                        "chartOnly": false,
                                        "dateRange": "5M",
                                        "noTimeScale": true,
                                        "colorTheme": "dark",
                                        "isTransparent": true,
                                        "locale": "en",
                                        "width": "100%",
                                        "autosize": true,
                                        "height": "100%"
                                    }
                                </script>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>

                        <div class="grid grid-cols-2 gap-2 text-sm mb-2">
                            <div><span class="text-gray-400">3d APR</span><br>
                                <span class="text-green-500 font-bold">{{ $activeInterval->apr_3d ?? '—' }}%</span>
                            </div>
                            <div><span class="text-gray-400">7d APR</span><br>
                                <span class="text-green-500">{{ $activeInterval->apr_7d ?? '—' }}%</span>
                            </div>
                            <div><span class="text-gray-400">30d APR</span><br>
                                <span class="text-green-500">{{ $activeInterval->apr_30d ?? '—' }}%</span>
                            </div>
                            <div><span class="text-gray-400">Spread Rate</span><br>{{ $bot->spread_rate }}%</div>
                        </div>

                    </div>
                @endforeach
                <!-- Repeat for more cards as needed -->
            </div>
        </section>
    </div>
@endsection
