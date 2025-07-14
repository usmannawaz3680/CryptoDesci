@extends('admin.layout.app')
@section('sidebar')
    @include('admin.layout.partials.sidebar')
@endsection
@section('content')
    <div class="w-full overflow-x-hidden custom-scrollbar">
        <div class="content-area page-transition m-4 md:m-6">
            <div class="p-4 md:p-6 bg-crypto-accent rounded-xl text-white">
                <h2 class="text-2xl font-semibold mb-6 text-crypto-primary">
                    Configure Bot: {{ $bot->tradingPair->base_asset }}/{{ $bot->tradingPair->quote_asset }}
                </h2>

                {{-- FEE TIERS --}}
                <form action="{{ route('admin.arbitrage-bots.saveFees', $bot->id) }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-white mb-3">Set Fee Tiers</h3>
                        <div id="fee-tiers" class="space-y-3">
                            @foreach ($bot->fees as $fee)
                                <div class="flex gap-3">
                                    <input type="number" name="min_amount[]" placeholder="Min $" step="0.01" value="{{ $fee->min_amount }}" class="flex-1 p-2 rounded bg-zinc-800 border border-gray-600 text-white">
                                    <input type="number" name="max_amount[]" placeholder="Max $" step="0.01" value="{{ $fee->max_amount }}" class="flex-1 p-2 rounded bg-zinc-800 border border-gray-600 text-white">
                                    <input type="number" name="fee[]" placeholder="Fee %" step="0.01" value="{{ $fee->fee_percentage }}" class="flex-1 p-2 rounded bg-zinc-800 border border-gray-600 text-white">
                                </div>
                            @endforeach
                        </div>

                        <button type="button" onclick="addFeeTier()" class="mt-2 bg-crypto-primary text-black px-4 py-1 rounded">
                            + Add More
                        </button>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="bg-crypto-primary text-black font-medium py-2 px-6 rounded hover:brightness-110 transition">
                            Save Fee Tiers
                        </button>
                    </div>
                </form>

                <hr class="my-8 border-gray-700">

                {{-- APR INTERVALS --}}
                @if ($bot->intervals->count())
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-2 text-crypto-primary">APR Intervals</h3>
                        <div class="space-y-2">
                            @foreach ($bot->intervals as $interval)
                                <div class="bg-zinc-900 p-3 rounded-lg border border-zinc-700 text-sm text-white">
                                    <div>
                                        <span class="font-medium">From:</span> {{ $interval->starts_at }} &nbsp;
                                        <span class="font-medium">To:</span> {{ $interval->ends_at }}
                                        @if ($interval->is_active)
                                            <span class="ml-2 px-2 py-1 bg-green-600 text-xs rounded">Active</span>
                                        @endif
                                    </div>
                                    <div class="mt-2 flex gap-4">
                                        <span>3D: <span class="text-crypto-primary">{{ $interval->apr_3d ?? '—' }}%</span></span>
                                        <span>7D: <span class="text-crypto-primary">{{ $interval->apr_7d ?? '—' }}%</span></span>
                                        <span>30D: <span class="text-crypto-primary">{{ $interval->apr_30d ?? '—' }}%</span></span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- APR INTERVAL --}}
                <form action="{{ route('admin.arbitrage-bots.saveInterval', $bot->id) }}" method="POST">
                    @csrf
                    <h3 class="text-lg font-medium text-white mb-3">Set APR Interval</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <input type="text" name="apr_3d" placeholder="3 Day APR %" step="0.01" class="p-2 rounded bg-zinc-800 border border-gray-600 text-white">
                        <input type="text" name="apr_7d" placeholder="7 Day APR %" step="0.01" class="p-2 rounded bg-zinc-800 border border-gray-600 text-white">
                        <input type="text" name="apr_30d" placeholder="30 Day APR %" step="0.01" class="p-2 rounded bg-zinc-800 border border-gray-600 text-white">
                        <input type="datetime-local" name="starts_at" required class="p-2 rounded bg-zinc-800 border border-gray-600 text-white">
                        <input type="datetime-local" name="ends_at" required class="p-2 rounded bg-zinc-800 border border-gray-600 text-white">
                    </div>

                    <div class="text-end mt-4">
                        <button type="submit" class="bg-crypto-primary text-black font-medium py-2 px-6 rounded hover:brightness-110 transition">
                            Save Interval
                        </button>
                    </div>
                </form>

                {{-- History (Coming Soon) --}}
                <div class="mt-10">
                    <h3 class="text-lg font-medium text-white mb-2">Funding History (coming soon)</h3>
                    <ul class="text-sm text-gray-300">📈 Soon we’ll show all APR intervals here.</ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        function addFeeTier() {
            const html = `
            <div class="flex gap-3">
                <input type="number" name="min_amount[]" placeholder="Min $" step="0.01"
                    class="flex-1 p-2 rounded bg-zinc-800 border border-gray-600 text-white">
                <input type="number" name="max_amount[]" placeholder="Max $" step="0.01"
                    class="flex-1 p-2 rounded bg-zinc-800 border border-gray-600 text-white">
                <input type="number" name="fee[]" placeholder="Fee %" step="0.01"
                    class="flex-1 p-2 rounded bg-zinc-800 border border-gray-600 text-white">
            </div>
            `;
            document.getElementById('fee-tiers').insertAdjacentHTML('beforeend', html);
        }
    </script>
@endsection
