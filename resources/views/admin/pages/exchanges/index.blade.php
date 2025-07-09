@extends('admin.layout.app')
@section('sidebar')
    @include('admin.layout.partials.sidebar')
@endsection
@section('content')
<div class="p-6">
    <h2 class="text-xl font-semibold mb-4">All Exchanges</h2>
    <div class="overflow-x-auto">
        <table class="w-full text-left bg-gray-800 rounded shadow">
            <thead>
                <tr class="bg-gray-700 text-sm text-crypto-primary">
                    <th class="p-3">Name</th>
                    <th class="p-3">Coingecko ID</th>
                    <th class="p-3">TV Prefix</th>
                    <th class="p-3">Country</th>
                </tr>
            </thead>
            <tbody>
                @foreach($exchanges as $exchange)
                <tr class="border-t border-gray-600 hover:bg-gray-700">
                    <td class="p-3">{{ $exchange->name }}</td>
                    <td class="p-3">{{ $exchange->coingecko_id }}</td>
                    <td class="p-3">{{ $exchange->tv_prefix }}</td>
                    <td class="p-3">{{ $exchange->country }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
