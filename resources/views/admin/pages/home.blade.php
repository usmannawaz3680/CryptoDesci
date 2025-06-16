@extends('admin.layout.app')
@section('title', 'Dashboard')

@section('sidebar')
    @include('admin.layout.partials.sidebar')
@endsection

@section('content')
    <div class="w-full overflow-x-hidden custom-scrollbar bg-neutral-900">
        <div class="content-area page-transition">
            <!-- User Profile Section -->
            <div class="p-4 md:p-6">
                <div class="flex flex-col md:flex-row md:items-center flex-wrap">
                    <!-- User Avatar and Name -->
                    <div class="flex items-center mb-4 md:mb-0">
                        <div class="relative">
                            <img src="assets/images/placeholder.svg" alt="User Avatar" class="w-12 h-12 md:w-14 md:h-14 rounded-full bg-gray-700" />
                            <div class="absolute -bottom-1 -right-2 flex">
                                <span class="bg-green-500 w-5 h-5 flex items-center justify-center rounded-full text-xs">
                                    <i class="fas fa-check text-white"></i>
                                </span>
                                <span class="bg-blue-500 w-5 h-5 flex items-center justify-center rounded-full text-xs ml-1">
                                    <i class="fab fa-twitter text-white"></i>
                                </span>
                            </div>
                        </div>
                        <div class="ml-4">
                            @auth
                                    <h2 class="text-lg md:text-xl font-medium">{{ auth()->user()->name }}</h2>
                            @endauth
                        </div>                        
                    </div>

                    <!-- User Stats -->
                    <div class="grid grid-cols-2 gap-4 lg:flex lg:items-center lg:gap-10 lg:ml-20">
                        <div class="md:border-l md:border-neutral-600 md:pl-10">
                            <div class="text-gray-400 text-xs md:text-sm">UID</div>
                            <div class="flex items-center text-sm md:text-base">
                                <span>1019573380</span>
                                <i class="fas fa-copy ml-2 text-gray-400 cursor-pointer"></i>
                            </div>
                        </div>

                        <div class="md:border-l md:border-neutral-600 md:pl-10">
                            <div class="text-gray-400 text-xs md:text-sm">VIP Level</div>
                            <div class="flex items-center text-sm md:text-base">
                                <span>Regular User</span>
                                <i class="fas fa-chevron-right ml-2 text-gray-400 text-xs"></i>
                            </div>
                        </div>

                        <div class="md:border-l md:border-neutral-600 md:pl-10">
                            <div class="text-gray-400 text-xs md:text-sm">Following</div>
                            <div class="text-sm md:text-base">0</div>
                        </div>

                        <div class="md:border-l md:border-neutral-600 md:pl-10">
                            <div class="text-gray-400 text-xs md:text-sm">Followers</div>
                            <div class="flex items-center text-sm md:text-base">
                                <span>0</span>
                                <i class="fas fa-chevron-right ml-2 text-gray-400 text-xs"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Get Started Section -->
            <div class="p-4">
                <h2 class="text-xl md:text-2xl font-medium mb-6">Get Started</h2>

                <!-- Steps Progress -->
                <div class="flex items-center mb-6">
                    <!-- Step 1 -->
                    <div class="flex flex-col items-center">
                        <div class="step-circle bg-crypto-primary">1</div>
                    </div>

                    <!-- Connector -->
                    <div class="step-connector w-full mx-2"></div>

                    <!-- Step 2 -->
                    <div class="flex flex-col items-center">
                        <div class="step-circle">2</div>
                    </div>

                    <!-- Connector -->
                    <div class="step-connector w-full mx-2"></div>

                    <!-- Step 3 -->
                    <div class="flex flex-col items-center">
                        <div class="step-circle">3</div>
                    </div>
                </div>

                <!-- Steps Content -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                    <!-- Step 1: Verification Failed -->
                    <div class="border border-yellow-600 rounded-lg p-4 md:p-6 bg-crypto-accent/80 relative overflow-hidden">
                        <h3 class="text-red-400 text-lg md:text-xl font-medium mb-2">Verification Failed</h3>
                        <p class="text-gray-400 text-sm md:text-base mb-16 md:mb-20">Please view the reasons and resubmit when you are ready.</p>

                        <div class="flex justify-center items-center absolute bottom-8 md:bottom-10 right-4 md:right-6">
                            <img src="assets/images/placeholder.svg" alt="Verification" class="h-20 md:h-24" />
                        </div>

                        <button class="bg-dark-lighter text-white px-3 py-1.5 md:px-4 md:py-2 text-sm rounded mt-4 hover:bg-dark-hover transition-colors">View Details</button>
                    </div>

                    <!-- Step 2: Deposit -->
                    <div class="border border-neutral-600 rounded-lg p-4 md:p-6 bg-crypto-accent/80 flex flex-col justify-between">
                        <h3 class="text-lg md:text-xl font-medium mb-2">Deposit</h3>
                        <div class="flex justify-center mt-12 md:mt-16">
                            <button class="bg-btn text-black font-medium px-6 py-2 rounded w-full hover:bg-opacity-90 transition-colors">Deposit</button>
                        </div>
                    </div>

                    <!-- Step 3: Trade -->
                    <div class="border border-neutral-600 rounded-lg p-4 md:p-6 bg-crypto-accent/80 flex flex-col justify-between">
                        <h3 class="text-lg md:text-xl font-medium mb-2">Trade</h3>
                        <div class="flex items-center justify-center mt-12 md:mt-16 text-gray-400">
                            <i class="far fa-clock mr-2"></i>
                            <span>Pending</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Estimated Balance Section -->
            <div class="p-4">
                <div class="border border-neutral-600 rounded-lg p-4 md:p-6 bg-crypto-accent/80">
                    <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                        <div class="flex items-center mb-4 md:mb-0">
                            <h3 class="text-lg md:text-xl font-medium">Estimated Balance</h3>
                            <i class="fas fa-eye ml-2 text-gray-400"></i>
                        </div>

                        <div class="grid grid-cols-3 gap-2 md:flex md:gap-3">
                            <button class="bg-dark-lighter text-white px-2 py-1.5 md:px-4 md:py-2 text-sm rounded hover:bg-dark-hover transition-colors">Deposit</button>
                            <button class="bg-dark-lighter text-white px-2 py-1.5 md:px-4 md:py-2 text-sm rounded hover:bg-dark-hover transition-colors">Withdraw</button>
                            <button class="bg-dark-lighter text-white px-2 py-1.5 md:px-4 md:py-2 text-sm rounded hover:bg-dark-hover transition-colors">Cash In</button>
                        </div>
                    </div>
                    <div class="flex items-baseline justify-start gap-3">
                        <h3 class="text-4xl font-bold">0.00</h3>
                        <div>
                            <button type="button" id="currency-drop" data-dropdown-toggle="currency-dropdown" data-dropdown-trigger="hover" data-dropdown-delay="100" class="text-white text-sm rounded hover:bg-dark-hover transition-colors mb-1">BTC <i class="fas fa-chevron-down"></i></button>
                            <ul id="currency-dropdown" class="z-10 hidden bg-crypto-accent rounded-lg shadow-sm w-24 dark:bg-crypto-accent/80 overflow-hidden">
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-200 hover:bg-dark-hover">ETH</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-200 hover:bg-dark-hover">BTC</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-200 hover:bg-dark-hover">USDT</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <p>
                            Today‘s PnL <span class="text-gray-600"><i class="fas fa-info-circle"></i> + $0.00(0.00%)</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="p-4">
                <div class="border border-neutral-600 rounded-lg p-4 md:p-6 bg-crypto-accent/80">
                    <h3 class="text-white text-lg md:text-xl font-medium mb-2">Markets</h3>
                    <div>
                        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center gap-3" id="markets-tab" data-tabs-toggle="#markets-tab-content"
                                data-tabs-active-classes="text-yellow-600 hover:text-yellow-600 dark:text-yellow-500 dark:hover:text-yellow-500 border-yellow-600 dark:border-yellow-500"
                                data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300" role="tablist">

                                <li class="me-2" role="presentation">
                                    <button class="inline-block py-2 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="holding-tab" data-tabs-target="#holding" type="button" role="tab" aria-controls="holding"
                                        aria-selected="false">Holding</button>
                                </li>
                                <li role="presentation">
                                    <button class="inline-block py-2 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="volume24h-tab" data-tabs-target="#volume24h" type="button" role="tab" aria-controls="volume24h"
                                        aria-selected="false">DAOs</button>
                                </li>
                            </ul>
                        </div>
                        <div id="markets-tab-content">
                            <div class="hidden rounded-lg" id="holding" role="tabpanel" aria-labelledby="holding-tab">
                                <div class="overflow-x-auto shadow-md rounded-lg">
                                    <table id="cryptoTable" class="display w-full text-sm text-left text-gray-400">
                                        <thead class="text-xs uppercase text-gray-600">
                                            <tr>
                                                <th class="py-3 px-6">Popular Coins</th>
                                                <th class="py-3 px-6">Amount</th>
                                                <th class="py-3 px-6">Coin Price</th>
                                                <th class="py-3 px-6">Growth (last 3 years)</th>
                                                <th class="py-3 px-6">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="hover:bg-gray-800">
                                                <td class="py-4 px-6 flex items-center gap-2">
                                                    <img src="assets/images/bitcoin.png" class="h-6 w-6" />
                                                    <div>
                                                        <div class="font-bold">BNB</div>
                                                        <div class="text-sm text-gray-500">BNB</div>
                                                    </div>
                                                </td>
                                                <td class="py-4 px-6">
                                                    0.00<br />
                                                    <span class="text-gray-500 text-sm">$0.00</span>
                                                </td>
                                                <td class="py-4 px-6">
                                                    $657.37<br />
                                                    <span class="text-gray-500 text-sm">0.00%</span>
                                                </td>
                                                <td class="py-4 px-6"><span>📈</span> 0.00%</td>
                                                <td class="py-4 px-6 text-yellow-500 font-semibold">
                                                    <a href="#" class="hover:underline">Cash In</a>
                                                </td>
                                            </tr>
                                            <tr class="hover:bg-gray-800">
                                                <td class="py-4 px-6 flex items-center gap-2">
                                                    <img src="assets/images/bitcoin.png" class="h-6 w-6" />
                                                    <div>
                                                        <div class="font-bold">BTC</div>
                                                        <div class="text-sm text-gray-500">Bitcoin</div>
                                                    </div>
                                                </td>
                                                <td class="py-4 px-6">
                                                    0.00<br />
                                                    <span class="text-gray-500 text-sm">$0.00</span>
                                                </td>
                                                <td class="py-4 px-6">
                                                    $105,006.74<br />
                                                    <span class="text-gray-500 text-sm">0.00%</span>
                                                </td>
                                                <td class="py-4 px-6"><span>📈</span> 0.00%</td>
                                                <td class="py-4 px-6 text-yellow-500 font-semibold">
                                                    <a href="#" class="hover:underline">Cash In</a>
                                                </td>
                                            </tr>
                                            <tr class="hover:bg-gray-800">
                                                <td class="py-4 px-6 flex items-center gap-2">
                                                    <img src="assets/images/bitcoin.png" class="h-6 w-6" />
                                                    <div>
                                                        <div class="font-bold">ETH</div>
                                                        <div class="text-sm text-gray-500">Ethereum</div>
                                                    </div>
                                                </td>
                                                <td class="py-4 px-6">
                                                    0.00<br />
                                                    <span class="text-gray-500 text-sm">$0.00</span>
                                                </td>
                                                <td class="py-4 px-6">
                                                    $2,529.69<br />
                                                    <span class="text-gray-500 text-sm">0.00%</span>
                                                </td>
                                                <td class="py-4 px-6"><span>📈</span> 0.00%</td>
                                                <td class="py-4 px-6 text-yellow-500 font-semibold">
                                                    <a href="#" class="hover:underline">Cash In</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="hidden rounded-lg" id="newlisting" role="tabpanel" aria-labelledby="newlisting-tab">
                                <div class="overflow-x-auto shadow-md rounded-lg">
                                    <table id="cryptoTable" class="display w-full text-sm text-left text-gray-400">
                                        <thead class="text-xs uppercase text-gray-600">
                                            <tr>
                                                <th class="py-3 px-6">Popular Coins</th>
                                                <th class="py-3 px-6">Amount</th>
                                                <th class="py-3 px-6">Coin Price</th>
                                                <th class="py-3 px-6">Growth (last 3 years)</th>
                                                <th class="py-3 px-6">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="hover:bg-gray-800">
                                                <td class="py-4 px-6 flex items-center gap-2">
                                                    <img src="assets/images/bitcoin.png" class="h-6 w-6" />
                                                    <div>
                                                        <div class="font-bold">BNB</div>
                                                        <div class="text-sm text-gray-500">BNB</div>
                                                    </div>
                                                </td>
                                                <td class="py-4 px-6">
                                                    0.00<br />
                                                    <span class="text-gray-500 text-sm">$0.00</span>
                                                </td>
                                                <td class="py-4 px-6">
                                                    $657.37<br />
                                                    <span class="text-gray-500 text-sm">0.00%</span>
                                                </td>
                                                <td class="py-4 px-6"><span>📈</span> 0.00%</td>
                                                <td class="py-4 px-6 text-yellow-500 font-semibold">
                                                    <a href="#" class="hover:underline">Cash In</a>
                                                </td>
                                            </tr>
                                            <tr class="hover:bg-gray-800">
                                                <td class="py-4 px-6 flex items-center gap-2">
                                                    <img src="assets/images/bitcoin.png" class="h-6 w-6" />
                                                    <div>
                                                        <div class="font-bold">BTC</div>
                                                        <div class="text-sm text-gray-500">Bitcoin</div>
                                                    </div>
                                                </td>
                                                <td class="py-4 px-6">
                                                    0.00<br />
                                                    <span class="text-gray-500 text-sm">$0.00</span>
                                                </td>
                                                <td class="py-4 px-6">
                                                    $105,006.74<br />
                                                    <span class="text-gray-500 text-sm">0.00%</span>
                                                </td>
                                                <td class="py-4 px-6"><span>📈</span> 0.00%</td>
                                                <td class="py-4 px-6 text-yellow-500 font-semibold">
                                                    <a href="#" class="hover:underline">Cash In</a>
                                                </td>
                                            </tr>
                                            <tr class="hover:bg-gray-800">
                                                <td class="py-4 px-6 flex items-center gap-2">
                                                    <img src="assets/images/bitcoin.png" class="h-6 w-6" />
                                                    <div>
                                                        <div class="font-bold">ETH</div>
                                                        <div class="text-sm text-gray-500">Ethereum</div>
                                                    </div>
                                                </td>
                                                <td class="py-4 px-6">
                                                    0.00<br />
                                                    <span class="text-gray-500 text-sm">$0.00</span>
                                                </td>
                                                <td class="py-4 px-6">
                                                    $2,529.69<br />
                                                    <span class="text-gray-500 text-sm">0.00%</span>
                                                </td>
                                                <td class="py-4 px-6"><span>📈</span> 0.00%</td>
                                                <td class="py-4 px-6 text-yellow-500 font-semibold">
                                                    <a href="#" class="hover:underline">Cash In</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="hidden rounded-lg" id="favorite" role="tabpanel" aria-labelledby="favorite-tab">
                                <div class="overflow-x-auto shadow-md rounded-lg">
                                    <table id="cryptoTable" class="display w-full text-sm text-left text-gray-400">
                                        <thead class="text-xs uppercase text-gray-600">
                                            <tr>
                                                <th class="py-3 px-6">Popular Coins</th>
                                                <th class="py-3 px-6">Amount</th>
                                                <th class="py-3 px-6">Coin Price</th>
                                                <th class="py-3 px-6">Growth (last 3 years)</th>
                                                <th class="py-3 px-6">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="hover:bg-gray-800">
                                                <td class="py-4 px-6 flex items-center gap-2">
                                                    <img src="assets/images/bitcoin.png" class="h-6 w-6" />
                                                    <div>
                                                        <div class="font-bold">BNB</div>
                                                        <div class="text-sm text-gray-500">BNB</div>
                                                    </div>
                                                </td>
                                                <td class="py-4 px-6">
                                                    0.00<br />
                                                    <span class="text-gray-500 text-sm">$0.00</span>
                                                </td>
                                                <td class="py-4 px-6">
                                                    $657.37<br />
                                                    <span class="text-gray-500 text-sm">0.00%</span>
                                                </td>
                                                <td class="py-4 px-6"><span>📈</span> 0.00%</td>
                                                <td class="py-4 px-6 text-yellow-500 font-semibold">
                                                    <a href="#" class="hover:underline">Cash In</a>
                                                </td>
                                            </tr>
                                            <tr class="hover:bg-gray-800">
                                                <td class="py-4 px-6 flex items-center gap-2">
                                                    <img src="assets/images/bitcoin.png" class="h-6 w-6" />
                                                    <div>
                                                        <div class="font-bold">BTC</div>
                                                        <div class="text-sm text-gray-500">Bitcoin</div>
                                                    </div>
                                                </td>
                                                <td class="py-4 px-6">
                                                    0.00<br />
                                                    <span class="text-gray-500 text-sm">$0.00</span>
                                                </td>
                                                <td class="py-4 px-6">
                                                    $105,006.74<br />
                                                    <span class="text-gray-500 text-sm">0.00%</span>
                                                </td>
                                                <td class="py-4 px-6"><span>📈</span> 0.00%</td>
                                                <td class="py-4 px-6 text-yellow-500 font-semibold">
                                                    <a href="#" class="hover:underline">Cash In</a>
                                                </td>
                                            </tr>
                                            <tr class="hover:bg-gray-800">
                                                <td class="py-4 px-6 flex items-center gap-2">
                                                    <img src="assets/images/bitcoin.png" class="h-6 w-6" />
                                                    <div>
                                                        <div class="font-bold">ETH</div>
                                                        <div class="text-sm text-gray-500">Ethereum</div>
                                                    </div>
                                                </td>
                                                <td class="py-4 px-6">
                                                    0.00<br />
                                                    <span class="text-gray-500 text-sm">$0.00</span>
                                                </td>
                                                <td class="py-4 px-6">
                                                    $2,529.69<br />
                                                    <span class="text-gray-500 text-sm">0.00%</span>
                                                </td>
                                                <td class="py-4 px-6"><span>📈</span> 0.00%</td>
                                                <td class="py-4 px-6 text-yellow-500 font-semibold">
                                                    <a href="#" class="hover:underline">Cash In</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="hidden rounded-lg" id="topgainers" role="tabpanel" aria-labelledby="topgainers-tab">
                                <div class="overflow-x-auto shadow-md rounded-lg">
                                    <table id="cryptoTable" class="display w-full text-sm text-left text-gray-400">
                                        <thead class="text-xs uppercase text-gray-600">
                                            <tr>
                                                <th class="py-3 px-6">Popular Coins</th>
                                                <th class="py-3 px-6">Amount</th>
                                                <th class="py-3 px-6">Coin Price</th>
                                                <th class="py-3 px-6">Growth (last 3 years)</th>
                                                <th class="py-3 px-6">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="hover:bg-gray-800">
                                                <td class="py-4 px-6 flex items-center gap-2">
                                                    <img src="assets/images/bitcoin.png" class="h-6 w-6" />
                                                    <div>
                                                        <div class="font-bold">BNB</div>
                                                        <div class="text-sm text-gray-500">BNB</div>
                                                    </div>
                                                </td>
                                                <td class="py-4 px-6">
                                                    0.00<br />
                                                    <span class="text-gray-500 text-sm">$0.00</span>
                                                </td>
                                                <td class="py-4 px-6">
                                                    $657.37<br />
                                                    <span class="text-gray-500 text-sm">0.00%</span>
                                                </td>
                                                <td class="py-4 px-6"><span>📈</span> 0.00%</td>
                                                <td class="py-4 px-6 text-yellow-500 font-semibold">
                                                    <a href="#" class="hover:underline">Cash In</a>
                                                </td>
                                            </tr>
                                            <tr class="hover:bg-gray-800">
                                                <td class="py-4 px-6 flex items-center gap-2">
                                                    <img src="assets/images/bitcoin.png" class="h-6 w-6" />
                                                    <div>
                                                        <div class="font-bold">BTC</div>
                                                        <div class="text-sm text-gray-500">Bitcoin</div>
                                                    </div>
                                                </td>
                                                <td class="py-4 px-6">
                                                    0.00<br />
                                                    <span class="text-gray-500 text-sm">$0.00</span>
                                                </td>
                                                <td class="py-4 px-6">
                                                    $105,006.74<br />
                                                    <span class="text-gray-500 text-sm">0.00%</span>
                                                </td>
                                                <td class="py-4 px-6"><span>📈</span> 0.00%</td>
                                                <td class="py-4 px-6 text-yellow-500 font-semibold">
                                                    <a href="#" class="hover:underline">Cash In</a>
                                                </td>
                                            </tr>
                                            <tr class="hover:bg-gray-800">
                                                <td class="py-4 px-6 flex items-center gap-2">
                                                    <img src="assets/images/bitcoin.png" class="h-6 w-6" />
                                                    <div>
                                                        <div class="font-bold">ETH</div>
                                                        <div class="text-sm text-gray-500">Ethereum</div>
                                                    </div>
                                                </td>
                                                <td class="py-4 px-6">
                                                    0.00<br />
                                                    <span class="text-gray-500 text-sm">$0.00</span>
                                                </td>
                                                <td class="py-4 px-6">
                                                    $2,529.69<br />
                                                    <span class="text-gray-500 text-sm">0.00%</span>
                                                </td>
                                                <td class="py-4 px-6"><span>📈</span> 0.00%</td>
                                                <td class="py-4 px-6 text-yellow-500 font-semibold">
                                                    <a href="#" class="hover:underline">Cash In</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="hidden rounded-lg" id="volume24h" role="tabpanel" aria-labelledby="volume24h-tab">
                                <div class="overflow-x-auto shadow-md rounded-lg">
                                    <table id="cryptoTable" class="display w-full text-sm text-left text-gray-400">
                                        <thead class="text-xs uppercase text-gray-600">
                                            <tr>
                                                <th class="py-3 px-6">Popular Coins</th>
                                                <th class="py-3 px-6">Amount</th>
                                                <th class="py-3 px-6">Coin Price</th>
                                                <th class="py-3 px-6">Growth (last 3 years)</th>
                                                <th class="py-3 px-6">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="hover:bg-gray-800">
                                                <td class="py-4 px-6 flex items-center gap-2">
                                                    <img src="assets/images/bitcoin.png" class="h-6 w-6" />
                                                    <div>
                                                        <div class="font-bold">BNB</div>
                                                        <div class="text-sm text-gray-500">BNB</div>
                                                    </div>
                                                </td>
                                                <td class="py-4 px-6">
                                                    0.00<br />
                                                    <span class="text-gray-500 text-sm">$0.00</span>
                                                </td>
                                                <td class="py-4 px-6">
                                                    $657.37<br />
                                                    <span class="text-gray-500 text-sm">0.00%</span>
                                                </td>
                                                <td class="py-4 px-6"><span>📈</span> 0.00%</td>
                                                <td class="py-4 px-6 text-yellow-500 font-semibold">
                                                    <a href="#" class="hover:underline">Cash In</a>
                                                </td>
                                            </tr>
                                            <tr class="hover:bg-gray-800">
                                                <td class="py-4 px-6 flex items-center gap-2">
                                                    <img src="assets/images/bitcoin.png" class="h-6 w-6" />
                                                    <div>
                                                        <div class="font-bold">BTC</div>
                                                        <div class="text-sm text-gray-500">Bitcoin</div>
                                                    </div>
                                                </td>
                                                <td class="py-4 px-6">
                                                    0.00<br />
                                                    <span class="text-gray-500 text-sm">$0.00</span>
                                                </td>
                                                <td class="py-4 px-6">
                                                    $105,006.74<br />
                                                    <span class="text-gray-500 text-sm">0.00%</span>
                                                </td>
                                                <td class="py-4 px-6"><span>📈</span> 0.00%</td>
                                                <td class="py-4 px-6 text-yellow-500 font-semibold">
                                                    <a href="#" class="hover:underline">Cash In</a>
                                                </td>
                                            </tr>
                                            <tr class="hover:bg-gray-800">
                                                <td class="py-4 px-6 flex items-center gap-2">
                                                    <img src="assets/images/bitcoin.png" class="h-6 w-6" />
                                                    <div>
                                                        <div class="font-bold">ETH</div>
                                                        <div class="text-sm text-gray-500">Ethereum</div>
                                                    </div>
                                                </td>
                                                <td class="py-4 px-6">
                                                    0.00<br />
                                                    <span class="text-gray-500 text-sm">$0.00</span>
                                                </td>
                                                <td class="py-4 px-6">
                                                    $2,529.69<br />
                                                    <span class="text-gray-500 text-sm">0.00%</span>
                                                </td>
                                                <td class="py-4 px-6"><span>📈</span> 0.00%</td>
                                                <td class="py-4 px-6 text-yellow-500 font-semibold">
                                                    <a href="#" class="hover:underline">Cash In</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
                <div class="p-4">
                    <div class="border border-neutral-600 rounded-lg p-4 md:p-6 bg-crypto-accent/80">
                        <h3 class="text-white text-lg md:text-xl font-medium mb-2">Discover</h3>
                        <div>
                            <div class="mb-0">
                                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center gap-3" id="markets-tab" data-tabs-toggle="#markets-tab-content"
                                    data-tabs-active-classes="text-yellow-600 hover:text-yellow-600 dark:text-yellow-500 dark:hover:text-yellow-500 border-yellow-600 dark:border-yellow-500"
                                    data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300" role="tablist">

                                    <li class="me-2" role="presentation">
                                        <button class="inline-block py-2 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="earn-tab" data-tabs-target="#earn" type="button" role="tab" aria-controls="earn" aria-selected="false">Earn</button>
                                    </li>
                                    <li role="presentation">
                                        <button class="inline-block py-2 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="copytrade-tab" data-tabs-target="#copytrade" type="button" role="tab" aria-controls="copytrade" aria-selected="false">Copy
                                            Trading</button>
                                    </li>
                                </ul>
                            </div>
                            <div id="earn-tab-content">
                                <div class="hidden rounded-lg" id="earn" role="tabpanel" aria-labelledby="earn-tab">
                                    <p class="text-gray-500 text-sm pt-3">Simple & Secure. Search popular coins and start earning.</p>
                                    <div class="overflow-x-auto shadow-md rounded-lg">
                                        <table id="cryptoDiscoverTable" class="display w-full text-sm text-left text-gray-400">
                                            <thead class="text-xs uppercase text-gray-600">
                                                <tr>
                                                    <th class="py-3 px-6">Coins</th>
                                                    <th class="py-3 px-6">Est.ATR</th>
                                                    <th class="py-3 px-6">Duration</th>
                                                    <th class="py-3 px-6">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="hover:bg-gray-800">
                                                    <td class="py-4 px-6 flex items-center gap-2">
                                                        <img src="assets/images/bitcoin.png" class="h-6 w-6" />
                                                        <div>
                                                            <div class="font-bold">BNB</div>
                                                        </div>
                                                    </td>
                                                    <td class="py-4 px-6 text-green-500">
                                                        10.88% - 10.88%
                                                    </td>
                                                    <td class="py-4 px-6">Flexible</td>
                                                    <td class="py-4 px-6 text-yellow-500 font-semibold">
                                                        <a href="#" class="hover:underline">Subscribe</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div id="copytrade-tab-content">
                                <div class="hidden rounded-lg" id="copytrade" role="tabpanel" aria-labelledby="copytrade-tab">
                                    <p class="text-gray-500 text-sm pt-3">No need to understand complex trading knowledge,follow the expert's operations automatically and achieve passive income !
                                        View Tutorial</p>
                                    <div class="overflow-x-auto shadow-md rounded-lg">
                                        <table id="cryptoTable" class="display w-full text-sm text-left text-gray-400">
                                            <thead class="text-xs uppercase text-gray-600">
                                                <tr>
                                                    <th class="py-3 px-6">Top Traders</th>
                                                    <th class="py-3 px-6">30D ROI</th>
                                                    <th class="py-3 px-6">AUM(USDT)</th>
                                                    <th class="py-3 px-6">Win Rate</th>
                                                    <th class="py-3 px-6">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="hover:bg-gray-800">
                                                    <td class="py-4 px-6 flex items-center gap-2">
                                                        <img src="assets/images/bitcoin.png" class="h-6 w-6" />
                                                        <div>
                                                            <div class="font-bold">YHWA</div>
                                                        </div>
                                                    </td>
                                                    <td class="py-4 px-6">
                                                        <span class="text-green-500 text-sm">+33.9%</span>
                                                    </td>
                                                    <td class="py-4 px-6">
                                                        12,657.37
                                                    </td>
                                                    <td class="py-4 px-6">38.33%</td>
                                                    <td class="py-4 px-6 text-yellow-500 font-semibold">
                                                        <a href="#" class="hover:underline px-2">Mock</a>
                                                        <a href="#" class="hover:underline px-2">Copy</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <div class="border border-neutral-600 rounded-lg p-4 md:p-6 bg-crypto-accent/80">
                        <h3 class="text-white text-lg md:text-xl font-medium mb-2">Announcements</h3>
                        <ul class="space-y-2">
                            <li>
                                <a href="#" class="text-white block hover:text-yellow-400">Announcement 1
                                </a>
                                <small class="text-gray-500 text-xs ml-2">16-01-2023</small>
                            </li>
                            <li>
                                <a href="#" class="text-white block hover:text-yellow-400">Announcement 2
                                </a>
                                <small class="text-gray-500 text-xs ml-2">19-01-2025</small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="p-4 col-span-full">
                <div class="border border-neutral-600 rounded-lg p-4 md:p-6 bg-crypto-accent/80">
                    <h3 class="text-white text-lg md:text-xl font-medium mb-2">Square</h3>
                    <div>
                        <div class="mb-0">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center gap-3" id="square-tab" data-tabs-toggle="#square-tab-content"
                                data-tabs-active-classes="text-yellow-600 hover:text-yellow-600 dark:text-yellow-500 dark:hover:text-yellow-500 border-yellow-600 dark:border-yellow-500"
                                data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300" role="tablist">
                                <li class="me-2" role="presentation">
                                    <button class="inline-block py-2 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="news-tab" data-tabs-target="#news" type="button" role="tab" aria-controls="news" aria-selected="false">News</button>
                                </li>
                                <li role="presentation">
                                    <button class="inline-block py-2 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="suggested-tab" data-tabs-target="#suggested" type="button" role="tab" aria-controls="suggested" aria-selected="false">Suggested
                                        for you</button>
                                </li>
                            </ul>
                        </div>
                        <div id="square-tab-content">
                            <div class="hidden rounded-lg" id="news" role="tabpanel" aria-labelledby="news-tab">
                                <p class="text-gray-500 text-sm pt-3">Stay updated with the latest crypto news and market trends.</p>
                                <ul class="mt-4 space-y-2">
                                    <li><a href="#" class="text-yellow-500 hover:underline">Crypto Market Surge: What to Expect</a></li>
                                    <li><a href="#" class="text-yellow-500 hover:underline">New Regulation Updates</a></li>
                                </ul>
                            </div>
                            <div class="hidden rounded-lg" id="suggested" role="tabpanel" aria-labelledby="suggested-tab">
                                <p class="text-gray-500 text-sm pt-3">Personalized suggestions based on your activity.</p>
                                <ul class="mt-4 space-y-2">
                                    <li><a href="#" class="text-yellow-500 hover:underline">Top Copy Trading Strategies</a></li>
                                    <li><a href="#" class="text-yellow-500 hover:underline">Recommended Earning Plans</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
