<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExchangesTable extends Migration
{
    public function up(): void
    {
        Schema::create('exchanges', function (Blueprint $table) {
            $table->id();
            $table->string('coingecko_id')->unique(); // e.g., "binance"
            $table->string('name');                   // e.g., "Binance"
            $table->string('tv_prefix')->nullable();  // e.g., "BINANCE" (used in TradingView)
            $table->string('country')->nullable();    // optional
            $table->string('url')->nullable();        // optional
            $table->string('logo')->nullable();       // optional if you store logos later
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exchanges');
    }
}
