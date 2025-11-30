<?php

namespace App\Http\Controllers;

use App\Services\CopyTradingService;
use App\Models\CopyTrader;
use App\Models\CopyTraderPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCopyTraderController extends Controller
{
    protected $copyTradingService;

    public function __construct(CopyTradingService $copyTradingService)
    {
        $this->copyTradingService = $copyTradingService;
    }

    public function create($username)
    {
        $trader = CopyTrader::where('username', $username)->firstOrFail();
        $packages = $trader->availablePackages()
            ->with('copyTradingPackage')
            ->get();
        return view('web.pages.copyTrading.create', compact('trader', 'packages'));
    }

    public function invest(Request $request, $id)
    {
        $mode = $request->input('mode'); // 'fixed_ratio' or 'fixed_amount'

        $rules = [
            'mode'  => ['required', 'in:fixed_ratio,fixed_amount'],
            'terms' => ['accepted'],
        ];

        if ($mode === 'fixed_ratio') {
            $rules = array_merge($rules, [
                'amount'      => ['required', 'numeric', 'min:0.01'],
                'period_days' => ['required', 'integer', 'min:1'],
            ]);
        } else {
            // fixed_amount
            $rules = array_merge($rules, [
                'copy_amount'    => ['required', 'numeric', 'min:0.01'],
                'cost_per_order' => ['required', 'numeric', 'min:0.01'],
                'period_days'    => ['required', 'integer', 'min:1'],
            ]);
        }

        // Auto invest (optional)
        if ($request->boolean('auto_invest_enabled')) {
            $rules = array_merge($rules, [
                'auto_invest_amount'    => ['required', 'numeric', 'min:0.01'],
                'auto_invest_frequency' => ['required', 'in:everyday,7d,14d,30d'],
            ]);
        }

        $validated = $request->validate($rules);

        $user = Auth::guard('web')->user();
        $userId = $user->id;
        if ($user->wallets()->sum('balance') < ($mode === 'fixed_ratio' ? $validated['amount'] : $validated['copy_amount'])) {
            return redirect()->back()->with('error', 'Insufficient wallet balance for this investment.');
        }
        try {
            // 1) Create the main subscription based on mode
            if ($mode === 'fixed_ratio') {
                $this->copyTradingService->investFixedRatio(
                    $userId,
                    $id,
                    (float) $validated['amount'],
                    (int) $validated['period_days'],
                );
            } else {
                $this->copyTradingService->investFixedAmount(
                    $userId,
                    $id,
                    (float) $validated['copy_amount'],
                    (float) $validated['cost_per_order'],
                    (int) $validated['period_days'],
                );
            }

            // 2) Optional auto-invest config
            if ($request->boolean('auto_invest_enabled')) {
                $this->copyTradingService->createOrUpdateAutoInvest(
                    $userId,
                    $id,
                    (float) $validated['auto_invest_amount'],
                    $validated['auto_invest_frequency'],
                );
            }

            return redirect()->back()->with('success', 'Copy subscription created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}