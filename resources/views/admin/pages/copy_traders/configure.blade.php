@extends('admin.layout.app')

@section('sidebar')
    @include('admin.layout.partials.sidebar')
@endsection

@section('content')
<div class="w-full overflow-x-hidden custom-scrollbar">
    <div class="content-area page-transition m-4 md:m-6">
        <div class="p-4 md:p-6 bg-crypto-accent rounded-xl text-white">
            <h2 class="text-2xl font-semibold mb-4 text-crypto-primary">Configure Copy Trader: {{ $copyTrader->name }}</h2>
            <p class="text-crypto-primary">Profit and Fees configuration</p>
            
            <!-- Existing Fee Ranges -->
            @if($existingRanges->count() > 0)
            <div class="mb-6">
                <h3 class="text-xl font-semibold mb-3 text-crypto-primary">Existing Fee Ranges</h3>
                <div class="bg-zinc-800 rounded-lg p-4 border border-gray-700">
                    <div class="grid grid-cols-6 gap-4 mb-2 font-medium items-center min-h-23">
                        <div>Min Amount</div>
                        <div>Max Amount</div>
                        <div>Fee %</div>
                        <div>Min Profit %</div>
                        <div>Max Profit %</div>
                        <div>Actions</div>
                    </div>
                    @foreach($existingRanges as $range)
                    <div class="grid grid-cols-6 gap-4 py-2 border-t border-gray-700">
                        <div>${{ number_format($range->min_amount, 2) }}</div>
                        <div>${{ number_format($range->max_amount, 2) }}</div>
                        <div>{{ $range->fee_percentage }}%</div>
                        <div>{{ $range->min_profit_percentage }}%</div>
                        <div>{{ $range->max_profit_percentage }}%</div>
                        <div>
                            <form action="{{ route('admin.copy-traders.delete-fee-profit-range', $range->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white p-1.5 rounded hover:bg-red-700 transition" onclick="return confirm('Are you sure you want to delete this range?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            
            <form action="{{ route('admin.copy-traders.store-fee-profit-range', $copyTrader->id) }}" method="POST">
                @csrf

                <!-- Dynamic Range Fields -->
                <div id="ranges">
                    <div class="range-row mb-4">
                        <div class="grid grid-cols-6 gap-4 items-center">
                            <div>
                                <label class="block mb-1 text-sm font-medium text-white">Min Amount</label>
                                <input type="number" step="0.01" name="ranges[0][min_amount]" required class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                            </div>
                            <div>
                                <label class="block mb-1 text-sm font-medium text-white">Max Amount</label>
                                <input type="number" step="0.01" name="ranges[0][max_amount]" required class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                            </div>
                            <div>
                                <label class="block mb-1 text-sm font-medium text-white">Fee Percentage (%)</label>
                                <input type="number" step="0.01" name="ranges[0][fee_percentage]" required class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                            </div>
                            <div>
                                <label class="block mb-1 text-sm font-medium text-white">Min Profit Percentage (%)</label>
                                <input type="number" step="0.01" name="ranges[0][min_profit_percentage]" required class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                            </div>
                            <div>
                                <label class="block mb-1 text-sm font-medium text-white">Max Profit Percentage (%)</label>
                                <input type="number" step="0.01" name="ranges[0][max_profit_percentage]" required class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                            </div>
                            <div class="flex items-end">
                                <button type="button" class="remove-range bg-red-600 text-white p-2.5 rounded-lg hover:bg-red-700 transition w-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add More Range Button -->
                <button type="button" id="addRange" class="mb-4 bg-crypto-primary text-black font-medium py-2 px-4 rounded hover:brightness-110 transition">
                    Add Another Range
                </button>

                @if($existingRanges->count() > 0)
                <div class="mb-4">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="keep_existing" class="form-checkbox h-5 w-5 text-crypto-primary bg-zinc-800 border-gray-600 rounded focus:ring-crypto-primary">
                        <span class="ml-2 text-white">Keep existing ranges (unchecked will replace all existing ranges)</span>
                    </label>
                </div>
                @endif

                <!-- Submit -->
                <div class="text-end">
                    <button type="submit" class="bg-crypto-primary text-black font-medium py-2 px-6 rounded hover:brightness-110 transition">
                        Save Ranges
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const rangesContainer = document.getElementById('ranges');
        const addRangeButton = document.getElementById('addRange');
        let rangeCount = 1;
        
        // Add new range row
        addRangeButton.addEventListener('click', function() {
            const newRow = document.createElement('div');
            newRow.className = 'range-row mb-4';
            newRow.innerHTML = `
                <div class="grid grid-cols-6 gap-4">
                    <div>
                        <label class="block mb-1 text-sm font-medium text-white">Min Amount</label>
                        <input type="number" step="0.01" name="ranges[${rangeCount}][min_amount]" required class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                    </div>
                    <div>
                        <label class="block mb-1 text-sm font-medium text-white">Max Amount</label>
                        <input type="number" step="0.01" name="ranges[${rangeCount}][max_amount]" required class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                    </div>
                    <div>
                        <label class="block mb-1 text-sm font-medium text-white">Fee Percentage (%)</label>
                        <input type="number" step="0.01" name="ranges[${rangeCount}][fee_percentage]" required class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                    </div>
                    <div>
                        <label class="block mb-1 text-sm font-medium text-white">Min Profit Percentage (%)</label>
                        <input type="number" step="0.01" name="ranges[${rangeCount}][min_profit_percentage]" required class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                    </div>
                    <div>
                        <label class="block mb-1 text-sm font-medium text-white">Max Profit Percentage (%)</label>
                        <input type="number" step="0.01" name="ranges[${rangeCount}][max_profit_percentage]" required class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                    </div>
                    <div class="flex items-end">
                        <button type="button" class="remove-range bg-red-600 text-white p-2.5 rounded-lg hover:bg-red-700 transition w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            `;
            rangesContainer.appendChild(newRow);
            rangeCount++;
            
            // Add event listener to the new remove button
            const removeButtons = document.querySelectorAll('.remove-range');
            removeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    this.closest('.range-row').remove();
                });
            });
        });
        
        // Initial remove button functionality
        document.querySelectorAll('.remove-range').forEach(button => {
            button.addEventListener('click', function() {
                // Don't remove if it's the last row
                if (document.querySelectorAll('.range-row').length > 1) {
                    this.closest('.range-row').remove();
                }
            });
        });
    });
</script>
@endsection