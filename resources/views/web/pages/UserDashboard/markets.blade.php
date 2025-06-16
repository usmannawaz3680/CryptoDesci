@extends('web.layout.app')
@section('title', 'Markets')

@section('sidebar')
    @include('web.pages.UserDashboard.partials.sidebar')
@endsection

@section('content')
    <div class="w-full overflow-x-hidden custom-scrollbar bg-neutral-900">
        <div class="content-area page-transition">
            <div class="p-4">
                <div class="border border-neutral-600 rounded-lg p-4 md:p-6 bg-crypto-accent/80">
                    <h3 class="text-white text-lg md:text-xl font-medium mb-2">Markets</h3>
                    <div>
                        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center gap-3" id="markets-tab" data-tabs-toggle="#markets-tab-content"
                                data-tabs-active-classes="text-yellow-600 hover:text-yellow-600 dark:text-yellow-500 dark:hover:text-yellow-500 border-yellow-600 dark:border-yellow-500"
                                data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300" role="tablist">

                                <li class="me-2" role="presentation">
                                    <button class="inline-block py-2 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="holding-tab" data-tabs-target="#holding" type="button" role="tab" aria-controls="holding" aria-selected="false">Holding</button>
                                </li>
                                <li role="presentation">
                                    <button class="inline-block py-2 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="volume24h-tab" data-tabs-target="#volume24h" type="button" role="tab" aria-controls="volume24h" aria-selected="false">DAOs</button>
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
        </div>
    </div>
@endsection
