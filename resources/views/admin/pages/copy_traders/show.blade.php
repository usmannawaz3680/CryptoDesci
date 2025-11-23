@extends('admin.layout.app')

@section('sidebar')
    @include('admin.layout.partials.sidebar')
@endsection

@section('content')
<div class="w-full overflow-x-hidden custom-scrollbar">
    <div class="content-area page-transition m-4 md:m-6">
        <div class="p-4 md:p-6 bg-crypto-accent rounded-xl text-white">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <h2 class="text-2xl font-semibold text-crypto-primary">{{ $copyTrader->name }}</h2>
                    @php $status = $copyTrader->status; @endphp
                    <span class="px-2 py-1 rounded text-xs {{ $status==='active' ? 'bg-green-500/20 text-green-300' : ($status==='suspended' ? 'bg-yellow-500/20 text-yellow-300' : ($status==='full' ? 'bg-blue-500/20 text-blue-300' : 'bg-zinc-700 text-zinc-300')) }}">
                        {{ ucfirst($status) }}
                    </span>
                    <span class="px-2 py-1 rounded text-xs bg-zinc-700 text-zinc-300">Risk: {{ ucfirst($copyTrader->risk_level) }}</span>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('copy-traders.edit', $copyTrader->id) }}" class="bg-crypto-primary text-black font-medium py-2 px-4 rounded hover:brightness-110 transition">Edit Profile</a>
                    <a href="{{ route('admin.copy-traders.create-fee-profit-range', $copyTrader->id) }}" class="text-crypto-primary hover:brightness-110">Configure Fee Ranges</a>
                    <a href="{{ route('admin.copytrade-subscriptions.index', ['copy_trader_id' => $copyTrader->id]) }}" class="text-crypto-primary hover:brightness-110">View Subscriptions</a>
                </div>
            </div>

            @if(session('success'))
                <div class="bg-green-500/20 border border-green-500 text-green-400 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('danger'))
                <div class="bg-red-500/20 border border-red-500 text-red-400 px-4 py-3 rounded mb-4">
                    {{ session('danger') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Overview -->
                <div class="lg:col-span-2 bg-zinc-900/50 border border-zinc-700 rounded-xl p-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-zinc-400">Username</p>
                            <p class="text-white">{{ $copyTrader->username }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-zinc-400">Email</p>
                            <p class="text-white">{{ $copyTrader->email }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-zinc-400">Level</p>
                            <p class="text-white">{{ $copyTrader->level }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-zinc-400">Trading Style</p>
                            <p class="text-white">{{ $copyTrader->trading_style ?: '—' }}</p>
                        </div>
                        <div class="md:col-span-2">
                            <p class="text-sm text-zinc-400">Bio</p>
                            <p class="text-white">{{ $copyTrader->bio ?: '—' }}</p>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4">
                        <div class="bg-zinc-800/60 rounded-lg p-3">
                            <p class="text-xs text-zinc-400">ROI</p>
                            <p class="text-lg text-white">{{ number_format($copyTrader->roi, 2) }}%</p>
                        </div>
                        <div class="bg-zinc-800/60 rounded-lg p-3">
                            <p class="text-xs text-zinc-400">PnL</p>
                            <p class="text-lg text-white">{{ number_format($copyTrader->pnl, 2) }}</p>
                        </div>
                        <div class="bg-zinc-800/60 rounded-lg p-3">
                            <p class="text-xs text-zinc-400">Total AUM</p>
                            <p class="text-lg text-white">{{ number_format($copyTrader->total_aum, 2) }}</p>
                        </div>
                        <div class="bg-zinc-800/60 rounded-lg p-3">
                            <p class="text-xs text-zinc-400">Win Rate</p>
                            <p class="text-lg text-white">{{ number_format($copyTrader->win_rate, 2) }}%</p>
                        </div>
                        <div class="bg-zinc-800/60 rounded-lg p-3">
                            <p class="text-xs text-zinc-400">Trades</p>
                            <p class="text-lg text-white">{{ number_format($copyTrader->trades) }}</p>
                        </div>
                        <div class="bg-zinc-800/60 rounded-lg p-3">
                            <p class="text-xs text-zinc-400">Win Trades</p>
                            <p class="text-lg text-white">{{ number_format($copyTrader->win_trades) }}</p>
                        </div>
                        <div class="bg-zinc-800/60 rounded-lg p-3">
                            <p class="text-xs text-zinc-400">Sharpe Ratio</p>
                            <p class="text-lg text-white">{{ number_format($copyTrader->sharp_ratio, 2) }}</p>
                        </div>
                        <div class="bg-zinc-800/60 rounded-lg p-3">
                            <p class="text-xs text-zinc-400">MDD</p>
                            <p class="text-lg text-white">{{ number_format($copyTrader->mdd, 2) }}%</p>
                        </div>
                        <div class="bg-zinc-800/60 rounded-lg p-3">
                            <p class="text-xs text-zinc-400">Profit Sharing</p>
                            <p class="text-lg text-white">{{ number_format($copyTrader->profit_sharing, 2) }}%</p>
                        </div>
                        <div class="bg-zinc-800/60 rounded-lg p-3">
                            <p class="text-xs text-zinc-400">Lead Balance</p>
                            <p class="text-lg text-white">{{ number_format($copyTrader->lead_balance, 2) }}</p>
                        </div>
                        <div class="bg-zinc-800/60 rounded-lg p-3">
                            <p class="text-xs text-zinc-400">Min Copy Amount</p>
                            <p class="text-lg text-white">{{ number_format($copyTrader->min_copy_amount, 2) }}</p>
                        </div>
                        <div class="bg-zinc-800/60 rounded-lg p-3">
                            <p class="text-xs text-zinc-400">Max Copy Amount</p>
                            <p class="text-lg text-white">{{ number_format($copyTrader->max_copy_amount, 2) }}</p>
                        </div>
                        <div class="bg-zinc-800/60 rounded-lg p-3">
                            <p class="text-xs text-zinc-400">Followers</p>
                            <p class="text-lg text-white">{{ number_format($copyTrader->followers) }}</p>
                        </div>
                        <div class="bg-zinc-800/60 rounded-lg p-3">
                            <p class="text-xs text-zinc-400">Copiers</p>
                            <p class="text-lg text-white">{{ number_format($copyTrader->copiers) }}</p>
                        </div>
                        <div class="bg-zinc-800/60 rounded-lg p-3">
                            <p class="text-xs text-zinc-400">Member Since</p>
                            <p class="text-lg text-white">{{ optional($copyTrader->member_since)->format('M d, Y H:i') }}</p>
                        </div>
                    </div>

                    @php $badges = $copyTrader->badges ?? []; @endphp
                    <div class="mt-6">
                        <p class="text-sm text-zinc-400 mb-2">Badges</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach(['top_performer' => 'Top Performer', 'trading_expert' => 'Trading Expert', 'risk_awareness' => 'Risk Awareness'] as $key => $label)
                                @if(!empty($badges[$key]))
                                    <span class="px-2 py-1 rounded text-xs bg-crypto-primary text-black">{{ $label }}</span>
                                @endif
                            @endforeach
                            @if(empty($badges))
                                <span class="text-zinc-400">—</span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Side panel: Asset preferences and Fee ranges -->
                <div class="bg-zinc-900/50 border border-zinc-700 rounded-xl p-4">
                    <p class="text-sm text-zinc-400 mb-3">Asset Preferences</p>
                    @php $assets = is_array($copyTrader->asset_preferences ?? null) ? $copyTrader->asset_preferences : []; @endphp
                    @if(!empty($assets))
                        <div class="space-y-2">
                            @foreach($assets as $symbol => $weight)
                                <div class="flex items-center justify-between">
                                    <span class="text-white">{{ $symbol }}</span>
                                    <span class="text-zinc-300">{{ number_format($weight, 2) }}%</span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-zinc-400">No asset preferences available.</p>
                    @endif

                    <hr class="my-4 border-zinc-700">

                    <p class="text-sm text-zinc-400 mb-2">Fee & Profit Ranges</p>
                    @php $ranges = $copyTrader->feeProfitRanges()->get(); @endphp
                    @if($ranges->count())
                        <div class="space-y-2">
                            @foreach($ranges as $range)
                                <div class="bg-zinc-800/60 rounded-lg p-3">
                                    <div class="text-sm text-white">Amount: {{ number_format($range->min_amount, 2) }} - {{ number_format($range->max_amount, 2) }}</div>
                                    <div class="text-xs text-zinc-300">Fee: {{ number_format($range->fee_percentage, 2) }}% | Profit %: {{ number_format($range->min_profit_percentage, 2) }} - {{ number_format($range->max_profit_percentage, 2) }}</div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-zinc-400">No fee/profit ranges configured.</p>
                    @endif

                     <hr class="my-4 border-zinc-700">

                    <p class="text-sm text-zinc-400 mb-2">Active Packages</p>
                    @php $packages = $copyTrader->availablePackages()->get(); @endphp
                    @if($packages->count())
                        <div class="space-y-2">
                            @foreach($packages as $package)
                                <div class="bg-zinc-800/60 rounded-lg p-3">
                                    <div class="text-sm text-white">{{ $package->copyTradingPackage->name }}</div>
                                    <div class="text-xs text-zinc-300">Duration: {{ $package->copyTradingPackage->duration_days }} days</div>
                                </div>
                            @endforeach
                            </div>
                    @else
                        <p class="text-zinc-400">No active packages available.</p>
                    @endif
                     

                </div>
            </div>
        </div>
    </div>
</div>
@endsection