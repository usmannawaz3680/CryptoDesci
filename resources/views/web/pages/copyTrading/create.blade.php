@extends('web.layout.app')

@section('title', 'Copy Trader | ' . $trader->username)

@section('content')
    <div class="max-w-4xl mx-auto p-6 mb-40">
        <h1 class="text-[2.2rem] font-semibold mt-4 mb-2">Spot Copy Settings</h1>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column -->
            <div class="lg:col-span-2 space-y-3 bg-crypto-accent rounded-xl">
                <form action="{{ route('web.copytrading.invest', $trader->id) }}" method="POST" class="space-y-6 md:pr-20">
                    @csrf

                    <!-- Tabs: Fixed Ratio / Fixed Amount -->
                    <div>
                        <div class="flex items-center gap-4 mb-4">
                            <button type="button" class="mode-tab px-3 pb-2 text-md font-medium border-b-2 transition-all duration-150 border-crypto-primary text-white" data-mode="fixed_ratio">
                                Fixed Ratio
                            </button>
                            <button type="button" class="mode-tab px-3 pb-2 text-md font-medium border-b-2 transition-all duration-150 border-transparent text-gray-400 hover:text-white" data-mode="fixed_amount">
                                Fixed Amount
                            </button>
                        </div>

                        <input type="hidden" name="mode" id="mode-input" value="fixed_ratio">

                        {{-- Fixed Ratio block --}}
                        <div id="fixed-ratio-block" class="space-y-4">
                            <div class="space-y-2">
                                <label class="text-sm font-medium block">Copy Amount</label>
                                <div class="relative">
                                    <input type="text" name="amount" class="bg-zinc-900 border border-gray-700 w-full  rounded-md px-3 py-2 text-md text-white" placeholder="Enter amount">
                                    <div class="absolute end-5 top-2 h-100 flex items-center gap-2">
                                        <span class="text-md text-gray-300">USDT</span>
                                        <button type="button" class="text-xs text-crypto-primary">Max</button>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-500">
                                    Each order will be purchased proportionally based on trader's positions.
                                </p>
                            </div>

                            <div class="space-y-2">
                                <label class="text-sm font-medium block">Duration</label>
                                <select name="period_days" class="bg-zinc-900 border border-gray-700 rounded-md px-3 py-2 text-md text-white w-full md:w-1/2">
                                    @foreach ($trader->availablePackages as $packages)
                                        <option value="{{ $packages->copyTradingPackage->duration_days }}">{{ $packages->copyTradingPackage->name }}</option>
                                    @endforeach
                                    {{-- <option value="" disabled selected>Select duration</option> --}}
                                    {{-- <option value="7">7 Days</option>
                                    <option value="14">14 Days</option>
                                    <option value="30">30 Days</option> --}}
                                </select>
                            </div>
                        </div>

                        {{-- Fixed Amount block --}}
                        <div id="fixed-amount-block" class="space-y-4 hidden">
                            <div class="space-y-2">
                                <label class="text-md font-medium block">Cost Per Order</label>
                                <div class="flex items-center gap-2">
                                    <input type="number" name="cost_per_order" step="0.01" class="flex-1 bg-zinc-900 border border-gray-700 rounded-md px-3 py-2 text-md text-white" placeholder="10 - 1,000">
                                    <span class="text-sm text-gray-300">USDT</span>
                                </div>
                                <p class="text-xs text-gray-500">
                                    Each day (each order), this amount will be used to calculate profit / loss.
                                </p>
                            </div>

                            <div class="space-y-2">
                                <label class="text-sm font-medium block">Copy Amount</label>
                                <div class="flex items-center gap-2">
                                    <input type="number" name="copy_amount" step="0.01" class="flex-1 bg-zinc-900 border border-gray-700 rounded-md px-3 py-2 text-md text-white" placeholder="10 - 100,000">
                                    <span class="text-sm text-gray-300">USDT</span>
                                    <button type="button" class="text-xs text-crypto-primary">Max</button>
                                </div>
                                <p class="text-xs text-gray-500">
                                    Total amount locked for this copy. Cost per order will be deducted from this daily.
                                </p>
                            </div>

                            <div class="space-y-2">
                                <label class="text-sm font-medium block">Duration</label>
                                <select name="period_days" class="bg-zinc-900 border border-gray-700 rounded-md px-3 py-2 text-md text-white w-full md:w-1/2">
                                    @foreach ($trader->availablePackages as $packages)
                                        <option value="{{ $packages->copyTradingPackage->duration_days }}">{{ $packages->copyTradingPackage->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Auto Invest -->
                    <div class="border border-gray-700 rounded-lg p-4 bg-zinc-900/60 space-y-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-white">Auto-Invest</p>
                                <p class="text-xs text-gray-400">
                                    Automatically create new subscriptions using a fixed amount on your chosen frequency.
                                </p>
                            </div>
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="auto_invest_enabled" id="auto-invest-toggle" class="sr-only" value="1">
                                <span class="w-10 h-5 bg-gray-600 rounded-full flex items-center transition-all">
                                    <span class="dot w-4 h-4 bg-white rounded-full ml-1 transition-transform"></span>
                                </span>
                            </label>
                        </div>

                        <div id="auto-invest-fields" class="grid grid-cols-1 md:grid-cols-2 gap-4 opacity-40 pointer-events-none">
                            <div class="space-y-2">
                                <label class="text-sm font-medium block">Amount</label>
                                <div class="flex items-center gap-2">
                                    <input type="number" step="0.01" name="auto_invest_amount" class="flex-1 bg-zinc-950 border border-gray-700 rounded-md px-3 py-2 text-sm text-white" placeholder="100">
                                    <span class="text-sm text-gray-300">USDT</span>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm font-medium block">Frequency</label>
                                <select name="auto_invest_frequency" class="bg-zinc-950 border border-gray-700 rounded-md px-3 py-2 text-md text-white w-full">
                                    <option value="everyday">Everyday</option>
                                    <option value="7d">7 Days</option>
                                    <option value="14d">14 Days</option>
                                    <option value="30d">30 Days</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Terms & Submit -->
                    <div class="space-y-3">
                        <label class="flex items-center space-x-2 text-sm">
                            <input type="checkbox" name="terms" value="1" class="bg-zinc-900 border border-gray-700 rounded">
                            <span>I have read and I agree to the User Agreement</span>
                        </label>
                        @error('terms')
                            <p class="text-xs text-red-400">{{ $message }}</p>
                        @enderror

                        <button type="submit" class="w-full md:w-1/2 bg-crypto-primary hover:bg-crypto-primary/80 rounded-md text-black font-semibold py-3 text-base">
                            Copy
                        </button>
                    </div>
                </form>
            </div>

            <!-- Right Column -->
            <div class="space-y-6">
                <div class="bg-crypto-accent rounded-xl">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 bg-crypto-primary rounded-full flex items-center justify-center">
                            <span class="text-black font-bold text-lg">{{ strtoupper(substr($trader->username, 0, 1)) }}</span>
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <h3 class="font-semibold">{{ $trader->name }}</h3>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-3 mb-6">
                        <div class="flex items-center gap-2">
                            <div class="w-2 h-2 bg-crypto-primary rounded-full"></div>
                            <span class="text-sm">Profit Sharing {{ $trader->profit_sharing }}%</span>
                        </div>
                        <p class="text-sm text-gray-400">
                            Be patient with newcomers (experienced traders in the cryptocurrency circle) and pay attention
                            to the position
                        </p>
                        <a href="{{-- route('user.copy-trader.original', $trader->id) --}}" class="text-crypto-primary hover:text-crypto-primary/80 text-sm underline">View Original</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modeInput = document.getElementById('mode-input');
            const tabs = document.querySelectorAll('.mode-tab');
            const ratioBlock = document.getElementById('fixed-ratio-block');
            const amountBlock = document.getElementById('fixed-amount-block');

            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    const mode = tab.dataset.mode;
                    modeInput.value = mode;

                    tabs.forEach(t => t.classList.remove('border-crypto-primary', 'text-white'));
                    tabs.forEach(t => t.classList.add('border-transparent', 'text-gray-400'));

                    tab.classList.remove('border-transparent', 'text-gray-400');
                    tab.classList.add('border-crypto-primary', 'text-white');

                    if (mode === 'fixed_ratio') {
                        ratioBlock.classList.remove('hidden');
                        amountBlock.classList.add('hidden');
                    } else {
                        ratioBlock.classList.add('hidden');
                        amountBlock.classList.remove('hidden');
                    }
                });
            });

            const toggle = document.getElementById('auto-invest-toggle');
            const autoFields = document.getElementById('auto-invest-fields');
            const autoFieldsInputs = autoFields.querySelectorAll('input, select');

            toggle.addEventListener('change', function() {
                const enabled = this.checked;
                if (enabled) {
                    autoFields.classList.remove('opacity-40', 'pointer-events-none');
                } else {
                    autoFields.classList.add('opacity-40', 'pointer-events-none');
                }
            });
        });
    </script>
@endpush
