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
                @if ($existingRanges->count() > 0)
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
                            @foreach ($existingRanges as $range)
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

                    @if ($existingRanges->count() > 0)
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
                <!-- Trader Packages Configuration -->
                <div class="mt-10">
                    <h3 class="text-xl font-semibold mb-3 text-crypto-primary">Subscription Packages for this Trader</h3>
                    <p class="text-gray-400 mb-4 text-sm">
                        Select which global packages this trader offers and configure the loss day and loss range for each.
                    </p>

                    @if (session('success'))
                        <div class="mb-4 text-sm text-emerald-300">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-4 text-sm text-red-400">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    {{-- Existing trader packages --}}
                    @if (isset($traderPackages) && $traderPackages->count())
                        <div class="bg-zinc-800 rounded-lg p-4 border border-gray-700 mb-6">
                            <div class="grid grid-cols-7 gap-4 mb-2 font-medium text-sm">
                                <div>Package</div>
                                <div>Duration</div>
                                <div>Loss Day</div>
                                <div>Min Loss %</div>
                                <div>Max Loss %</div>
                                <div>Status</div>
                                <div>Actions</div>
                            </div>

                            @foreach ($traderPackages as $tp)
                                <div class="grid grid-cols-7 gap-4 py-2 border-t border-gray-700 text-sm items-center">
                                    <div>{{ $tp->copyTradingPackage->name }}</div>
                                    <div>{{ $tp->copyTradingPackage->duration_days }} days</div>
                                    <div>Day {{ $tp->loss_day }}</div>
                                    <div>{{ $tp->min_loss_percentage }}%</div>
                                    <div>{{ $tp->max_loss_percentage }}%</div>
                                    <div>
                                        @if ($tp->is_active)
                                            <span class="px-2 py-1 text-xs rounded bg-emerald-700/40 text-emerald-300">Active</span>
                                        @else
                                            <span class="px-2 py-1 text-xs rounded bg-gray-700 text-gray-300">Inactive</span>
                                        @endif
                                    </div>
                                    <div>
                                        <form action="{{ route('admin.copy-traders.packages.destroy', [$copyTrader->id, $tp->id]) }}" method="POST" onsubmit="return confirm('Remove this package from trader?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-400 hover:text-red-300 text-xs">
                                                Remove
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    {{-- Add new trader package --}}
                    <form action="{{ route('admin.copy-traders.packages.store', $copyTrader->id) }}" method="POST" class="space-y-4">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-5 gap-4 items-end">
                            <div>
                                <label class="block mb-1 text-sm font-medium text-white">Global Package</label>
                                <select name="copy_trading_package_id" id="copy_trading_package_id" class="bg-zinc-900 border border-gray-700 rounded-lg px-3 py-2 text-sm w-full text-white">
                                    <option value="">Select package</option>
                                    @foreach ($globalPackages as $pkg)
                                        <option value="{{ $pkg->id }}" data-duration="{{ $pkg->duration_days }}">
                                            {{ $pkg->name }} ({{ $pkg->duration_days }} days)
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block mb-1 text-sm font-medium text-white">
                                    Loss Day <span id="loss-day-hint" class="text-xs text-gray-400"></span>
                                </label>
                                <input type="number" name="loss_day" id="loss_day" min="1" class="bg-zinc-900 border border-gray-700 rounded-lg px-3 py-2 text-sm w-full text-white">
                            </div>

                            <div>
                                <label class="block mb-1 text-sm font-medium text-white">Min Loss %</label>
                                <input type="number" step="0.01" name="min_loss_percentage" class="bg-zinc-900 border border-gray-700 rounded-lg px-3 py-2 text-sm w-full text-white">
                            </div>

                            <div>
                                <label class="block mb-1 text-sm font-medium text-white">Max Loss %</label>
                                <input type="number" step="0.01" name="max_loss_percentage" class="bg-zinc-900 border border-gray-700 rounded-lg px-3 py-2 text-sm w-full text-white">
                            </div>

                            <div>
                                <label class="block mb-1 text-sm font-medium text-white">Active</label>
                                <input type="checkbox" name="is_active" value="1" checked class="bg-zinc-800 rounded border-gray-600">
                            </div>
                        </div>

                        <button type="submit" class="bg-crypto-primary text-black font-medium py-2 px-6 rounded hover:brightness-110 transition">
                            Add / Update Package for Trader
                        </button>
                    </form>
                </div>

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
            // Show allowed loss day range for selected package
            const pkgSelect = document.getElementById('copy_trading_package_id');
            const lossDayInput = document.getElementById('loss_day');
            const lossDayHint = document.getElementById('loss-day-hint');

            function updateLossDayHint() {
                if (!pkgSelect) return;

                const selected = pkgSelect.options[pkgSelect.selectedIndex];
                const duration = selected ? selected.getAttribute('data-duration') : null;

                if (duration) {
                    lossDayInput.max = duration;
                    lossDayHint.textContent = `(1 - ${duration})`;
                } else {
                    lossDayInput.removeAttribute('max');
                    lossDayHint.textContent = '';
                }
            }

            if (pkgSelect) {
                pkgSelect.addEventListener('change', updateLossDayHint);
                updateLossDayHint();
            }

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
