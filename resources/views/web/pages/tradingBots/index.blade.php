@extends('web.layout.app')
@section('title', 'Trading Bots')
@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Trading Bots Overview Section -->
        <section class="mb-12 flex justify-between items-center">
            <div>
                <h1 class="text-5xl font-bold uppercase mb-4">Trading Bots</h1>
                <div class="flex items-center mb-2">
                    <span class="text-sm uppercase text-gray-400">Total Balance</span>
                    <span class="ml-2 text-3xl font-bold">$0</span>
                    <span class="ml-2 text-gray-400"><i class="fas fa-info-circle"></i></span>
                </div>
                <div class="text-sm uppercase mb-4">Today's PNL: $0.00</div>
                <button class=" bg-crypto-primary text-black font-bold uppercase px-4 py-2 rounded-md">Trade Now</button>
                <a href="#" class="text-crypto-primary underline ml-4">Bots Wallet</a>
            </div>
            <div class="bg-crypto-accent p-6 rounded-lg w-1/3 flex flex-col items-center">
                <h2 class="text-xl font-bold uppercase mb-2">Discover Our Trading Bots</h2>
                <button class=" bg-crypto-primary text-black px-4 py-2 rounded-md">Learn More</button>
                <img src="{{ asset('assets/images/trading-bot.png') }}" alt="Robot" class="w-24 h-24 mt-4">
                <div class="flex justify-center mt-2">
                    <span class="text-white">1 / 3</span>
                </div>
            </div>
        </section>

        <!-- Bot Marketplace Section -->
        <section class="mb-12">
            <div class="flex justify-center flex-col items-between mb-4 gap-4">
                <div class="flex space-x-4">
                    <a href="/trading-bots" class="text-white fw-medium text-lg pb-2 border-b-2 border-crypto-primary">Spot Grid</a>
                    <a href="/arbitrage-bots" class="text-gray-400 pb-2 hover:text-crypto-primary">Arbitrage</a>
                </div>
                <div class="flex justify-between items-center w-full">
                    <div class="flex space-x-2">
                        <select class="bg-crypto-accent text-white border border-gray-500 rounded-md px-2 py-1">
                            <option>Market</option>
                        </select>
                        <select class="bg-crypto-accent text-white border border-gray-500 rounded-md px-2 py-1">
                            <option>1-7 Days</option>
                        </select>
                        <select class="bg-crypto-accent text-white border border-gray-500 rounded-md px-2 py-1">
                            <option>ROI</option>
                        </select>
                        <select class="bg-crypto-accent text-white border border-gray-500 rounded-md px-2 py-1">
                            <option>7D MDD</option>
                        </select>
                    </div>
                    <button class="bg-crypto-accent text-white border border-gray-500 rounded-md px-2 py-1">Top PNL</button>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-crypto-accent p-4 rounded-lg cursor-pointer duration-150 border border-gray-700 hover:border-crypto-primary">
                    <div class="flex justify-between items-center mb-2">
                        <div>
                            <span class="text-lg font-bold">ETH/USDT</span>
                            <span class="text-gray-500 block pt-1 text-sm"><i class="fa-solid fa-users"></i> 11</span>
                        </div>
                        <button class=" bg-crypto-primary font-medium text-black px-2 py-1 rounded-md">Copy</button>
                    </div>
                    <div class="flex justify-between items-center gap-2">
                        <div class="mb-2">
                            <span class="text-xs text-gray-400">PNL (USD)</span>
                            <span class="text-3xl font-medium text-green-500">$4,126.87</span>
                        </div>
                        <div class="w-3/6 h-24 bg-gray-700 mb-2"></div>
                    </div>
                    <div class="grid grid-cols-2 gap-2 text-sm">
                        <div><span class="text-gray-400">ROI</span><br>1.37%</div>
                        <div><span class="text-gray-400">Runtime</span><br>4d 13h 46m</div>
                        <div><span class="text-gray-400">Min. Investment</span><br>1,679.75 USDT</div>
                        <div><span class="text-gray-400">24H/Total Matched Trades</span><br>14/36</div>
                    </div>
                    <div class="text-right text-sm"><span class="text-gray-400">7D MDD</span> 8.45%</div>
                </div>
                <div class="bg-crypto-accent p-4 rounded-lg cursor-pointer duration-150 border border-gray-700 hover:border-crypto-primary">
                    <div class="flex justify-between items-center mb-2">
                        <div>
                            <span class="text-lg font-bold">BTC/USDT</span>
                            <span class="text-gray-500 block pt-1 text-sm"><i class="fa-solid fa-users"></i> 8</span>
                        </div>
                        <button class=" bg-crypto-primary font-medium text-black px-2 py-1 rounded-md">Copy</button>
                    </div>
                    <div class="flex justify-between items-center gap-2">
                        <div class="mb-2">
                            <span class="text-xs text-gray-400">PNL (USD)</span>
                            <span class="text-3xl font-medium text-green-500">$3,200.45</span>
                        </div>
                        <div class="w-3/6 h-24 bg-gray-700 mb-2"></div>
                    </div>
                    <div class="grid grid-cols-2 gap-2 text-sm">
                        <div><span class="text-gray-400">ROI</span><br>1.20%</div>
                        <div><span class="text-gray-400">Runtime</span><br>3d 10h 30m</div>
                        <div><span class="text-gray-400">Min. Investment</span><br>1,500.00 USDT</div>
                        <div><span class="text-gray-400">24H/Total Matched Trades</span><br>10/25</div>
                    </div>
                    <div class="text-right text-sm"><span class="text-gray-400">7D MDD</span> 6.75%</div>
                </div>
                <div class="bg-crypto-accent p-4 rounded-lg cursor-pointer duration-150 border border-gray-700 hover:border-crypto-primary">
                    <div class="flex justify-between items-center mb-2">
                        <div>
                            <span class="text-lg font-bold">XRP/USDT</span>
                            <span class="text-gray-500 block pt-1 text-sm"><i class="fa-solid fa-users"></i> 5</span>
                        </div>
                        <button class=" bg-crypto-primary font-medium text-black px-2 py-1 rounded-md">Copy</button>
                    </div>
                    <div class="flex justify-between items-center gap-2">
                        <div class="mb-2">
                            <span class="text-xs text-gray-400">PNL (USD)</span>
                            <span class="text-3xl font-medium text-green-500">$1,200.00</span>
                        </div>
                        <div class="w-3/6 h-24 bg-gray-700 mb-2"></div>
                    </div>
                    <div class="grid grid-cols-2 gap-2 text-sm">
                        <div><span class="text-gray-400">ROI</span><br>0.85%</div>
                        <div><span class="text-gray-400">Runtime</span><br>2d 5h 20m</div>
                        <div><span class="text-gray-400">Min. Investment</span><br>800.00 USDT</div>
                        <div><span class="text-gray-400">24H/Total Matched Trades</span><br>8/15</div>
                    </div>
                    <div class="text-right text-sm"><span class="text-gray-400">7D MDD</span> 5.50%</div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="mb-12">
            <h2 class="text-2xl font-bold uppercase text-center mb-8">Features</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center p-6">
                    <div class="bg-white p-4 rounded-lg shadow-md mb-4">
                        <img src="{{ asset('assets/images/icon1.png') }}" alt="Icon 1" class="w-16 h-16 mx-auto">
                    </div>
                    <h3 class="text-xl font-bold mb-2">Intuitive Automation</h3>
                    <p class="text-gray-400">Set your algorithmic bot and automate your trades in a few clicks with TWAP, VP algos, and Grid Trading.</p>
                </div>
                <div class="text-center p-6">
                    <div class="bg-white p-4 rounded-lg shadow-md mb-4">
                        <img src="{{ asset('assets/images/icon2.png') }}" alt="Icon 2" class="w-16 h-16 mx-auto">
                    </div>
                    <h3 class="text-xl font-bold mb-2">Trending Strategies</h3>
                    <p class="text-gray-400">Replicate and customize the most profitable Grid Trading strategies across a wide range of trading pairs.</p>
                </div>
                <div class="text-center p-6">
                    <div class="bg-white p-4 rounded-lg shadow-md mb-4">
                        <img src="{{ asset('assets/images/icon3.png') }}" alt="Icon 3" class="w-16 h-16 mx-auto">
                    </div>
                    <h3 class="text-xl font-bold mb-2">Optimize Deep Liquidity</h3>
                    <p class="text-gray-400">Optimize order executions and reduce slippage while capturing maximum liquidity on the largest exchange.</p>
                </div>
            </div>
        </section>

        <!-- Bots Academy Section -->
        <section class="mb-12">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold uppercase">Bots Academy</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class=" bg-crypto-accent/90 p-4 rounded-lg flex items-center">
                    <img src="{{ asset('assets/images/academy1.png') }}" alt="Image 1" class="w-32 h-32 rounded-lg mr-4">
                    <div>
                        <h3 class="text-lg font-bold mb-2">What is Futures Grid Trading</h3>
                        <p class="text-gray-400 text-sm">Futures Grid trading performs the best in volatile and sideways markets when prices fluctuate in a given...</p>
                        <a href="#" class="text-crypto-primary text-sm hover:underline">Learn More</a>
                    </div>
                </div>
                <div class=" bg-crypto-accent/90 p-4 rounded-lg flex items-center">
                    <img src="{{ asset('assets/images/academy2.png') }}" alt="Image 2" class="w-32 h-32 rounded-lg mr-4">
                    <div>
                        <h3 class="text-lg font-bold mb-2">What is long/short Grid trading</h3>
                        <p class="text-gray-400 text-sm">Long/Short Grid is a trend-following strategy that allows users to trade with the market trend within a...</p>
                        <a href="#" class="text-crypto-primary text-sm hover:underline">Learn More</a>
                    </div>
                </div>
                <div class=" bg-crypto-accent/90 p-4 rounded-lg flex items-center">
                    <img src="{{ asset('assets/images/academy3.png') }}" alt="Image 3" class="w-32 h-32 rounded-lg mr-4">
                    <div>
                        <h3 class="text-lg font-bold mb-2">Futures Grid Trading Auto-Parameters Guide</h3>
                        <p class="text-gray-400 text-sm">Binance provides recommended parameters to help improve user experience and reduce the learning...</p>
                        <a href="#" class="text-crypto-primary text-sm hover:underline">Learn More</a>
                    </div>
                </div>
                <div class=" bg-crypto-accent/90 p-4 rounded-lg flex items-center">
                    <img src="{{ asset('assets/images/academy4.png') }}" alt="Image 4" class="w-32 h-32 rounded-lg mr-4">
                    <div>
                        <h3 class="text-lg font-bold mb-2">Trading Bots Disclaimer</h3>
                        <p class="text-gray-400 text-sm">The Trading Bots Disclaimer is an inseparable part of our Binance Terms of Use and Binance Futures...</p>
                        <a href="#" class="text-crypto-primary text-sm hover:underline">Learn More</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Hot Coin Leaderboard Section -->
        <section class="mb-12">
            <h2 class="text-2xl font-bold uppercase text-center mb-8">Hot Coin Leaderboard</h2>
            <div class="flex space-x-6">
                <div class="w-1/2">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-base font-bold">Trending Market Top 10</h3>
                        <span class="text-xs text-gray-400">Last updated on 2025-06-14 02:26:28</span>
                    </div>
                    <div class="flex space-x-2 mb-4">
                        <button class="bg-white text-black px-4 py-2 rounded-md">Spot</button>
                        <button class="text-white px-4 py-2">Futures Grid</button>
                        <button class="border border-white text-white px-3 py-2 rounded-md">USDT/M</button>
                    </div>
                    <table class="w-full text-sm">
                        <thead class="bg-crypto-accent">
                            <tr>
                                <th class="p-3 text-left">Market</th>
                                <th class="p-3 text-center">Running</th>
                                <th class="p-3 text-center">Neutral/Long/Short Ratio</th>
                                <th class="p-3 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-gray-700">
                                <td class="p-3">ETHUSDT <span class="text-gray-400">(Perp)</span></td>
                                <td class="p-3 text-center">2282</td>
                                <td class="p-3 text-center">734 : 1315 : 213</td>
                                <td class="p-3 text-center"><button class="border border-white text-white px-4 py-2 rounded-md">Copy</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="w-1/2">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-base font-bold">Volatility Top 10</h3>
                        <span class="text-xs text-gray-400">Last updated on 2025-06-14 02:26:28</span>
                    </div>
                    <div class="flex space-x-2 mb-4">
                        <button class="bg-white text-black px-4 py-2 rounded-md">Spot</button>
                        <button class="text-white px-4 py-2">Futures Grid</button>
                        <button class="border border-white text-white px-3 py-2 rounded-md">USDT/M</button>
                    </div>
                    <table class="w-full text-sm">
                        <thead class="bg-crypto-accent">
                            <tr>
                                <th class="p-3 text-left">Market</th>
                                <th class="p-3 text-center">Volatility</th>
                                <th class="p-3 text-center">Last Price</th>
                                <th class="p-3 text-center">24h%</th>
                                <th class="p-3 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-gray-700">
                                <td class="p-3">DEGOUSDT <span class="text-gray-400">(Perp)</span></td>
                                <td class="p-3 text-center">2.63</td>
                                <td class="p-3 text-center">1.086</td>
                                <td class="p-3 text-center text-red-500">-12.3%</td>
                                <td class="p-3 text-center"><button class="border border-white text-white px-4 py-2 rounded-md">Copy</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="mb-12 flex space-x-6">
            <div class="w-1/3 bg-crypto-accent p-4 rounded-lg">
                <img src="{{ asset('assets/images/article.png') }}" alt="Article" class="w-32 h-32 rounded-lg mb-4">
                <h3 class="text-lg font-bold mb-2">How to Identify and Replicate Futures Grid Trading Strategy on Binance...</h3>
                <p class="text-gray-400 text-sm mb-4">Grid trading on Binance Futures is a strategic tool that can be useful when markets are volatile and prices...</p>
                <a href="#" class="text-crypto-primary text-sm hover:underline">Learn More ></a>
            </div>
            <div class="w-2/3">
                <h2 class="text-5xl font-bold text-center mb-10">FAQ</h2>
                <div id="accordion" data-accordion="collapse">
                    <h2 id="accordion-heading-1">
                        <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-white bg-crypto-accent rounded-t-lg" data-accordion-target="#accordion-body-1" aria-expanded="true" aria-controls="accordion-body-1">
                            <span>1. What Is Spot Grid Trading and How Does It Work</span>
                            <svg data-accordion-icon class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-body-1" class="hidden p-5  bg-crypto-accent/90" aria-labelledby="accordion-heading-1">
                        <p class="text-gray-400">Grid trading is a type of quantitative trading strategy. This trading bot automates buying and selling on spot trading. It is designed to place orders in the market at preset intervals within a configured price range.</p>
                    </div>
                    <h2 id="accordion-heading-2">
                        <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-white bg-crypto-accent" data-accordion-target="#accordion-body-2" aria-expanded="false" aria-controls="accordion-body-2">
                            <span>2. How to Create a Spot Grid Trading Strategy on Binance</span>
                            <svg data-accordion-icon class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-body-2" class="hidden p-5  bg-crypto-accent/90" aria-labelledby="accordion-heading-2">
                        <p class="text-gray-400">To create a spot grid trading strategy on Binance, log in to your account, navigate to the trading bots section, select 'Spot Grid,' configure your price range and grid intervals, and start the bot.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
