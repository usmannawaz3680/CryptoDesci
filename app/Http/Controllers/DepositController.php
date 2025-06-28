<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deposit;
use App\Models\AssetCoin;
use App\Models\Admin;
use App\Notifications\DepositSubmitted;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DepositController extends Controller
{
    public function submit(Request $request)
    {
        try {
            $request->validate([
                'coin' => 'required|exists:asset_coins,id',
                'amount' => 'required|numeric|min:0.01',
                'network' => 'required|string|max:32',
                'receipt_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'from_address' => 'nullable|string|max:255',
                'transaction_id' => 'nullable|string|max:255',
            ]);

            $deposit = new Deposit();
            $deposit->user_id = Auth::id();
            $deposit->asset_coin_id = $request->coin;
            $deposit->amount = (float) $request->amount;
            $deposit->network = $request->network;
            $deposit->from_address = $request->from_address;
            $deposit->trx_id = $request->transaction_id;
            $deposit->status = 'pending';

            if ($request->hasFile('receipt_image')) {
                $image = $request->file('receipt_image');
                $filename = 'deposit_' . time() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('deposits', $filename, 'public');
                $deposit->receipt_img = $path;
            }

            $deposit->save();

            $admin = Admin::first();
            if ($admin) {
                $admin->notify(new DepositSubmitted($deposit));
            } else {
                Log::warning('No admin found to notify about deposit submission', [
                    'user_id' => Auth::id(),
                    'deposit_id' => $deposit->id,
                ]);
            }

            return redirect()->route('user.dashboard')->with('success', 'Deposit submitted successfully.');
        } catch (\Exception $e) {
            Log::error('Deposit submission error: ' . $e->getMessage(), [
                'user_id' => Auth::id(),
                'request_data' => $request->all(),
            ]);
            return redirect()->back()->with('error', 'Failed to submit deposit.');
        }
    }
}
