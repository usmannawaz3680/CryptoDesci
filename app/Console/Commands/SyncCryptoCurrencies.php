<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\CryptoCurrency;

class SyncCryptoCurrencies extends Command
{
    protected $signature = 'sync:crypto-currencies {--limit=100 : Number of top coins to fetch}';
    protected $description = 'Fetch and store top cryptocurrencies from CoinGecko';

    public function handle(): void
    {
        $limit = (int) $this->option('limit');
        $this->info("🔄 Fetching top {$limit} cryptocurrencies from CoinGecko...");

        try {
            // Fetch top coins by market cap
            $response = Http::get('https://api.coingecko.com/api/v3/coins/markets', [
                'vs_currency' => 'usd',
                'order' => 'market_cap_desc',
                'per_page' => $limit,
                'page' => 1,
                'sparkline' => false,
            ]);

            if (!$response->successful()) {
                $this->error("❌ Failed to fetch top coins: " . $response->status());
                Log::error('Failed to fetch top coins from CoinGecko', ['status' => $response->status()]);
                return;
            }

            $coins = $response->json();
            $this->info("📋 Found " . count($coins) . " cryptocurrencies.");

            $storedCount = 0;
            $updatedCount = 0;

            // Process coins in a transaction
            DB::transaction(function () use ($coins, &$storedCount, &$updatedCount) {
                foreach ($coins as $index => $coin) {
                    if (empty($coin['id']) || empty($coin['name']) || empty($coin['symbol'])) {
                        $this->warn("⚠️ Skipping coin at index {$index}: Missing required fields");
                        Log::warning('Invalid coin data', ['coin' => $coin]);
                        continue;
                    }

                    $this->info("🔍 Processing {$coin['name']} ({$coin['symbol']}) - " . ($index + 1) . "/{$this->option('limit')}");

                    // Retry logic for rate limits
                    $maxRetries = 3;
                    $retryCount = 0;

                    while ($retryCount < $maxRetries) {
                        try {
                            if ($index > 0) {
                                $this->info("⏱️ Waiting to respect API rate limits...");
                                sleep(2); // CoinGecko free tier: ~10-50 calls/min
                            }

                            $coinDetailsResponse = Http::get("https://api.coingecko.com/api/v3/coins/{$coin['id']}", [
                                'localization' => false,
                                'tickers' => false,
                                'market_data' => false,
                                'community_data' => false,
                                'developer_data' => false,
                            ]);

                            if ($coinDetailsResponse->status() === 429) {
                                $this->info("🕒 Rate limit hit. Waiting 60 seconds before retrying...");
                                sleep(60);
                                $retryCount++;
                                continue;
                            }

                            if (!$coinDetailsResponse->successful()) {
                                $this->warn("⚠️ Failed to fetch details for {$coin['name']}: " . $coinDetailsResponse->status());
                                Log::warning("Failed to fetch details for {$coin['name']}", ['status' => $coinDetailsResponse->status()]);
                                break;
                            }

                            $coinDetails = $coinDetailsResponse->json();
                            $logoUrl = $coinDetails['image']['large'] ?? null;

                            // Create or update the cryptocurrency record
                            $crypto = CryptoCurrency::updateOrCreate(
                                ['coingecko_id' => $coin['id']],
                                [
                                    'name' => $coin['name'],
                                    'symbol' => strtoupper($coin['symbol']),
                                    'logo_url' => $logoUrl,
                                    'is_active' => true,
                                ]
                            );

                            if ($crypto->wasRecentlyCreated) {
                                $storedCount++;
                            } else {
                                $updatedCount++;
                            }

                            $this->info("✅ Successfully processed {$coin['name']}");
                            break; // Exit retry loop on success
                        } catch (\Exception $e) {
                            $this->error("❌ Error processing {$coin['name']}: " . $e->getMessage());
                            Log::error("Error processing {$coin['name']}", ['error' => $e->getMessage()]);
                            break;
                        }
                    }
                }
            });

            $this->info("✅ Stored {$storedCount} new cryptocurrencies.");
            $this->info("🔄 Updated {$updatedCount} existing cryptocurrencies.");
            $this->info("🎉 Sync complete!");
        } catch (\Exception $e) {
            $this->error("❌ An error occurred: " . $e->getMessage());
            Log::error('SyncCryptoCurrencies command failed', ['error' => $e->getMessage()]);
        }
    }
}