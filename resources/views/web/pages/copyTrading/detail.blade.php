@extends('web.layout.app')
@section('title', 'Copy Trader | ' . $trader->username)
@section('content')
<div class="container mx-auto px-4 py-6 mb-20 max-w-7xl">
    <div class="mb-6">
        <div class="flex items-center gap-4 mb-4">
            <div class="flex bg-crypto-accent rounded-lg p-1">
                <h4 class="px-4 py-2 rounded-md font-medium">Spot Copy</h4>
                <button class="px-4 py-2 bg-crypto-primary rounded-md font-medium text-black hover:text-white">{{ $trader->status === 'public' ? 'Public' : 'Private' }}</button>
            </div>
            <div class="ml-auto flex items-center gap-3">
                <div class="flex items-center gap-1 text-sm">
                    <svg class="w-4 h-4 text-crypto-primary" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <span class="text-white">{{ $trader->followers }}</span>
                </div>
                <div class="relative group">
                    <button class="p-2 bg-crypto-accent rounded-lg hover:bg-gray-700 focus:outline-none">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"/>
                        </svg>
                    </button>
                    <div class="absolute right-0 w-40 overflow-hidden bg-crypto-accent rounded-lg shadow-lg z-10 hidden group-hover:block">
                        <a href="https://wa.me/?text={{ urlencode(request()->fullUrl()) }}" target="_blank" class="flex items-center gap-2 px-4 py-2 text-sm text-white hover:bg-gray-700">
                            <i class="fab fa-whatsapp"></i>
                            Share to WhatsApp
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="flex items-center gap-2 px-4 py-2 text-sm text-white hover:bg-gray-700">
                            <i class="fab fa-facebook"></i>
                            Share to Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}" target="_blank" class="flex items-center gap-2 px-4 py-2 text-sm text-white hover:bg-gray-700">
                            <i class="fab fa-twitter"></i>
                            Share to Twitter
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Trader Profile Section -->
    <div class="bg-crypto-accent border border-gray-600 rounded-lg p-6 mb-6">
        <div class="flex items-start justify-between">
            <div class="flex items-start gap-4">
                <div class="relative">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center">
                        <span class="text-white font-bold uppercase">{{ Str::limit($trader->name, 1, '') }}</span>
                    </div>
                    <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-crypto-primary rounded-full flex items-center justify-center">
                        <svg class="w-3 h-3 text-black" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
                <div>
                    <h2 class="text-xl font-semibold text-white mb-2">{{ $trader->name }}</h2>
                    <p class="text-gray-300 text-sm mb-3 max-w-2xl">{{ $trader->bio ?? 'No bio available' }}</p>
                    @foreach ($trader->badges as $key => $badge)
                        @if ($badge)
                            <div class="inline-block bg-red-600 text-white px-2 py-1 rounded text-xs font-medium mb-4">
                                {{ ucwords(str_replace('_', ' ', $key)) }}
                            </div>
                        @endif
                    @endforeach
                    <div class="flex items-center gap-6 text-sm">
                        <div class="flex items-center gap-2">
                            <span class="text-gray-400">Days Trading</span>
                            <span class="text-white font-medium">{{ $trader->member_since ? now()->diffInDays($trader->member_since) : 'N/A' }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-gray-400">Copiers</span>
                            <span class="text-red-400 font-medium">{{ $trader->copiers }}/{{ $trader->max_copy_amount }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-gray-400">Total Copiers</span>
                            <span class="text-white font-medium">{{ $trader->copiers }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-gray-400">Mock Copiers</span>
                            <span class="text-white font-medium">{{ $trader->copiers * 0.67 }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-gray-400">Closed Portfolios</span>
                            <span class="text-white font-medium">0</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center justify-center h-full gap-3">
                <a href="{{ route('web.copytrading.create', $trader->username) }}" class="px-6 py-2 bg-crypto-primary text-black rounded-lg hover:bg-crypto-primary/80 font-medium">Copy Trader</a>
                {{-- <button class="px-6 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-600 font-medium">Compare</button> --}}
            </div>
        </div>
    </div>

    <!-- Performance and Chart Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <!-- Performance Stats -->
        <div class="bg-crypto-accent border border-gray-600 rounded-lg p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-white">Performance</h3>
                <div class="flex bg-crypto-accent rounded-lg p-1">
                    <button class="px-3 py-1 text-xs bg-crypto-primary text-crypto-accent rounded">30 Days</button>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-400 text-sm">ROI</span>
                        <span class="text-crypto-primary font-medium">{{ number_format($trader->roi, 2) }}%</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-400 text-sm">Copier PnL</span>
                        <span class="text-crypto-primary font-medium">{{ number_format($trader->pnl, 2) }} USDT</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-400 text-sm">Sharpe Ratio</span>
                        <span class="text-white font-medium">{{ number_format($trader->sharp_ratio, 2) }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-400 text-sm">MDD</span>
                        <span class="text-white font-medium">{{ number_format($trader->mdd, 2) }}%</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-400 text-sm">Win Rate</span>
                        <span class="text-white font-medium">{{ number_format($trader->win_rate, 2) }}%</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-400 text-sm">Win Positions</span>
                        <span class="text-white font-medium">{{ $trader->win_trades }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-400 text-sm">Total Positions</span>
                        <span class="text-white font-medium">{{ $trader->trades }}</span>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-400 text-sm">PnL</span>
                        <span class="text-crypto-primary font-medium">{{ number_format($trader->pnl, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Performance Chart -->
        <div class="bg-crypto-accent border border-gray-600 rounded-lg p-6">
            <div class="flex items-center justify-between mb-6">
                <div class="flex bg-crypto-accent rounded-lg p-1">
                    <button id="roiButton" class="px-3 py-1 text-xs bg-crypto-primary text-crypto-accent rounded" onclick="showChart('roi')">ROI</button>
                    <button id="pnlButton" class="px-3 py-1 text-xs text-gray-400 rounded hover:text-white" onclick="showChart('pnl')">PnL</button>
                </div>
                <div class="flex bg-crypto-accent rounded-lg p-1">
                    <button class="px-3 py-1 text-xs bg-crypto-primary text-crypto-accent rounded">30 Days</button>
                </div>
            </div>
            <div class="h-64">
                <canvas id="performanceChart" class="w-full h-full"></canvas>
            </div>
        </div>
    </div>

    <!-- Lead Trader Overview and Asset Preferences -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <!-- Lead Trader Overview -->
        <div class="bg-crypto-accent border border-gray-600 rounded-lg p-6">
            <h3 class="text-lg font-semibold text-white mb-6">Lead Trader Overview</h3>
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <span class="text-gray-400 text-sm">AUM</span>
                    <span class="text-white font-medium">{{ number_format($trader->total_aum, 2) }} USDT</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-gray-400 text-sm">Profit Sharing</span>
                    <span class="text-white font-medium">{{ number_format($trader->profit_sharing, 2) }}%</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-gray-400 text-sm">Leading Margin Balance</span>
                    <span class="text-white font-medium">{{ number_format($trader->lead_balance, 2) }} USDT</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-gray-400 text-sm">Lock-up period</span>
                    <span class="text-white font-medium">7 Days</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-gray-400 text-sm">Minimum Copy Amount</span>
                    <span class="text-white font-medium">{{ number_format($trader->min_copy_amount, 2) }}/{{ number_format($trader->max_copy_amount, 2) }} USDT</span>
                </div>
            </div>
        </div>

        <!-- Asset Preferences -->
        <div class="bg-crypto-accent border border-gray-600 rounded-lg p-6">
            <h3 class="text-lg font-semibold text-white mb-6">Asset Preferences</h3>
            <div class="md:flex gap-10 items-center grow justify-center mx-auto px-3">
                <div class="h-44 mb-4">
                    <canvas id="assetChart" class="w-full h-full"></canvas>
                </div>
                <div class="space-y-4 grow">
                    @foreach ($trader->asset_preferences as $asset => $percentage)
                        <div class="flex gap-5 justify-between items-center">
                            <span class="text-gray-400 text-sm">{{ $asset }}</span>
                            <span class="text-white font-medium">{{ number_format($percentage, 2) }}%</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Tabs -->
    <div class="bg-crypto-accent border border-gray-600 rounded-lg">
        <div class="flex border-b border-gray-700">
            <button class="px-6 py-4 text-white border-b-2 border-crypto-primary font-medium" onclick="showTab('positions')">Positions</button>
            <button class="px-6 py-4 text-gray-400 hover:text-white" onclick="showTab('positionHistory')">Position History</button>
            <button class="px-6 py-4 text-gray-400 hover:text-white" onclick="showTab('latestRecords')">Latest Records</button>
            <button class="px-6 py-4 text-gray-400 hover:text-white" onclick="showTab('transferHistory')">Transfer History</button>
            <button class="px-6 py-4 text-gray-400 hover:text-white" onclick="showTab('copyTraders')">Copy Traders</button>
        </div>
        <div class="p-8">
            <!-- Positions Tab (default, empty) -->
            <div id="tab-positions">
                <div class="w-16 h-16 mx-auto mb-4 opacity-30">
                    <svg viewBox="0 0 64 64" fill="currentColor" class="w-full h-full text-gray-600">
                        <path d="M32 8C18.745 8 8 18.745 8 32s10.745 24 24 24 24-10.745 24-24S45.255 8 32 8zm0 44c-11.028 0-20-8.972-20-20s8.972-20 20-20 20 8.972 20 20-8.972 20-20 20z"/>
                        <path d="M32 16c-8.837 0-16 7.163-16 16s7.163 16 16 16 16-7.163 16-16-7.163-16-16-16zm0 28c-6.627 0-12-5.373-12-12s5.373-12 12-12 12 5.373 12 12-5.373 12-12 12z"/>
                    </svg>
                </div>
            </div>
            <!-- Position History Tab -->
            <div id="tab-positionHistory" style="display:none;">
                @foreach($positionHistory as $position)
                    <div class="mb-4 p-4 bg-crypto-accent rounded-lg">
                        <div class="flex justify-between">
                            <div>
                                <span class="font-bold text-white">{{ $position['symbol'] }}</span>
                                <span class="text-crypto-primary ml-2">{{ $position['side'] }}</span>
                                <span class="text-gray-400 ml-2">{{ $position['status'] }}</span>
                            </div>
                            <div>
                                <span class="text-gray-400">Opened: {{ $position['opened'] }}</span>
                                <span class="text-gray-400 ml-2">Closed: {{ $position['closed_at'] }}</span>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-4 mt-2">
                            <span class="text-gray-400">Entry Price: {{ $position['entry_price'] }}</span>
                            <span class="text-gray-400">Avg Close Price: {{ $position['avg_close_price'] }}</span>
                            <span class="text-gray-400">Max Open Interest: {{ $position['max_open_interest'] }}</span>
                            <span class="text-gray-400">Closed Vol: {{ $position['closed_vol'] }}</span>
                            <span class="text-{{ Str::startsWith($position['closing_pnl'], '-') ? 'red' : 'green' }}-400">Closing PNL: {{ $position['closing_pnl'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Latest Records Tab -->
            <div id="tab-latestRecords" style="display:none;">
                <table class="w-full text-left bg-crypto-accent rounded-lg">
                    <thead>
                        <tr class="text-gray-400">
                            <th class="px-4 py-2">Date</th>
                            <th class="px-4 py-2">Action</th>
                            <th class="px-4 py-2">Details</th>
                            <th class="px-4 py-2">PNL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($latestRecords as $record)
                            <tr class="border-b border-gray-700">
                                <td class="px-4 py-2 text-white">{{ $record['date'] }}</td>
                                <td class="px-4 py-2 text-white">{{ $record['action'] }}</td>
                                <td class="px-4 py-2 text-white">{{ $record['details'] }}</td>
                                <td class="px-4 py-2 text-{{ Str::startsWith($record['pnl'], '-') ? 'red' : 'green' }}-400">{{ $record['pnl'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Transfer History Tab -->
            <div id="tab-transferHistory" style="display:none;">
                <table class="w-full text-left bg-crypto-accent rounded-lg">
                    <thead>
                        <tr class="text-gray-400">
                            <th class="px-4 py-2">Time</th>
                            <th class="px-4 py-2">Coin</th>
                            <th class="px-4 py-2">Amount</th>
                            <th class="px-4 py-2">From</th>
                            <th class="px-4 py-2">To</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transferHistory as $transfer)
                            <tr class="border-b border-gray-700">
                                <td class="px-4 py-2 text-white">{{ $transfer['time'] }}</td>
                                <td class="px-4 py-2 text-white">{{ $transfer['coin'] }}</td>
                                <td class="px-4 py-2 text-white">{{ $transfer['amount'] }}</td>
                                <td class="px-4 py-2 text-white">{{ $transfer['from'] }}</td>
                                <td class="px-4 py-2 text-white">{{ $transfer['to'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Copy Traders Tab -->
            <div id="tab-copyTraders" style="display:none;">
                <table class="w-full text-left bg-crypto-accent rounded-lg">
                    <thead>
                        <tr class="text-gray-400">
                            <th class="px-4 py-2">User ID</th>
                            <th class="px-4 py-2">Copy Margin Balance</th>
                            <th class="px-4 py-2">Total PNL</th>
                            <th class="px-4 py-2">Total ROI</th>
                            <th class="px-4 py-2">Duration</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($copyTraders as $ct)
                            <tr class="border-b border-gray-700">
                                <td class="px-4 py-2 text-white">{{ $ct['user_id'] }}</td>
                                <td class="px-4 py-2 text-white">{{ $ct['margin_balance'] }}</td>
                                <td class="px-4 py-2 text-crypto-primary">{{ $ct['total_pnl'] }}</td>
                                <td class="px-4 py-2 text-crypto-primary">{{ $ct['total_roi'] }}</td>
                                <td class="px-4 py-2 text-white">{{ $ct['duration'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
    <script>
        // Tab switching logic for navigation
        function showTab(tab) {
            const tabs = ['positions', 'positionHistory', 'latestRecords', 'transferHistory', 'copyTraders'];
            tabs.forEach(function(t) {
                document.getElementById('tab-' + t).style.display = (t === tab) ? '' : 'none';
                document.querySelector(`button[onclick="showTab('${t}')"]`).classList.remove('text-white', 'border-b-2', 'border-crypto-primary');
                document.querySelector(`button[onclick="showTab('${t}')"]`).classList.add('text-gray-400', 'hover:text-white');
            });
            document.querySelector(`button[onclick="showTab('${tab}')"]`).classList.add('text-white', 'border-b-2', 'border-crypto-primary');
            document.querySelector(`button[onclick="showTab('${tab}')"]`).classList.remove('text-gray-400', 'hover:text-white');
        }
        // Show default tab
        showTab('positions');

        // Performance Chart (ROI and PnL)
        let performanceChart;
        const performanceCtx = document.getElementById('performanceChart').getContext('2d');
        const roiData = {
            labels: Array.from({length: 30}, (_, i) => i + 1),
            datasets: [{
                data: [0, 5000, 8000, 12000, 15000, 18000, 22000, 25000, 30000, 35000, 40000, 45000, 50000, 55000, 60000, 65000, 70000, 75000, 80000, 85000, 87000, 89000, 91000, 93000, 94000, 94200, 94300, 94400, 94418, 94418],
                borderColor: '#10b981',
                backgroundColor: 'rgba(16, 185, 129, 0.1)',
                borderWidth: 2,
                fill: true,
                tension: 0.4,
                pointRadius: 0,
                pointHoverRadius: 4
            }]
        };
        const pnlData = {
            labels: Array.from({length: 30}, (_, i) => i + 1),
            datasets: [{
                data: [
                    @php
                        $pnlValues = [0];
                        for ($i = 1; $i < 30; $i++) {
                            $change = rand(-5000, 10000); // Random change between -5000 and +10000
                            $pnlValues[] = $pnlValues[$i-1] + $change;
                        }
                        echo implode(',', $pnlValues);
                    @endphp
                ],
                borderColor: '#ef4444',
                backgroundColor: 'rgba(239, 68, 68, 0.1)',
                borderWidth: 2,
                fill: true,
                tension: 0.4,
                pointRadius: 0,
                pointHoverRadius: 4
            }]
        };
        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                x: {
                    display: false,
                    grid: {
                        display: false
                    }
                },
                y: {
                    display: true,
                    grid: {
                        color: 'rgba(75, 85, 99, 0.3)',
                        borderDash: [2, 2]
                    },
                    ticks: {
                        color: '#9ca3af',
                        font: {
                            size: 10
                        },
                        callback: function(value) {
                            return value >= 1000 || value <= -1000 ? (value/1000) + 'k' : value;
                        }
                    }
                }
            },
            interaction: {
                intersect: false,
                mode: 'index'
            }
        };

        // Initialize chart with ROI data
        performanceChart = new Chart(performanceCtx, {
            type: 'line',
            data: roiData,
            options: chartOptions
        });

        // Chart switching logic
        function showChart(type) {
            document.getElementById('roiButton').classList.remove('bg-crypto-primary', 'text-crypto-accent');
            document.getElementById('roiButton').classList.add('text-gray-400', 'hover:text-white');
            document.getElementById('pnlButton').classList.remove('bg-crypto-primary', 'text-crypto-accent');
            document.getElementById('pnlButton').classList.add('text-gray-400', 'hover:text-white');

            if (type === 'roi') {
                document.getElementById('roiButton').classList.add('bg-crypto-primary', 'text-crypto-accent');
                document.getElementById('roiButton').classList.remove('text-gray-400', 'hover:text-white');
                performanceChart.data = roiData;
            } else {
                document.getElementById('pnlButton').classList.add('bg-crypto-primary', 'text-crypto-accent');
                document.getElementById('pnlButton').classList.remove('text-gray-400', 'hover:text-white');
                performanceChart.data = pnlData;
            }
            performanceChart.update();
        }

        // Asset Preferences Chart
        const assetCtx = document.getElementById('assetChart').getContext('2d');
        new Chart(assetCtx, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode(array_keys($trader->asset_preferences)) !!},
                datasets: [{
                    data: {!! json_encode(array_values($trader->asset_preferences)) !!},
                    backgroundColor: {!! json_encode(array_map(function($index) {
                        $colorPalette = ['#3b82f6', '#f0bb0b', '#10b981', '#ef4444', '#8b5cf6', '#ec4899', '#f59e0b', '#84cc16'];
                        return $colorPalette[$index % count($colorPalette)];
                    }, array_keys(array_keys($trader->asset_preferences)))) !!},
                    borderWidth: 0,
                    cutout: '70%'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.label + ': ' + context.parsed + '%';
                            }
                        }
                    }
                }
            }
        });
    </script>
@endpush