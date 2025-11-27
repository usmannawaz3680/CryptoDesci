@extends('web.layout.app')
@section('title', 'Assets - User Dashboard')

@section('sidebar')
    {{-- @include('web.pages.UserDashboard.partials.sidebar') --}}
    @include('components.user-sidebar')
@endsection

@section('content')
    <div class="container mx-auto px-5 md:p-6 max-w-6xl mt-50 md:mt-10 mb-10 text-gray-100">
        <div class="content-area page-transition">

            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold mb-2 text-white">My Assets</h1>
                <p class="text-gray-400">View your cryptocurrency portfolio</p>
            </div>

            <!-- Total Balance Card -->
            <div class="bg-crypto-accent border border-neutral-800 rounded-xl px-6 py-6 mb-6 flex flex-col items-center justify-center shadow-md">
                <div class="text-sm text-gray-400 mb-2">Estimated Total Balance</div>
                <div class="text-4xl font-bold text-white">
                    $
                    <span id="total-balance">
                        {{ number_format($wallets->sum('balance'), 3) }}
                    </span>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="mb-6">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="fas fa-search text-gray-500 text-sm"></i>
                    </div>
                    <input type="text" id="asset-search" class="w-full pl-10 pr-4 py-3 rounded-lg bg-neutral-900 border border-neutral-700 text-gray-100 placeholder-gray-500 focus:outline-none focus:border-crypto-primary focus:ring-1 focus:ring-crypto-primary"
                        placeholder="Search by asset name or symbol...">
                </div>
            </div>

            <!-- Assets Table -->
            <div class="bg-crypto-accent border border-neutral-800 rounded-xl overflow-x-auto shadow-md">
                <table class="min-w-full text-sm">
                    <thead class="bg-neutral-900/60">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-400 border-b border-neutral-800">
                                Asset
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-400 border-b border-neutral-800">
                                Balance
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-400 border-b border-neutral-800">
                                Value (USD)
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-400 border-b border-neutral-800">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody id="assets-table-body">
                        @foreach ($assets as $asset)
                            <tr class="asset-row border-b border-neutral-800 hover:bg-neutral-900/60 transition-colors">
                                <td class="px-4 py-4 align-middle" data-label="Asset">
                                    <div class="flex items-center space-x-3">
                                        <div>
                                            <div class="font-semibold text-crypto-primary">
                                                {{ $asset->symbol }}
                                            </div>
                                            <div class="text-xs text-gray-400">
                                                {{ $asset->name }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 align-middle text-sm text-gray-100" data-label="Balance">
                                    {{ number_format($wallets->where('asset_coin_id', $asset->id)->sum('balance'), 8) }}
                                    <span class="text-xs text-gray-400 ml-1">{{ $asset->symbol }}</span>
                                </td>
                                <td class="px-4 py-4 align-middle text-sm text-gray-100" data-label="Value (USD)">
                                    $ {{ number_format($wallets->where('asset_coin_id', $asset->id)->sum('balance'), 2) }}
                                </td>
                                <td class="px-4 py-4 align-middle" data-label="Actions">
                                    <div class="flex flex-wrap gap-2">
                                        <button onclick="location.href='{{ route('deposit') }}'" class="inline-flex items-center justify-center px-4 py-2 rounded-md text-xs bg-crypto-primary hover:bg-crypto-primary/80 text-crypto-accent transition-colors">
                                            Deposit
                                        </button>
                                        <a href="{{ route('user.withdrawls') }}" class="inline-flex items-center justify-center px-4 py-2 rounded-md text-xs font-medium bg-rose-500 hover:bg-rose-600 text-white transition-colors">
                                            Withdraw
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div id="no-results" class="text-center text-gray-400 py-8 hidden">
                    No assets found matching your search.
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('asset-search');
            const tableBody = document.getElementById('assets-table-body');
            const noResultsMessage = document.getElementById('no-results');
            const assetRows = Array.from(tableBody.getElementsByClassName('asset-row'));

            function calculateTotalBalance() {
                let total = 0;
                assetRows.forEach(row => {
                    const usdValueText = row.querySelector('td[data-label="Value (USD)"]').textContent;
                    const usdValue = parseFloat(
                        usdValueText.replace('$', '').replace(',', '')
                    );
                    if (!isNaN(usdValue)) {
                        total += usdValue;
                    }
                });
                const totalElement = document.getElementById('total-balance');
                if (totalElement) {
                    totalElement.textContent = total.toLocaleString('en-US', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    });
                }
            }

            function filterAssets() {
                const searchTerm = searchInput.value.toLowerCase();
                let visibleRows = 0;

                assetRows.forEach(row => {
                    const symbol = row.querySelector('.font-semibold').textContent.toLowerCase();
                    const name = row.querySelector('.text-xs.text-gray-400').textContent.toLowerCase();

                    if (symbol.includes(searchTerm) || name.includes(searchTerm)) {
                        row.classList.remove('hidden');
                        visibleRows++;
                    } else {
                        row.classList.add('hidden');
                    }
                });

                if (visibleRows === 0) {
                    noResultsMessage.classList.remove('hidden');
                } else {
                    noResultsMessage.classList.add('hidden');
                }

                calculateTotalBalance();
            }

            searchInput.addEventListener('keyup', filterAssets);

            // Initial calculation of total balance
            calculateTotalBalance();
        });
    </script>
@endpush
