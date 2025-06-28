<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Deposit;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function index()
    {
        $deposits = Deposit::with(['user', 'coin'])->get();
        return view('admin.pages.deposits.index', compact('deposits'));
    }
    public function approve($id)
    {
        DB::beginTransaction();
        try {

            $deposit = Deposit::findOrFail($id);
            $deposit->status = 'approved';
            $deposit->save();

            // Notify user or perform additional actions if needed
            $user = User::find($deposit->user_id);
            if ($user) {
                $wallet = $user->wallets()->where('asset_coin_id', $deposit->asset_coin_id)->first();
                if ($wallet) {
                    $wallet->balance += $deposit->amount;
                    $wallet->save();
                } else {
                    // If the user does not have a wallet for this coin, you might want to create one
                    $user->wallets()->create([
                        'asset_coin_id' => $deposit->asset_coin_id,
                        'balance' => $deposit->amount,
                    ]);
                }
            } else {
                return redirect()->route('admin.deposits')->with('error', 'User not found for this deposit.');
            }
            DB::commit();
            return redirect()->route('admin.deposits')->with('success', 'Deposit approved successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Deposit approval error: ' . $e->getMessage(), [
                'deposit_id' => $id,
                'user_id' => $deposit->user_id ?? null,
            ]);
            return redirect()->route('admin.deposits')->with('error', 'Failed to approve deposit: ' . $e->getMessage());
        }
    }
    public function reject($id)
    {
        $deposit = Deposit::findOrFail($id);
        $deposit->status = 'rejected';
        $deposit->save();

        // Notify user or perform additional actions if needed
        return redirect()->route('admin.deposits')->with('success', 'Deposit rejected successfully.');
    }
}
