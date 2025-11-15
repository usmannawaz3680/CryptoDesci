@extends('admin.layout.app')

@section('sidebar')
    @include('admin.layout.partials.sidebar')
@endsection

@section('content')
<div class="w-full overflow-x-hidden custom-scrollbar">
    <div class="content-area page-transition m-4 md:m-6">
        <div class="p-4 md:p-6 bg-crypto-accent rounded-xl text-white">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-crypto-primary">Copy Trading Subscriptions</h2>
                <div class="flex gap-2">
                    <a href="{{ route('admin.copytrade-subscriptions.export', request()->query()) }}" class="bg-crypto-primary text-black px-4 py-2 rounded-lg hover:brightness-110 transition-colors">
                        <i class="fas fa-file-csv mr-2"></i> Export CSV
                    </a>
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

            <!-- Filters -->
            <form method="GET" class="mb-4 grid grid-cols-1 md:grid-cols-6 gap-3">
                <div>
                    <label class="block mb-1 text-sm">Status</label>
                    <select name="status" class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white">
                        <option value="">All</option>
                        @php $st = request('status'); @endphp
                        <option value="active" {{ $st==='active' ? 'selected' : '' }}>Active</option>
                        <option value="paused" {{ $st==='paused' ? 'selected' : '' }}>Paused</option>
                        <option value="terminated" {{ $st==='terminated' ? 'selected' : '' }}>Terminated</option>
                    </select>
                </div>
                <div>
                    <label class="block mb-1 text-sm">User ID</label>
                    <input type="number" name="user_id" value="{{ request('user_id') }}" class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white">
                </div>
                <div>
                    <label class="block mb-1 text-sm">Trader ID</label>
                    <input type="number" name="copy_trader_id" value="{{ request('copy_trader_id') }}" class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white">
                </div>
                <div class="md:col-span-2">
                    <label class="block mb-1 text-sm">Search (Email, UID, Username, Name)</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="e.g., user UID or email or trader username" class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white">
                </div>
                <div class="flex items-end">
                    <button type="submit" class="bg-crypto-primary text-black px-4 py-2 rounded-lg hover:brightness-110">Filter</button>
                </div>
            </form>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-300">
                    <thead class="text-xs uppercase bg-gray-800 text-gray-400">
                        <tr>
                            <th class="px-6 py-3">ID</th>
                            <th class="px-6 py-3">Subscriber</th>
                            <th class="px-6 py-3">Trader</th>
                            <th class="px-6 py-3">
                                <a href="{{ request()->fullUrlWithQuery(['sort' => 'start_date', 'direction' => request('direction')==='asc' ? 'desc' : 'asc']) }}">Start Date</a>
                            </th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3">
                                <a href="{{ request()->fullUrlWithQuery(['sort' => 'investment_amount', 'direction' => request('direction')==='asc' ? 'desc' : 'asc']) }}">Invested</a>
                            </th>
                            <th class="px-6 py-3">Net Invest.</th>
                            <th class="px-6 py-3">Current Bal.</th>
                            <th class="px-6 py-3">Tx Count</th>
                            <th class="px-6 py-3">Est. Profit</th>
                            <th class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($subscriptions as $sub)
                            @php 
                                $transactionsCount = $sub->transactions()->count();
                                $currentBalance = $sub->current_balance;
                                $profit = $currentBalance - ($sub->net_investment ?? 0);
                            @endphp
                            <tr class="border-b bg-gray-800/50 border-gray-700">
                                <td class="px-6 py-3">{{ $sub->id }}</td>
                                <td class="px-6 py-3">
                                    <div class="flex flex-col">
                                        <span>{{ optional($sub->user)->name }} (ID: {{ $sub->user_id }})</span>
                                        <span class="text-gray-400">{{ optional($sub->user)->email }} | UID: {{ optional($sub->user)->user_uid }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-3">
                                    <div class="flex flex-col">
                                        <span>{{ optional($sub->copyTrader)->name }} (ID: {{ $sub->copy_trader_id }})</span>
                                        <span class="text-gray-400">@{{ optional($sub->copyTrader)->username }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-3">{{ $sub->start_date }}</td>
                                <td class="px-6 py-3">
                                    @php $statusColor = match($sub->status){
                                        'active' => 'text-green-400',
                                        'paused' => 'text-yellow-400',
                                        'terminated' => 'text-red-400',
                                        default => 'text-gray-400'
                                    }; @endphp
                                    <span class="{{ $statusColor }} capitalize">{{ $sub->status }}</span>
                                </td>
                                <td class="px-6 py-3">${{ number_format($sub->investment_amount, 2) }}</td>
                                <td class="px-6 py-3">${{ number_format($sub->net_investment ?? 0, 2) }}</td>
                                <td class="px-6 py-3">${{ number_format($currentBalance, 2) }}</td>
                                <td class="px-6 py-3">{{ $transactionsCount }}</td>
                                <td class="px-6 py-3">${{ number_format($profit, 2) }}</td>
                                <td class="px-6 py-3">
                                    <div class="flex items-center gap-2">
                                        @if($sub->status === 'active')
                                            <form action="{{ route('admin.copytrade-subscriptions.pause', $sub->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="text-yellow-400 hover:text-yellow-300" title="Pause">
                                                    <i class="fas fa-pause"></i>
                                                </button>
                                            </form>
                                        @endif
                                        @if($sub->status === 'paused')
                                            <form action="{{ route('admin.copytrade-subscriptions.resume', $sub->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="text-green-400 hover:text-green-300" title="Resume">
                                                    <i class="fas fa-play"></i>
                                                </button>
                                            </form>
                                        @endif
                                        @if($sub->status !== 'terminated')
                                            <form action="{{ route('admin.copytrade-subscriptions.terminate', $sub->id) }}" method="POST" onsubmit="return confirm('Terminate this subscription?');">
                                                @csrf
                                                <button type="submit" class="text-red-400 hover:text-red-300" title="Terminate">
                                                    <i class="fas fa-stop"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="border-b bg-gray-800/50 border-gray-700">
                                <td class="px-6 py-3" colspan="11">No subscriptions found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $subscriptions->links() }}
            </div>
        </div>
    </div>
}</div>
@endsection