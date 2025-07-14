<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exchange;
use App\Models\TradingPair;
use App\Models\ArbitrageBot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ArbitrageController extends Controller
{

    public function index()
    {
        $bots = ArbitrageBot::all();
        return view('admin.pages.arbitrage.index', compact('bots'));
    }

    public function create()
    {
        try {
            $tradingPairs = TradingPair::where('exchange_id', 1)->get();
            $exchanges = Exchange::all();
            return view('admin.pages.arbitrage.create', compact('tradingPairs', 'exchanges'));
        } catch (\Throwable $e) {
            Log::error('ArbitrageController::create failed', ['msg' => $e->getMessage()]);
            return back()->with('danger', 'Failed to load create page.');
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'trading_pair_id'   => 'required|exists:trading_pairs,id',
                'exchange_from_id'  => 'required|exists:exchanges,id|different:exchange_to_id',
                'exchange_to_id'    => 'required|exists:exchanges,id',
                'category'          => 'required|in:USDT,COIN-M',
                'type'              => 'required|in:1,2',
                'spread_rate'       => 'required|numeric',
                'is_active'         => 'nullable',
            ]);

            $bot = ArbitrageBot::create([
                'trading_pair_id'   => $validated['trading_pair_id'],
                'exchange_from_id'  => $validated['exchange_from_id'],
                'exchange_to_id'    => $validated['exchange_to_id'],
                'category'          => $validated['category'],
                'type'              => $validated['type'],
                'spread_rate'       => $validated['spread_rate'],
                'is_active'         => $request->has('is_active'),
            ]);

            return redirect()->route('admin.arbitrage.configure', $bot->id)
                ->with('success', 'Bot created! Now set Fee Tiers and APR Intervals.');
        } catch (\Throwable $e) {
            Log::error('ArbitrageController::store failed', ['msg' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return back()->with('danger', 'Could not create bot. Please try again.')->withInput();
        }
    }

    public function configure($id)
    {
        try {
            $bot = ArbitrageBot::with(['fees', 'intervals'])->findOrFail($id);
            return view('admin.pages.arbitrage.configure', compact('bot'));
        } catch (\Throwable $e) {
            Log::error('ArbitrageController::configure failed', ['bot_id' => $id, 'msg' => $e->getMessage()]);
            return redirect()->route('admin.arbitrage.index')->with('danger', 'Could not load configuration page.');
        }
    }

    public function saveFees(Request $request, $id)
    {
        try {
            $bot = ArbitrageBot::findOrFail($id);

            $request->validate([
                'min_amount.*' => 'required|numeric|min:0',
                'max_amount.*' => 'nullable|numeric|min:0',
                'fee.*'        => 'required|numeric|min:0',
            ]);

            DB::transaction(function () use ($bot, $request) {
                $bot->fees()->delete();

                foreach ($request->min_amount as $index => $min) {
                    $bot->fees()->create([
                        'min_amount'     => $min,
                        'max_amount'     => $request->max_amount[$index] ?? null,
                        'fee_percentage' => $request->fee[$index],
                    ]);
                }
            });

            return back()->with('success', 'Fee tiers saved successfully!');
        } catch (\Throwable $e) {
            Log::error('ArbitrageController::saveFees failed', ['bot_id' => $id, 'msg' => $e->getMessage()]);
            return back()->with('danger', 'Failed to save fee tiers.')->withInput();
        }
    }

    public function saveInterval(Request $request, $id)
    {
        try {
            $bot = ArbitrageBot::findOrFail($id);

            $validated = $request->validate([
                'apr_3d'     => 'nullable|numeric|min:0',
                'apr_7d'     => 'nullable|numeric|min:0',
                'apr_30d'    => 'nullable|numeric|min:0',
                'starts_at'  => 'required|date',
                'ends_at'    => 'required|date|after:starts_at',
            ]);

            DB::transaction(function () use ($bot, $validated) {
                $bot->intervals()
                    ->where('is_active', true)
                    ->where('ends_at', '>=', $validated['starts_at'])
                    ->update(['is_active' => false]);

                $bot->intervals()->create([
                    'apr_3d'    => $validated['apr_3d'],
                    'apr_7d'    => $validated['apr_7d'],
                    'apr_30d'   => $validated['apr_30d'],
                    'starts_at' => $validated['starts_at'],
                    'ends_at'   => $validated['ends_at'],
                    'is_active' => true,
                ]);
            });

            return back()->with('success', 'APR interval saved & activated!');
        } catch (\Throwable $e) {
            Log::error('ArbitrageController::saveInterval failed', ['bot_id' => $id, 'msg' => $e->getMessage()]);
            return back()->with('danger', 'Failed to save APR interval.')->withInput();
        }
    }
}
