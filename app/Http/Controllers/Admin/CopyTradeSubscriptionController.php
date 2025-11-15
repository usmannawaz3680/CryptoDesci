<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserCopyInvestment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CopyTradeSubscriptionController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->string('status')->toString();
        $userId = $request->integer('user_id');
        $traderId = $request->integer('copy_trader_id');
        $search = $request->string('search')->toString();
        $sort = $request->string('sort')->toString() ?: 'start_date';
        $direction = $request->string('direction')->toString() ?: 'desc';

        $allowedSorts = ['start_date', 'investment_amount', 'status'];
        if (!in_array($sort, $allowedSorts)) {
            $sort = 'start_date';
        }
        $direction = strtolower($direction) === 'asc' ? 'asc' : 'desc';

        $query = UserCopyInvestment::with(['user', 'copyTrader'])
            ->when($status, fn($q) => $q->where('status', $status))
            ->when($userId, fn($q) => $q->where('user_id', $userId))
            ->when($traderId, fn($q) => $q->where('copy_trader_id', $traderId))
            ->when($search, function ($q) use ($search) {
                $q->whereHas('user', function ($uq) use ($search) {
                    $uq->where('email', 'like', "%$search%")
                       ->orWhere('user_uid', 'like', "%$search%");
                })->orWhereHas('copyTrader', function ($tq) use ($search) {
                    $tq->where('username', 'like', "%$search%")
                       ->orWhere('name', 'like', "%$search%");
                });
            })
            ->orderBy($sort, $direction);

        $subscriptions = $query->paginate(15)->appends($request->query());

        return view('admin.pages.copy_trading_subscriptions.index', compact('subscriptions', 'status', 'userId', 'traderId', 'search', 'sort', 'direction'));
    }

    public function pause(UserCopyInvestment $investment)
    {
        if ($investment->status !== 'active') {
            return back()->with('danger', 'Only active subscriptions can be paused.');
        }
        $investment->status = 'paused';
        $investment->save();
        return back()->with('success', 'Subscription paused successfully.');
    }

    public function resume(UserCopyInvestment $investment)
    {
        if ($investment->status !== 'paused') {
            return back()->with('danger', 'Only paused subscriptions can be resumed.');
        }
        $investment->status = 'active';
        $investment->save();
        return back()->with('success', 'Subscription resumed successfully.');
    }

    public function terminate(UserCopyInvestment $investment)
    {
        if ($investment->status === 'terminated') {
            return back()->with('danger', 'Subscription already terminated.');
        }
        $investment->status = 'terminated';
        $investment->save();
        return back()->with('success', 'Subscription terminated successfully.');
    }

    public function export(Request $request): StreamedResponse
    {
        $status = $request->string('status')->toString();
        $userId = $request->integer('user_id');
        $traderId = $request->integer('copy_trader_id');
        $search = $request->string('search')->toString();

        $query = UserCopyInvestment::with(['user', 'copyTrader'])
            ->when($status, fn($q) => $q->where('status', $status))
            ->when($userId, fn($q) => $q->where('user_id', $userId))
            ->when($traderId, fn($q) => $q->where('copy_trader_id', $traderId))
            ->when($search, function ($q) use ($search) {
                $q->whereHas('user', function ($uq) use ($search) {
                    $uq->where('email', 'like', "%$search%")
                       ->orWhere('user_uid', 'like', "%$search%");
                })->orWhereHas('copyTrader', function ($tq) use ($search) {
                    $tq->where('username', 'like', "%$search%")
                       ->orWhere('name', 'like', "%$search%");
                });
            });

        $filename = 'copy_trading_subscriptions_' . now()->format('Ymd_His') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        return response()->streamDownload(function () use ($query) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, [
                'ID', 'User ID', 'User UID', 'User Email', 'Trader ID', 'Trader Username', 'Start Date', 'Status',
                'Investment Amount', 'Net Investment', 'Current Balance', 'Transactions Count', 'Estimated Profit'
            ]);

            $query->chunk(200, function ($rows) use ($handle) {
                foreach ($rows as $row) {
                    $transactionsCount = $row->transactions()->count();
                    $currentBalance = $row->current_balance;
                    $profit = $currentBalance - ($row->net_investment ?? 0);
                    fputcsv($handle, [
                        $row->id,
                        $row->user_id,
                        optional($row->user)->user_uid,
                        optional($row->user)->email,
                        $row->copy_trader_id,
                        optional($row->copyTrader)->username,
                        $row->start_date,
                        $row->status,
                        $row->investment_amount,
                        $row->net_investment,
                        $currentBalance,
                        $transactionsCount,
                        $profit,
                    ]);
                }
            });
            fclose($handle);
        }, $filename, $headers);
    }
}