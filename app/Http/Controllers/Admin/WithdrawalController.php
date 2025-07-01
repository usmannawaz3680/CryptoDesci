<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Withdrawl;
use App\Models\Wallet;
use App\Notifications\WithdrawalRequested;
use App\Notifications\WithdrawalStatusUpdated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WithdrawalController extends Controller
{
    public function index()
    {
        $withdrawals = Withdrawl::with(['user', 'coin'])->latest()->get();
        return view('admin.pages.withdrawls.index', compact('withdrawals'));
    }
    public function approve(Request $request, Withdrawl $withdrawal)
    {
        if ($withdrawal->status !== 'pending') {
            return response()->json(['error' => 'Already processed.'], 400);
        }

        DB::beginTransaction();

        try {
            $withdrawal->status = 'completed'; // changed from processing to approved
            $withdrawal->admin_note = $request->admin_note;
            $withdrawal->trx_id = $request->trx_id;
            $withdrawal->save();

            // Deduct amount from user's wallet securely
            $user = $withdrawal->user;
            $wallet = $user->wallets->where('asset_coin_id', $withdrawal->asset_coin_id)->first();
            if ($wallet->balance < $withdrawal->amount) {
                DB::rollBack();
                return response()->json(['error' => 'Insufficient user balance.'], 400);
            }

            $wallet->balance -= $withdrawal->amount;
            $wallet->save();

            $user->notify(new WithdrawalStatusUpdated($withdrawal, $request->admin_note));

            DB::commit();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            report($e); // Log error
            return response()->json(['error' => 'Something went wrong.'], 500);
        }
    }


    public function reject(Request $request, Withdrawl $withdrawal)
    {
        if (!in_array($withdrawal->status, ['pending', 'processing'])) {
            return response()->json(['error' => 'Invalid status.'], 400);
        }

        $withdrawal->status = 'rejected';
        $withdrawal->admin_note = $request->admin_note;
        $withdrawal->trx_id = $request->trx_id;
        $withdrawal->save();

        $withdrawal->user->notify(new WithdrawalStatusUpdated($withdrawal, $request->admin_note));

        return response()->json(['success' => true]);
    }
}
