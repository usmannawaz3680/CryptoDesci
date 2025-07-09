@extends('admin.layout.app')
@section('sidebar')
    @include('admin.layout.partials.sidebar')
@endsection
@section('content')
<div class="p-6">
    <h2 class="text-xl font-semibold mb-4">All Trading Pairs</h2>
    <div class="overflow-x-auto">
        <table class="w-full text-left bg-gray-800 rounded shadow">
            <thead>
                <tr class="bg-gray-700 text-sm text-crypto-primary">
                    <th class="p-3">Exchange</th>
                    <th class="p-3">Base</th>
                    <th class="p-3">Quote</th>
                    <th class="p-3">TV Symbol</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pairs as $pair)
                <tr class="border-t border-gray-600 hover:bg-gray-700">
                    <td class="p-3">{{ $pair->exchange->name ?? '-' }}</td>
                    <td class="p-3">{{ $pair->base_asset }}</td>
                    <td class="p-3">{{ $pair->quote_asset }}</td>
                    <td class="p-3 text-crypto-primary">{{ $pair->tv_symbol }}</td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
