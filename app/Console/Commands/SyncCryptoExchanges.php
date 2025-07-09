<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Exchange;
use App\Models\TradingPair;

class SyncCryptoExchanges extends Command
{
    protected $signature = 'sync:crypto-exchanges';
    protected $description = 'Fetch and store exchanges and trading pairs from CoinGecko';

    public function handle(): void
    {
        $this->info("🔄 Fetching exchanges from CoinGecko...");

        $exchangeResponse = Http::get('https://api.coingecko.com/api/v3/exchanges');

        if (!$exchangeResponse->successful()) {
            $this->error("❌ Failed to fetch exchanges.");
            return;
        }

        $exchanges = $exchangeResponse->json();

        foreach (array_slice($exchanges, 0, 5) as $ex) { // Limit to top 5 for now
            $exchange = Exchange::updateOrCreate(
                ['coingecko_id' => $ex['id']],
                [
                    'name' => $ex['name'],
                    'country' => $ex['country'] ?? null,
                    'url' => $ex['url'] ?? null,
                    'tv_prefix' => strtoupper($ex['id']), // You may refine this later
                ]
            );

            $this->info("✅ Synced exchange: {$exchange->name}");

            // Fetch tickers (pairs) for the current exchange
            $tickersResponse = Http::get("https://api.coingecko.com/api/v3/exchanges/{$ex['id']}");

            if (!$tickersResponse->successful()) {
                $this->warn("⚠️ Failed to fetch tickers for exchange: {$ex['id']}");
                continue;
            }

            $tickers = $tickersResponse->json('tickers');

            $storedCount = 0;
            foreach ($tickers as $ticker) {
                $base = strtoupper($ticker['base'] ?? '');
                $target = strtoupper($ticker['target'] ?? '');

                // Sanity checks
                if (empty($base) || empty($target)) {
                    $this->warn("⚠️ Skipping ticker with missing base or target.");
                    continue;
                }

                if (!preg_match('/^[A-Z0-9]{2,10}$/', $base) || !preg_match('/^[A-Z0-9]{2,10}$/', $target)) {
                    $this->warn("⚠️ Skipping invalid pair format: {$base}/{$target}");
                    continue;
                }

                if (!$exchange->id) {
                    $this->error("❌ Exchange ID is null for {$exchange->name}");
                    continue;
                }

                $tvSymbol = $exchange->tv_prefix . ':' . $base . $target;

                try {
                    TradingPair::updateOrCreate(
                        [
                            'exchange_id' => $exchange->id,
                            'base_asset' => $base,
                            'quote_asset' => $target
                        ],
                        [
                            'tv_symbol' => $tvSymbol
                        ]
                    );

                    $storedCount++;
                } catch (\Exception $e) {
                    $this->error("❌ Failed to save pair {$base}/{$target}: " . $e->getMessage());
                }
            }



            $this->info("🔁 Stored {$storedCount} trading pairs for: {$exchange->name}");
        }

        $this->info("🎉 Sync complete!");
    }
}
