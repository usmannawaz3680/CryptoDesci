<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Withdrawal;
use App\Models\Wallet;
use App\Notifications\WithdrawalRequested;
use App\Notifications\WithdrawalRejected;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{
    public function index()
    {
        $withdrawals = Withdrawal::with(['user', 'coin'])->latest()->get();
        return view('admin.withdrawals.index', compact('withdrawals'));
    }

    public function approve(Withdrawal $withdrawal)
    {
        if ($withdrawal->status !== 'pending') {
            return response()->json(['error' => 'Already processed.'], 400);
        }

        $withdrawal->status = 'processing'; // Now admin will later click "Mark as completed" to deduct
        $withdrawal->save();

        // Optional: notify user
        $withdrawal->user->notify(new WithdrawalRequested($withdrawal));

        return response()->json(['success' => true]);
    }

    public function reject(Withdrawal $withdrawal)
    {
        if (!in_array($withdrawal->status, ['pending', 'processing'])) {
            return response()->json(['error' => 'Invalid status.'], 400);
        }

        $withdrawal->status = 'rejected';
        $withdrawal->save();

        // Optional: notify user about rejection
        $withdrawal->user->notify(new WithdrawalRejected($withdrawal));

        return response()->json(['success' => true]);
    }
}
