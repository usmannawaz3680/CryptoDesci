<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CopyTradingPackage;
use Illuminate\Http\Request;

class CopyTradingPackageController extends Controller
{
    public function index()
    {
        $packages = CopyTradingPackage::orderBy('duration_days')->get();

        return view('admin.pages.copy-trading-packages.index', compact('packages'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'key'           => ['required', 'string', 'max:50', 'unique:copy_trading_packages,key'],
            'duration_days' => ['required', 'integer', 'min:1'],
            'is_active'     => ['nullable', 'boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        CopyTradingPackage::create($validated);

        return back()->with('success', 'Package template created successfully.');
    }

    public function destroy(CopyTradingPackage $copyTradingPackage)
    {
        $copyTradingPackage->delete();

        return back()->with('success', 'Package template deleted successfully.');
    }
}
