@extends('web.layout.app')

@section('title', 'Copy Portfolio')

@section('sidebar')
    @include('components.user-sidebar')
@endsection

@section('content')
    <div class="w-full overflow-x-hidden custom-scrollbar">
        <div class="content-area page-transition m-4 md:m-6">
            {{-- Back / breadcrumb --}}
            <div class="flex items-center justify-between mb-4">
                <a href="{{ route('web.copytrading') ?? '#' }}"
                   class="flex items-center text-xs md:text-sm text-gray-400 hover:text-white">
                    <span class="mr-1">&larr;</span> Portfolios List
                </a>

                @if(session('success'))
                    <span class="text-xs md:text-sm text-emerald-300">
                    {{ session('success') }}
                </span>
                @endif
            </div>

            <div class="p-4 md:p-6 bg-crypto-accent rounded-xl text-white">
                {{-- Top summary --}}
                <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-6">
                    <div>
                        <h2 class="text-2xl md:text-3xl font-semibold mb-1">Ongoing Copy Portfolios</h2>
                        <p class="text-xs md:text-sm text-gray-400">
                            Track your active subscriptions, daily PnL and auto-invest settings.
                        </p>
                    </div>
                </div>

                {{-- Metrics row --}}
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-4 mb-6">
                    <div class="bg-zinc-900/70 border border-gray-800 rounded-xl p-3 md:p-4">
                        <p class="text-[11px] md:text-xs text-gray-400 mb-1">
                            Total Copying Balance <span class="text-[10px]">(USDT)</span>
                        </p>
                        <div class="text-xl md:text-2xl font-semibold">
                            {{ number_format($totalCopyingBalance, 4) }}
                            <span class="text-xs text-gray-400 ml-1">USDT</span>
                        </div>
                    </div>

                    <div class="bg-zinc-900/70 border border-gray-800 rounded-xl p-3 md:p-4">
                        <p class="text-[11px] md:text-xs text-gray-400 mb-1">
                            Total Realized PnL <span class="text-[10px]">(USDT)</span>
                        </p>
                        <div class="text-xl md:text-2xl font-semibold {{ $totalRealizedPnl >= 0 ? 'text-emerald-400' : 'text-red-400' }}">
                            {{ number_format($totalRealizedPnl, 4) }}
                        </div>
                    </div>

                    <div class="bg-zinc-900/70 border border-gray-800 rounded-xl p-3 md:p-4">
                        <p class="text-[11px] md:text-xs text-gray-400 mb-1">
                            Total Unrealized PnL <span class="text-[10px]">(USDT)</span>
                        </p>
                        <div class="text-xl md:text-2xl font-semibold {{ $totalUnrealizedPnl >= 0 ? 'text-emerald-400' : 'text-red-400' }}">
                            {{ number_format($totalUnrealizedPnl, 4) }}
                        </div>
                    </div>

                    <div class="bg-zinc-900/70 border border-gray-800 rounded-xl p-3 md:p-4">
                        <p class="text-[11px] md:text-xs text-gray-400 mb-1">
                            Net Profit <span class="text-[10px]">(USDT)</span>
                        </p>
                        <div class="text-xl md:text-2xl font-semibold {{ $netProfit >= 0 ? 'text-emerald-400' : 'text-red-400' }}">
                            {{ number_format($netProfit, 4) }}
                        </div>
                    </div>
                </div>

                {{-- Tabs: Spot Copy, Ongoing/Closed, Auto-Invest --}}
                <div class="border-b border-gray-700 mb-4 md:mb-6 flex flex-wrap items-center gap-4">
                    <div class="flex items-center gap-2 text-sm">
                        <span class="font-medium">Spot Copy</span>
                    </div>

                    <div class="flex items-center gap-2 text-xs md:text-sm ml-0 md:ml-6">
                        <button type="button"
                                class="pf-tab pf-tab-active"
                                data-target="ongoing-tab">
                            Ongoing ({{ $ongoingInvestments->count() }})
                        </button>
                        <button type="button"
                                class="pf-tab"
                                data-target="closed-tab">
                            Closed ({{ $closedInvestments->count() }})
                        </button>
                        <button type="button"
                                class="pf-tab"
                                data-target="auto-tab">
                            Auto-Invest ({{ $autoInvests->count() }})
                        </button>
                    </div>
                </div>

                {{-- Ongoing --}}
                <div id="ongoing-tab" class="pf-tab-panel">
                    @if($ongoingInvestments->isEmpty())
                        <div class="flex flex-col items-center justify-center py-12 text-center text-gray-400">
                            <div class="mb-3 text-4xl">🔍</div>
                            <p class="text-sm mb-1">No active copy subscriptions</p>
                            <p class="text-xs text-gray-500 mb-4">
                                Start copying a trader from the main copy trading page.
                            </p>
                            <a href="{{ route('web.copyTrading') ?? '#' }}"
                               class="px-4 py-2 rounded bg-crypto-primary text-black text-xs md:text-sm font-medium">
                                View Traders
                            </a>
                        </div>
                    @else
                        <div class="space-y-4">
                            @foreach($ongoingInvestments as $inv)
                                @php
                                    $currentBalance = $inv->transactions->sum('amount');
                                    $unrealized = $currentBalance - $inv->net_investment;
                                    $trader = $inv->copyTrader;
                                    $pkg = $inv->copyTraderPackage->copyTradingPackage ?? null;
                                @endphp

                                <div class="bg-zinc-900/60 border border-gray-800 rounded-xl p-4 md:p-5">
                                    <div class="flex flex-wrap items-center justify-between gap-3 mb-3">
                                        <div class="flex items-center gap-3">
                                            <div class="h-9 w-9 rounded-full bg-gradient-to-br from-crypto-primary to-yellow-500 flex items-center justify-center text-sm font-semibold">
                                                {{ strtoupper(substr($trader->name ?? 'T', 0, 1)) }}
                                            </div>
                                            <div>
                                                <div class="flex items-center gap-2">
                                                    <p class="text-sm md:text-base font-semibold">
                                                        {{ $trader->name ?? 'Copy Trader #'.$inv->copy_trader_id }}
                                                    </p>
                                                    <span class="text-[10px] px-2 py-0.5 rounded-full bg-zinc-800 border border-gray-700 uppercase tracking-wide">
                                                    {{ $inv->mode === 'fixed_amount' ? 'Fixed Amount' : 'Fixed Ratio' }}
                                                </span>
                                                </div>
                                                <p class="text-[11px] text-gray-400">
                                                    Started {{ $inv->start_date?->format('Y-m-d') }}
                                                    @if($inv->period_days)
                                                        • Duration: {{ $inv->period_days }}d
                                                    @endif
                                                    @if($pkg)
                                                        • Package: {{ $pkg->name }}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>

                                        <div class="text-right text-xs md:text-sm">
                                            <p class="text-gray-400">Current Balance</p>
                                            <p class="font-semibold text-sm md:text-base">
                                                {{ number_format($currentBalance, 4) }} <span class="text-gray-400 text-xs">USDT</span>
                                            </p>
                                            <p class="{{ $unrealized >= 0 ? 'text-emerald-400' : 'text-red-400' }} text-[11px]">
                                                Unrealized PnL:
                                                {{ number_format($unrealized, 4) }} USDT
                                            </p>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3 text-[11px] md:text-xs mb-3">
                                        <div>
                                            <p class="text-gray-400 mb-1">
                                                {{ $inv->mode === 'fixed_amount' ? 'Copy Amount' : 'Invested Amount' }}
                                            </p>
                                            <p class="font-medium">
                                                {{ number_format($inv->investment_amount, 4) }} USDT
                                            </p>
                                        </div>
                                        @if($inv->mode === 'fixed_amount')
                                            <div>
                                                <p class="text-gray-400 mb-1">Cost Per Order</p>
                                                <p class="font-medium">{{ number_format($inv->cost_per_order, 4) }} USDT</p>
                                            </div>
                                        @else
                                            <div>
                                                <p class="text-gray-400 mb-1">Net Investment</p>
                                                <p class="font-medium">{{ number_format($inv->net_investment, 4) }} USDT</p>
                                            </div>
                                        @endif

                                        <div>
                                            <p class="text-gray-400 mb-1">Profit Range</p>
                                            <p class="font-medium">
                                                {{ $inv->min_profit_percentage }}% – {{ $inv->max_profit_percentage }}%
                                            </p>
                                        </div>
                                        <div>
                                            <p class="text-gray-400 mb-1">Status</p>
                                            <span class="px-2 py-0.5 rounded-full bg-emerald-700/30 text-emerald-300 text-[11px]">
                                            Active
                                        </span>
                                        </div>
                                    </div>

                                    {{-- Daily PnL history --}}
                                    <details class="mt-3 group">
                                        <summary class="flex items-center justify-between cursor-pointer text-[11px] md:text-xs text-gray-400">
                                            <span>Daily PnL Records (last {{ $inv->transactions->count() }})</span>
                                            <span class="group-open:rotate-180 transition-transform text-gray-500">
                                            ▼
                                        </span>
                                        </summary>
                                        <div class="mt-3 border-t border-gray-800 pt-3 overflow-x-auto">
                                            <table class="min-w-full text-[11px] md:text-xs">
                                                <thead class="text-gray-400">
                                                <tr>
                                                    <th class="text-left font-normal pb-1">Date</th>
                                                    <th class="text-right font-normal pb-1">PnL (USDT)</th>
                                                    <th class="text-right font-normal pb-1">% Change</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($inv->transactions as $txn)
                                                    <tr class="border-t border-gray-900/80">
                                                        <td class="py-1">
                                                            {{ \Carbon\Carbon::parse($txn->transaction_date)->format('Y-m-d') }}
                                                        </td>
                                                        <td class="py-1 text-right {{ $txn->amount >= 0 ? 'text-emerald-400' : 'text-red-400' }}">
                                                            {{ number_format($txn->amount, 4) }}
                                                        </td>
                                                        <td class="py-1 text-right {{ $txn->profit_percentage >= 0 ? 'text-emerald-400' : 'text-red-400' }}">
                                                            {{ number_format($txn->profit_percentage, 2) }}%
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="3" class="py-2 text-center text-gray-500">
                                                            No profit records yet.
                                                        </td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </details>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                {{-- Closed --}}
                <div id="closed-tab" class="pf-tab-panel hidden">
                    @if($closedInvestments->isEmpty())
                        <div class="py-10 text-center text-gray-400 text-xs md:text-sm">
                            You don't have any closed copy subscriptions yet.
                        </div>
                    @else
                        <div class="space-y-4">
                            @foreach($closedInvestments as $inv)
                                @php
                                    $currentBalance = $inv->transactions->sum('amount');
                                    $realized = $currentBalance - $inv->net_investment;
                                    $trader = $inv->copyTrader;
                                    $pkg = $inv->copyTraderPackage->copyTradingPackage ?? null;
                                @endphp

                                <div class="bg-zinc-900/60 border border-gray-800 rounded-xl p-4 md:p-5 opacity-80">
                                    <div class="flex flex-wrap items-center justify-between gap-3 mb-2">
                                        <div>
                                            <p class="text-sm md:text-base font-semibold">
                                                {{ $trader->name ?? 'Copy Trader #'.$inv->copy_trader_id }}
                                                <span class="ml-2 text-[10px] px-2 py-0.5 rounded-full bg-zinc-800 border border-gray-700 uppercase">
                                                {{ $inv->mode === 'fixed_amount' ? 'Fixed Amount' : 'Fixed Ratio' }}
                                            </span>
                                            </p>
                                            <p class="text-[11px] text-gray-400">
                                                Started {{ $inv->start_date?->format('Y-m-d') }}
                                                @if($inv->period_days)
                                                    • Duration: {{ $inv->period_days }}d
                                                @endif
                                                @if($pkg)
                                                    • Package: {{ $pkg->name }}
                                                @endif
                                                • Status: {{ ucfirst($inv->status) }}
                                            </p>
                                        </div>
                                        <div class="text-right text-xs md:text-sm">
                                            <p class="text-gray-400">Realized PnL</p>
                                            <p class="font-semibold {{ $realized >= 0 ? 'text-emerald-400' : 'text-red-400' }}">
                                                {{ number_format($realized, 4) }} USDT
                                            </p>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3 text-[11px] md:text-xs">
                                        <div>
                                            <p class="text-gray-400 mb-1">Invested Amount</p>
                                            <p class="font-medium">{{ number_format($inv->investment_amount, 4) }} USDT</p>
                                        </div>
                                        <div>
                                            <p class="text-gray-400 mb-1">Net Investment</p>
                                            <p class="font-medium">{{ number_format($inv->net_investment, 4) }} USDT</p>
                                        </div>
                                        <div>
                                            <p class="text-gray-400 mb-1">Total Profit Txns</p>
                                            <p class="font-medium">{{ $inv->transactions->count() }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                {{-- Auto-Invest tab --}}
                <div id="auto-tab" class="pf-tab-panel hidden">
                    @if($autoInvests->isEmpty())
                        <div class="py-10 text-center text-gray-400 text-xs md:text-sm">
                            You don't have any auto-invest subscriptions.
                        </div>
                    @else
                        <div class="space-y-4">
                            @foreach($autoInvests as $auto)
                                <div class="bg-zinc-900/60 border border-gray-800 rounded-xl p-4 md:p-5 flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                                    <div>
                                        <p class="text-sm md:text-base font-semibold mb-1">
                                            {{ $auto->copyTrader->name ?? 'Copy Trader #'.$auto->copy_trader_id }}
                                        </p>
                                        <p class="text-[11px] text-gray-400 mb-1">
                                            Amount per subscription:
                                            <span class="font-medium text-white">
                                            {{ number_format($auto->amount, 4) }} USDT
                                        </span>
                                            • Frequency:
                                            <span class="font-medium text-white">
                                            @switch($auto->frequency)
                                                    @case('everyday') Everyday @break
                                                    @case('7d') Every 7 days @break
                                                    @case('14d') Every 14 days @break
                                                    @case('30d') Every 30 days @break
                                                    @default {{ $auto->frequency }}
                                                @endswitch
                                        </span>
                                        </p>
                                        <p class="text-[11px] text-gray-500">
                                            Last run:
                                            {{ $auto->last_run_at ? $auto->last_run_at->format('Y-m-d H:i') : 'Never' }}
                                            • Next run:
                                            {{ $auto->next_run_at ? $auto->next_run_at->format('Y-m-d H:i') : 'Scheduled by system' }}
                                        </p>
                                    </div>

                                    <div class="flex items-center gap-3 justify-between md:justify-end">
                                    <span class="text-[11px] px-2 py-0.5 rounded-full
                                        @if($auto->status === 'active')
                                            bg-emerald-700/30 text-emerald-300
                                        @elseif($auto->status === 'paused')
                                            bg-yellow-700/30 text-yellow-300
                                        @else
                                            bg-gray-700 text-gray-300
                                        @endif">
                                        {{ ucfirst($auto->status) }}
                                    </span>

                                        @if($auto->status !== 'cancelled')
                                            <form action="{{ route('copy-auto-invest.cancel', $auto->id) }}" method="POST"
                                                  onsubmit="return confirm('Cancel this auto-invest subscription?');">
                                                @csrf
                                                <button type="submit"
                                                        class="px-3 py-1 rounded bg-red-600/80 hover:bg-red-500 text-xs font-medium">
                                                    Cancel
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tabButtons = document.querySelectorAll('.pf-tab');
            const panels = document.querySelectorAll('.pf-tab-panel');

            tabButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    const target = btn.dataset.target;

                    tabButtons.forEach(b => b.classList.remove('pf-tab-active'));
                    btn.classList.add('pf-tab-active');

                    panels.forEach(p => {
                        if (p.id === target) {
                            p.classList.remove('hidden');
                        } else {
                            p.classList.add('hidden');
                        }
                    });
                });
            });
        });
    </script>
@endpush

@push('styles')
    <style>
        .pf-tab {
            @apply px-3 py-2 rounded-t-md border-b-2 border-transparent text-gray-400 hover:text-white cursor-pointer;
        }
        .pf-tab-active {
            @apply border-crypto-primary text-white;
        }
    </style>
@endpush
