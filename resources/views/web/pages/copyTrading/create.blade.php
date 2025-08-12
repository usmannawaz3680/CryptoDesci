@extends('web.layout.app')

@section('title', 'Copy Trader | ' . $trader->username)

@section('content')
    <div class="max-w-7xl mx-auto p-6">
        <h1 class="text-2xl font-semibold mb-8">Futures Copy Settings</h1>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column -->
            <div class="lg:col-span-2 space-y-6 bg-crypto-accent border-gray-800 p-6 rounded-xl">
                <!-- Fixed Ratio / Fixed Amount -->
                <div class="space-y-4">
                    <div class="flex items-center gap-4">
                        <div class="flex bg-gray-800 rounded-lg p-1">
                            <button class="px-4 py-2 rounded-md text-sm font-medium transition-colors bg-gray-700 text-white">
                                Fixed Ratio
                            </button>
                        </div>
                        <span class="w-4 h-4 text-gray-500">[?]</span>
                    </div>
                    <p class="text-sm text-gray-400">
                        * The copy ratio is calculated based on the margin used for the opening order as a percentage of the lead trader's total margin balance.
                    </p>
                </div>

                <!-- Copy Amount -->
                <form action="{{ route('web.copytrading.invest', $trader->id) }}" method="POST" class="space-y-2 mb-2">
                    @csrf
                    <label class="text-sm font-medium">Copy Amount</label>
                    <div class="relative">
                        <input type="number" step="0.01" name="investment_amount" max="@auth{{ auth()->user()->wallets->where('asset_coin_id', 1)->first()->balance }} @endauth" required class="bg-crypto-accent/90 rounded-md border-gray-700 text-white md:w-3/6 inline-block w-full"
                            placeholder="Enter amount" />
                        <div class="px-2 py-1 flex items-center gap-2">
                            <span class="text-gray-400 text-sm"> {{ number_format($trader->max_copy_amount) }} USDT</span>
                            <span class="text-[#f0bb0b] text-sm font-medium">MAX</span>
                        </div>
                    </div>
                    @error('investment_amount')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror

                    <!-- Investment Period -->
                    <div class="space-y-3">
                        <label class="text-sm font-medium block">Investment Period</label>
                        <select name="period_days" required class="bg-crypto-accent/90 rounded-md border-gray-700 text-white md:w-3/6 inline-block w-full">
                            <option value="" disabled selected>Choose Period</option>
                            <option value="7">7 Days</option>
                            <option value="10">10 Days</option>
                            <option value="30">30 Days</option>
                        </select>
                    </div>
                    @error('period_days')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    @auth
                        <!-- Terms Agreement -->
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" name="terms" id="terms" class="border-gray-600" required />
                            <label for="terms" class="text-sm">
                                I have read and I agree to the <span class="text-[#f0bb0b] underline cursor-pointer">User Service Agreement</span>
                            </label>
                        </div>
                        @error('terms')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <!-- Copy Button -->
                        <button type="submit" class="w-full bg-[#f0bb0b] hover:bg-[#f0bb0b]/90 text-black font-semibold py-3 text-base">
                            Copy
                        </button>
                    @endauth
                </form>
                <!-- Not Authenticated Message -->
                @guest
                <div>
                  <a href="{{ route('login') }}" class="w-full bg-[#f0bb0b] hover:bg-[#f0bb0b]/90 text-black font-semibold py-3 px-3 rounded-md">Login / Signup</a>
                </div>
                @endguest
            </div>

            <!-- Right Column -->
            <div class="space-y-6">
                <div class="bg-crypto-accent border-gray-800 p-6 rounded-xl">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 bg-[#f0bb0b] rounded-full flex items-center justify-center">
                            <span class="text-black font-bold text-lg">{{ strtoupper(substr($trader->username, 0, 1)) }}</span>
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <h3 class="font-semibold">{{ $trader->name }}</h3>
                                {{-- @if (json_decode($trader->badges, true)['top_performer'])
                <div class="flex items-center gap-1">
                  <span class="w-4 h-4 bg-[#f0bb0b]">★</span>
                  <span class="text-xs text-gray-400">Top Performer</span>
                </div>
              @endif --}}
                            </div>
                        </div>
                    </div>

                    <div class="space-y-3 mb-6">
                        <div class="flex items-center gap-2">
                            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                            <span class="text-sm">Profit Sharing {{ $trader->profit_sharing }}%</span>
                        </div>
                        <p class="text-sm text-gray-400">
                            Be patient with newcomers (experienced traders in the cryptocurrency circle) and pay attention to the position
                        </p>
                        <a href="{{-- route('user.copy-trader.original', $trader->id) --}}" class="text-[#f0bb0b] text-sm underline">View Original</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
