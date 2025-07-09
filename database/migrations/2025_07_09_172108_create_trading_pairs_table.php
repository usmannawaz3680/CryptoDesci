<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradingPairsTable extends Migration
{
    public function up(): void
    {
        Schema::create('trading_pairs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exchange_id')->constrained('exchanges')->onDelete('cascade');
            $table->string('base_asset');   // e.g., "BTC"
            $table->string('quote_asset');  // e.g., "USDT"
            $table->string('tv_symbol');    // e.g., "BINANCE:BTCUSDT"
            $table->timestamps();

            $table->unique(['exchange_id', 'base_asset', 'quote_asset'], 'unique_pair_per_exchange');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trading_pairs');
    }
}
