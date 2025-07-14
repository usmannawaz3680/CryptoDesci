@extends('admin.layout.app')
@section('sidebar')
    @include('admin.layout.partials.sidebar')
@endsection
@section('content')
    <div class="w-full overflow-x-hidden custom-scrollbar">
        <div class="content-area page-transition m-4 md:m-6">
            <div class="p-4 md:p-6 bg-crypto-accent rounded-xl text-white">
                <h2 class="text-2xl font-semibold mb-6 text-crypto-primary">
                    All Arbitrage Bots
                </h2>

                @if ($bots->count())
                    <table class="w-full text-sm text-left text-white">
                        <thead class="text-xs uppercase bg-zinc-800 text-zinc-400">
                            <tr>
                                <th class="px-4 py-3">Bot ID</th>
                                <th class="px-4 py-3">Trading Pair</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-zinc-700">
                            @foreach ($bots as $bot)
                                <tr class="bg-zinc-900">
                                    <td class="px-4 py-3">#{{ $bot->id }}</td>
                                    <td class="px-4 py-3">
                                        {{ $bot->tradingPair->base_asset }}/{{ $bot->tradingPair->quote_asset }}
                                    </td>
                                    <td class="px-4 py-3">
                                        @if ($bot->is_active)
                                            <span class="px-2 py-1 bg-green-600 rounded text-xs">Active</span>
                                        @else
                                            <span class="px-2 py-1 bg-red-600 rounded text-xs">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 flex gap-3">
                                        <a href="{{ route('admin.arbitrage.configure', $bot->id) }}" class="bg-crypto-primary text-black px-4 py-1 rounded hover:brightness-110 transition">
                                            Configure
                                        </a>
                                        <form action="{{--  --}}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="px-4 py-1 rounded transition text-white {{ $bot->is_active ? 'bg-red-600 hover:bg-red-500' : 'bg-green-600 hover:bg-green-500' }}">
                                                {{ $bot->is_active ? 'Deactivate' : 'Activate' }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-300">No bots found.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
