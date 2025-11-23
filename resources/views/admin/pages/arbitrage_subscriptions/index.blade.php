@extends('admin.layout.app')
@section('title', 'Active Arbitrage Subscriptions')
@section('sidebar')
    @include('admin.layout.partials.sidebar')
@endsection
@section('content')
    <div class="w-full overflow-x-hidden custom-scrollbar">
        <div class="content-area page-transition m-4 md:m-6">
            <div class="p-4 md:p-6 bg-crypto-accent rounded-xl text-white">
                <h2 class="text-2xl font-bold mb-4">Active Arbitrage Subscriptions</h2>
                <div class="bg-zinc-900 rounded-lg shadow p-4 overflow-x-auto text-nowrap">
                    <table class="min-w-full text-sm text-gray-200">
                        <thead>
                            <tr class="border-b border-crypto-primary">
                                <th class="px-2 py-2">User</th>
                                <th class="px-2 py-2">Bot</th>
                                <th class="px-2 py-2">Amount</th>
                                <th class="px-2 py-2">Fee</th>
                                <th class="px-2 py-2">APR Interval</th>
                                <th class="px-2 py-2">APR %</th>
                                <th class="px-2 py-2">Start</th>
                                <th class="px-2 py-2">End</th>
                                <th class="px-2 py-2">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subscriptions as $sub)
                                <tr class="border-b border-gray-700">
                                    <td class="px-2 py-2">{{ $sub->user->name ?? $sub->user->email }}</td>
                                    <td class="px-2 py-2">{{ $sub->arbitrageBot->id }} ({{ $sub->arbitrageBot->tradingPair->base_asset }}/{{ $sub->arbitrageBot->tradingPair->quote_asset }})</td>
                                    <td class="px-2 py-2">{{ number_format($sub->amount, 2) }} USDT</td>
                                    <td class="px-2 py-2">{{ number_format($sub->fee_deducted, 2) }} USDT</td>
                                    <td class="px-2 py-2">{{ strtoupper($sub->apr_interval) }}</td>
                                    <td class="px-2 py-2">{{ number_format($sub->apr_percentage, 2) }}%</td>
                                    <td class="px-2 py-2">{{ $sub->start_at }}</td>
                                    <td class="px-2 py-2">{{ $sub->end_at }}</td>
                                    <td class="px-2 py-2">{{ ucfirst($sub->status) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
