<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('arbitrage_bots', function (Blueprint $table) {
            $table->id();

            // Two different exchanges needed for arbitrage opportunity
            $table->foreignId('exchange_from_id')->constrained('exchanges')->onDelete('cascade');
            $table->foreignId('exchange_to_id')->constrained('exchanges')->onDelete('cascade');

            // The trading pair must exist on both exchanges (e.g., BTC/USDT)
            $table->foreignId('trading_pair_id')->constrained('trading_pairs')->onDelete('cascade');

            // Categories used to group bots (like USDT or COIN-M based)
            $table->enum('category', ['USDT', 'COIN-M']);

            // Type defines strategy: 1 = Sell first, 2 = Buy first
            $table->enum('type', [1, 2]);

            // Spread rate
            $table->decimal('spread_rate', 8,4);
            $table->string('recommended_holding_period');
            // Whether this bot is currently live or hidden from users
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arbitrage_bots');
    }
};
