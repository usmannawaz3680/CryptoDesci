<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Models\Withdrawl;
use App\Models\Coin;
use App\Models\User;
use App\Notifications\WithdrawalRequested;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class WithdrawlController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'coin'    => 'required|exists:coins,id',
            'network' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'amount'  => 'required|numeric|min:0.00000001',
        ]);

        $user = auth()->user();
        $coinId = $request->coin;
        $amount = $request->amount;

        // Get user wallet for this coin
        $wallet = Wallet::where('user_id', $user->id)
                        ->where('asset_coin_id', $coinId)
                        ->first();

        if (!$wallet || $wallet->balance < $amount) {
            return back()->withErrors(['amount' => 'You don’t have sufficient balance to make this withdrawal.']);
        }

        DB::beginTransaction();
        try {
            $withdrawal = Withdrawl::create([
                'user_id'   => $user->id,
                'asset_coin_id'   => $coinId,
                'network'   => $request->network,
                'address'   => $request->address,
                'amount'    => $amount,
                'status'    => 'pending', // pending → approved → completed
            ]);

            // Notify admin(s)
            $admins = User::where('role', 'admin')->get(); // Adjust role field if needed
            Notification::send($admins, new WithdrawalRequested($withdrawal));

            DB::commit();

            return redirect()->route('user.dashboard')->with('success', 'Your withdrawal request has been submitted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Something went wrong. Please try again later.']);
        }
    }
}
