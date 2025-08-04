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
                            <div class="flex gap-3 fee-input">
                                <input type="number" name="min_amount[]" placeholder="Min $" step="1" value="{{ $fee->min_amount }}" class="flex-1 p-2 rounded bg-zinc-800 border border-gray-600 text-white">
                                <input type="number" name="max_amount[]" placeholder="Max $" step="1" value="{{ $fee->max_amount }}" class="flex-1 p-2 rounded bg-zinc-800 border border-gray-600 text-white">
                                <input type="number" name="fee[]" placeholder="Fee %" step="0.01" value="{{ $fee->fee_percentage }}" class="flex-1 p-2 rounded bg-zinc-800 border border-gray-600 text-white">
                            </div>
                        @endforeach
                    </div>

                    <div class="flex justify-between items-center">
                        <button type="button" onclick="addFeeTier()" class="my-2 bg-crypto-primary text-black px-4 py-1 rounded">
                            + Add Fee Tier
                        </button>

                        {{-- Always show the Save button --}}
                        <button type="submit" class="my-2 submit-btn bg-crypto-primary text-black px-4 py-1 rounded hover:bg-crypto-primary/90 duration-100">
                            Save
                        </button>
                    </div>

                    <h3 class="text-lg font-medium text-white mb-2">Funding History (coming soon)</h3>
                    <ul class="text-sm text-gray-300">📈 Soon we’ll show all APR intervals here.</ul>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- JS Section --}}
<script>
    function addFeeTier() {
        const html = `
            <div class="flex gap-3 fee-input">
                <input type="number" name="min_amount[]" placeholder="Min $" step="1"
                    class="flex-1 p-2 rounded bg-zinc-800 border border-gray-600 text-white">
                <input type="number" name="max_amount[]" placeholder="Max $" step="1"
                    class="flex-1 p-2 rounded bg-zinc-800 border border-gray-600 text-white">
                <input type="number" name="fee[]" placeholder="Fee %" step="0.01"
                    class="flex-1 p-2 rounded bg-zinc-800 border border-gray-600 text-white">
            </div>`;
        document.getElementById('fee-tiers').insertAdjacentHTML('beforeend', html);

        // Just in case it was hidden for any reason
        document.querySelector('.submit-btn').classList.remove('hidden');
    }
</script>
@endsection
