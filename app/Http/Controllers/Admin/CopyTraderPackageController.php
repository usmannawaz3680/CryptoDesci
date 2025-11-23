<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CopyTrader;
use App\Models\CopyTraderPackage;
use App\Models\CopyTradingPackage;
use Illuminate\Http\Request;

class CopyTraderPackageController extends Controller
{
    public function store(Request $request, CopyTrader $copyTrader)
    {
        $validated = $request->validate([
            'copy_trading_package_id' => ['required', 'exists:copy_trading_packages,id'],
            'loss_day'                => ['required', 'integer', 'min:1'],
            'min_loss_percentage'     => ['required', 'numeric'],
            'max_loss_percentage'     => ['required', 'numeric', 'gte:min_loss_percentage'],
            'is_active'               => ['nullable', 'boolean'],
        ]);

        $package = CopyTradingPackage::findOrFail($validated['copy_trading_package_id']);

        // Ensure loss_day <= duration_days of the template
        if ($validated['loss_day'] > $package->duration_days) {
            return back()
                ->withErrors(['loss_day' => 'Loss day must be between 1 and '.$package->duration_days])
                ->withInput();
        }

        $validated['copy_trader_id'] = $copyTrader->id;
        $validated['is_active']      = $request->boolean('is_active');

        CopyTraderPackage::updateOrCreate(
            [
                'copy_trader_id'          => $copyTrader->id,
                'copy_trading_package_id' => $validated['copy_trading_package_id'],
            ],
            $validated
        );

        return back()->with('success', 'Package configuration saved for trader.');
    }

    public function destroy(CopyTrader $copyTrader, CopyTraderPackage $copyTraderPackage)
    {
        // safety: ensure it belongs to this trader
        if ($copyTraderPackage->copy_trader_id !== $copyTrader->id) {
            abort(403);
        }

        $copyTraderPackage->delete();

        return back()->with('success', 'Package removed from trader.');
    }
}
