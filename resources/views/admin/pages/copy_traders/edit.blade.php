@extends('admin.layout.app')

@section('sidebar')
    @include('admin.layout.partials.sidebar')
@endsection

@section('content')
<div class="w-full overflow-x-hidden custom-scrollbar">
    <div class="content-area page-transition m-4 md:m-6">
        <div class="p-4 md:p-6 bg-crypto-accent rounded-xl text-white">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-2xl font-semibold text-crypto-primary">Edit Copy Trader</h2>
                <a href="{{ route('copy-traders.show', $copyTrader->id) }}" class="text-crypto-primary hover:brightness-110">View Profile</a>
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
            @if($errors->any())
                <div class="bg-red-500/20 border border-red-500 text-red-300 px-4 py-3 rounded mb-4">
                    <ul class="list-disc pl-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('copy-traders.update', $copyTrader->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Name</label>
                    <input type="text" name="name" required value="{{ old('name', $copyTrader->name) }}" class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Username -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Username</label>
                    <input type="text" name="username" required value="{{ old('username', $copyTrader->username) }}" class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Email</label>
                    <input type="email" name="email" required value="{{ old('email', $copyTrader->email) }}" class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Bio -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Bio</label>
                    <textarea name="bio" class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary" rows="3">{{ old('bio', $copyTrader->bio) }}</textarea>
                </div>

                <!-- Risk Level -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Risk Level</label>
                    <select name="risk_level" required class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                        @php $risk = old('risk_level', $copyTrader->risk_level); @endphp
                        <option value="low" {{ $risk==='low' ? 'selected' : '' }}>Low</option>
                        <option value="medium" {{ $risk==='medium' ? 'selected' : '' }}>Medium</option>
                        <option value="high" {{ $risk==='high' ? 'selected' : '' }}>High</option>
                    </select>
                </div>

                <!-- Level -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Level</label>
                    <input type="text" name="level" required value="{{ old('level', $copyTrader->level) }}" class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Trading Style -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Trading Style</label>
                    <input type="text" name="trading_style" value="{{ old('trading_style', $copyTrader->trading_style) }}" class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Status -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Status</label>
                    @php $status = old('status', $copyTrader->status); @endphp
                    <select name="status" required class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                        <option value="active" {{ $status==='active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $status==='inactive' ? 'selected' : '' }}>Inactive</option>
                        <option value="suspended" {{ $status==='suspended' ? 'selected' : '' }}>Suspended</option>
                        <option value="full" {{ $status==='full' ? 'selected' : '' }}>Full</option>
                    </select>
                </div>

                <!-- Badges -->
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-white">Badges</label>
                    @php $badges = $copyTrader->badges ?? []; @endphp
                    <div class="flex gap-4 text-sm">
                        <label><input type="checkbox" name="badges[top_performer]" value="1" {{ old('badges.top_performer', $badges['top_performer'] ?? false) ? 'checked' : '' }}> Top Performer</label>
                        <label><input type="checkbox" name="badges[trading_expert]" value="1" {{ old('badges.trading_expert', $badges['trading_expert'] ?? false) ? 'checked' : '' }}> Trading Expert</label>
                        <label><input type="checkbox" name="badges[risk_awareness]" value="1" {{ old('badges.risk_awareness', $badges['risk_awareness'] ?? false) ? 'checked' : '' }}> Risk Awareness</label>
                    </div>
                </div>

                <!-- Followers -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Followers</label>
                    <input type="number" name="followers" value="{{ old('followers', $copyTrader->followers) }}" class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Copiers -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Copiers</label>
                    <input type="number" name="copiers" value="{{ old('copiers', $copyTrader->copiers) }}" class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Trades -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Trades</label>
                    <input type="number" name="trades" required value="{{ old('trades', $copyTrader->trades) }}" class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Win Trades -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Win Trades</label>
                    <input type="number" name="win_trades" required value="{{ old('win_trades', $copyTrader->win_trades) }}" class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Win Rate (%) -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Win Rate (%)</label>
                    <input type="number" step="0.01" name="win_rate" required value="{{ old('win_rate', $copyTrader->win_rate) }}" class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Total AUM -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Total AUM</label>
                    <input type="number" step="0.01" name="total_aum" required value="{{ old('total_aum', $copyTrader->total_aum) }}" class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- ROI -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">ROI</label>
                    <input type="number" step="0.01" name="roi" required value="{{ old('roi', $copyTrader->roi) }}" class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- PnL -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">PnL</label>
                    <input type="number" step="0.01" name="pnl" required value="{{ old('pnl', $copyTrader->pnl) }}" class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Sharpe Ratio -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Sharpe Ratio</label>
                    <input type="number" step="0.01" name="sharp_ratio" required value="{{ old('sharp_ratio', $copyTrader->sharp_ratio) }}" class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- MDD -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">MDD</label>
                    <input type="number" step="0.01" name="mdd" required value="{{ old('mdd', $copyTrader->mdd) }}" class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Profit Sharing (%) -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Profit Sharing (%)</label>
                    <input type="number" step="0.01" name="profit_sharing" required value="{{ old('profit_sharing', $copyTrader->profit_sharing) }}" class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Lead Balance -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Lead Balance</label>
                    <input type="number" step="0.01" name="lead_balance" required value="{{ old('lead_balance', $copyTrader->lead_balance) }}" class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Min Copy Amount -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Min Copy Amount</label>
                    <input type="number" step="0.01" name="min_copy_amount" required value="{{ old('min_copy_amount', $copyTrader->min_copy_amount) }}" class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Max Copy Amount -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Max Copy Amount</label>
                    <input type="number" step="0.01" name="max_copy_amount" required value="{{ old('max_copy_amount', $copyTrader->max_copy_amount) }}" class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Member Since -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Member Since</label>
                    <input type="datetime-local" name="member_since" value="{{ old('member_since', optional($copyTrader->member_since)->format('Y-m-d\TH:i')) }}" class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Submit -->
                <div class="text-end">
                    <button type="submit" class="bg-crypto-primary text-black font-medium py-2 px-6 rounded hover:brightness-110 transition">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
@endsection