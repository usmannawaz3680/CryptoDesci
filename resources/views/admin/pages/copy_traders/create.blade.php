@extends('admin.layout.app')

@section('sidebar')
    @include('admin.layout.partials.sidebar')
@endsection

@section('content')
<div class="w-full overflow-x-hidden custom-scrollbar">
    <div class="content-area page-transition m-4 md:m-6">
        <div class="p-4 md:p-6 bg-crypto-accent rounded-xl text-white">
            <h2 class="text-2xl font-semibold mb-4 text-crypto-primary">Create Copy Trader</h2>

            <form action="{{ route('copy-traders.store') }}" method="POST">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Name</label>
                    <input type="text" name="name" required class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Username -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Username</label>
                    <input type="text" name="username" required class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Email</label>
                    <input type="email" name="email" required class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Bio -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Bio</label>
                    <textarea name="bio" class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary"></textarea>
                </div>

                <!-- Risk Level -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Risk Level</label>
                    <select name="risk_level" required class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                </div>

                <!-- Level -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Level</label>
                    <input type="text" name="level" required class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Trading Style -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Trading Style</label>
                    <input type="text" name="trading_style" class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Status -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Status</label>
                    <select name="status" required class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                        <option value="suspended">Suspended</option>
                        <option value="full">Full</option>
                    </select>
                </div>

                <!-- Badges -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Badges</label>
                    <div class="flex gap-4">
                        <label><input type="checkbox" name="badges[top_performer]" value="1"> Top Performer</label>
                        <label><input type="checkbox" name="badges[trading_expert]" value="1"> Trading Expert</label>
                        <label><input type="checkbox" name="badges[risk_awareness]" value="1"> Risk Awareness</label>
                    </div>
                </div>

                <!-- Followers -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Followers</label>
                    <input type="number" name="followers" value="0" class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Copiers -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Copiers</label>
                    <input type="number" name="copiers" value="{{ rand(1001, 3024) }}" class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Trades -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Trades</label>
                    <input type="number" name="trades" required class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Win Trades -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Win Trades</label>
                    <input type="number" name="win_trades" required class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primarygunakan">
                </div>

                <!-- Win Rate -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Win Rate (%)</label>
                    <input type="number" step="0.01" name="win_rate" required class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Total AUM -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Total AUM</label>
                    <input type="number" step="0.01" name="total_aum" required class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- ROI -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">ROI (%)</label>
                    <input type="number" step="0.01" name="roi" required class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- PnL -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">PnL</label>
                    <input type="number" step="0.01" name="pnl" required class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Sharp Ratio -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Sharp Ratio</label>
                    <input type="number" step="0.01" name="sharp_ratio" required class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- MDD -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">MDD (%)</label>
                    <input type="number" step="0.01" name="mdd" required class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Profit Sharing -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Profit Sharing (%)</label>
                    <input type="number" step="0.01" name="profit_sharing" required class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Lead Balance -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Lead Balance</label>
                    <input type="number" step="0.01" name="lead_balance" required class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Min Copy Amount -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Min Copy Amount</label>
                    <input type="number" step="0.01" name="min_copy_amount" required class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Max Copy Amount -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Max Copy Amount</label>
                    <input type="number" step="0.01" name="max_copy_amount" required class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Member Since -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Member Since</label>
                    <input type="datetime-local" name="member_since" class="w-full p-2.5 rounded-lg bg-zinc-800 border border-gray-600 text-white focus:ring-crypto-primary focus:border-crypto-primary">
                </div>

                <!-- Submit -->
                <div class="text-end">
                    <button type="submit" class="bg-crypto-primary text-black font-medium py-2 px-6 rounded hover:brightness-110 transition">
                        Create Copy Trader
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection