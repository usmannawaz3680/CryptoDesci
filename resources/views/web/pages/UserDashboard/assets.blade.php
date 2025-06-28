@extends('web.layout.app')
@section('title', 'Assets - User Dashboard')

@section('sidebar')
    {{-- @include('web.pages.UserDashboard.partials.sidebar') --}}
    @include('components.user-sidebar')
@endsection
@push('style')
    <style>
        :root {
            --binance-yellow: #F0B90B;
            --binance-dark: #0B0E11;
            --binance-gray: #1E2329;
            --binance-light-gray: #2B3139;
            --binance-text: #EAECEF;
            --binance-text-secondary: #848E9C;
            --binance-green: #0ECB81;
            --binance-red: #F6465D;
        }

        .binance-card {
            background-color: var(--binance-gray);
            border: 1px solid var(--binance-light-gray);
            border-radius: 8px;
        }

        .binance-input {
            background-color: var(--binance-light-gray);
            border: 1px solid #3C4043;
            color: var(--binance-text);
        }

        .binance-input:focus {
            border-color: var(--binance-yellow);
            box-shadow: 0 0 0 1px var(--binance-yellow);
        }

        .binance-btn-primary {
            background-color: var(--binance-yellow);
            color: var(--binance-dark);
            font-weight: 600;
        }

        .binance-btn-primary:hover {
            background-color: #D4A017;
        }

        .binance-btn-secondary {
            background-color: transparent;
            border: 1px solid var(--binance-light-gray);
            color: var(--binance-text);
        }

        .binance-btn-secondary:hover {
            background-color: var(--binance-light-gray);
        }

        .binance-table {
            width: 100%;
            border-collapse: collapse;
        }

        .binance-table th, .binance-table td {
            padding: 16px;
            text-align: left;
            border-bottom: 1px solid var(--binance-light-gray);
        }

        .binance-table th {
            color: var(--binance-text-secondary);
            font-size: 0.875rem; /* text-sm */
            font-weight: 500;
            text-transform: uppercase;
        }

        .binance-table tbody tr:hover {
            background-color: var(--binance-light-gray);
        }

        .asset-symbol {
            font-weight: 600;
            color: var(--binance-yellow);
        }

        .asset-name {
            color: var(--binance-text-secondary);
            font-size: 0.875rem; /* text-sm */
        }

        .action-button {
            padding: 8px 16px;
            border-radius: 4px;
            font-size: 0.875rem; /* text-sm */
            font-weight: 500;
            transition: background-color 0.2s ease;
        }

        .action-button.deposit {
            background-color: var(--binance-green);
            color: white;
        }
        .action-button.deposit:hover {
            background-color: #09A86A;
        }

        .action-button.withdraw {
            background-color: var(--binance-red);
            color: white;
        }
        .action-button.withdraw:hover {
            background-color: #D13C4E;
        }

        .total-balance-card {
            background-color: var(--binance-gray);
            border: 1px solid var(--binance-light-gray);
            border-radius: 8px;
            padding: 24px;
            margin-bottom: 24px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .total-balance-card .label {
            color: var(--binance-text-secondary);
            font-size: 0.875rem;
            margin-bottom: 8px;
        }

        .total-balance-card .value {
            font-size: 2.5rem; /* text-4xl */
            font-weight: 700;
            color: var(--binance-text);
        }

        @media (max-width: 768px) {
            .binance-table thead {
                display: none; /* Hide table headers on small screens */
            }

            .binance-table, .binance-table tbody, .binance-table tr, .binance-table td {
                display: block;
                width: 100%;
            }

            .binance-table tr {
                margin-bottom: 16px;
                border: 1px solid var(--binance-light-gray);
                border-radius: 8px;
            }

            .binance-table td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            .binance-table td::before {
                content: attr(data-label);
                position: absolute;
                left: 16px;
                width: calc(50% - 32px);
                text-align: left;
                font-weight: 500;
                color: var(--binance-text-secondary);
            }

            .binance-table td:first-child {
                border-top-left-radius: 8px;
                border-top-right-radius: 8px;
            }
            .binance-table td:last-child {
                border-bottom-left-radius: 8px;
                border-bottom-right-radius: 8px;
                border-bottom: none;
            }
        }
    </style>
@endpush
@section('content')
        <div class="container mx-auto px-5 max-w-6xl my-10">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold mb-2">My Assets</h1>
            <p class="text-gray-400">View your cryptocurrency portfolio</p>
        </div>

        <!-- Total Balance Card -->
        <div class="total-balance-card">
            <div class="label">Estimated Total Balance</div>
            <div class="value">$ <span>{{ number_format($wallets->sum('balance'), 3) }}</span></div>
        </div>

        <!-- Search Bar -->
        <div class="mb-6">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text" id="asset-search" class="binance-input w-full pl-10 pr-4 py-3 rounded-lg focus:outline-none" placeholder="Search by asset name or symbol...">
            </div>
        </div>

        <!-- Assets Table -->
        <div class="binance-card overflow-x-auto">
            <table class="binance-table">
                <thead>
                    <tr>
                        <th>Asset</th>
                        <th>Balance</th>
                        <th>Value (USD)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="assets-table-body">
                    @foreach ($assets as $asset)
                        <tr class="asset-row">
                            <td data-label="Asset">
                                <div class="flex items-center">
                                    {{-- <img src="{{ $as" alt="{{ $asset['symbol'] }} icon" class="w-6 h-6 mr-3 rounded-full"> --}}
                                    <div>
                                        <div class="asset-symbol">{{ $asset->symbold }}</div>
                                        <div class="asset-name">{{ $asset->name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Balance">{{ number_format($asset->balance, 8) }} {{ $asset->symbol }}</td>
                            <td data-label="Value (USD)">$ {{ number_format($asset['usd_value'], 2) }}</td>
                            <td data-label="Actions">
                                <div class="flex space-x-2">
                                    <button class="action-button deposit">Deposit</button>
                                    <button class="action-button withdraw">Withdraw</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div id="no-results" class="text-center text-gray-400 py-8 hidden">No assets found matching your search.</div>
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
                    const usdValue = parseFloat(usdValueText.replace('$', '').replace(',', ''));
                    if (!isNaN(usdValue)) {
                        total += usdValue;
                    }
                });
                document.getElementById('total-balance').textContent = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            }

            function filterAssets() {
                const searchTerm = searchInput.value.toLowerCase();
                let visibleRows = 0;

                assetRows.forEach(row => {
                    const symbol = row.querySelector('.asset-symbol').textContent.toLowerCase();
                    const name = row.querySelector('.asset-name').textContent.toLowerCase();

                    if (symbol.includes(searchTerm) || name.includes(searchTerm)) {
                        row.style.display = '';
                        visibleRows++;
                    } else {
                        row.style.display = 'none';
                    }
                });

                if (visibleRows === 0) {
                    noResultsMessage.classList.remove('hidden');
                } else {
                    noResultsMessage.classList.add('hidden');
                }
            }

            searchInput.addEventListener('keyup', filterAssets);

            // Initial calculation of total balance
            calculateTotalBalance();
        });
    </script>
@endPush
