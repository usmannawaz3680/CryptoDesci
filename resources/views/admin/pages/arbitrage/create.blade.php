@extends('admin.layout.app')
@section('sidebar')
    @include('admin.layout.partials.sidebar')
@endsection
@section('content')
   <div class="w-full overflow-x-hidden custom-scrollbar">
    <div class="content-area page-transition m-4 md:m-6">
        <div class="p-4 md:p-6 bg-crypto-accent rounded-xl text-white">
            <h2 class="text-2xl font-semibold mb-4 text-crypto-primary">Create Arbitrage Bot</h2>

            <form action="" method="POST">
                @csrf

                {{-- Trading Pair --}}
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Trading Pair</label>
                    <select name="trading_pair_id" required
                        class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                        <option disabled selected>Choose a pair</option>
                        @foreach ($tradingPairs as $item)
                            <option value="{{ $item->id }}">{{ $item->base_asset . '/' . $item->quote_asset }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Exchange From --}}
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">From Exchange</label>
                    <select name="exchange_from_id" required
                        class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                        <option disabled selected>Select From Exchange</option>
                        @foreach ($exchanges as $exchange)
                            <option value="{{ $exchange->id }}">{{ $exchange->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Exchange To --}}
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">To Exchange</label>
                    <select name="exchange_to_id" required
                        class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                        <option disabled selected>Select To Exchange</option>
                        @foreach ($exchanges as $exchange)
                            <option value="{{ $exchange->id }}">{{ $exchange->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Category --}}
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Category</label>
                    <select name="category" required
                        class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                        <option disabled selected>Choose Category</option>
                        <option value="USDT">USDT</option>
                        <option value="COIN-M">COIN-M</option>
                    </select>
                </div>

                {{-- Type --}}
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Type</label>
                    <select name="type" required
                        class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                        <option disabled selected>Choose Type</option>
                        <option value="1">Type 1 (Sell First)</option>
                        <option value="2">Type 2 (Buy First)</option>
                    </select>
                </div>

                {{-- Is Active Toggle --}}
                <div class="mb-6 flex items-center gap-2">
                    <input type="checkbox" name="is_active" id="is_active" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" checked>
                    <label for="is_active" class="text-sm text-white">Is Active</label>
                </div>

                {{-- Submit --}}
                <div class="text-end">
                    <button type="submit"
                        class="bg-crypto-primary text-black font-medium py-2 px-6 rounded hover:brightness-110 transition">
                        Create Bot
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
