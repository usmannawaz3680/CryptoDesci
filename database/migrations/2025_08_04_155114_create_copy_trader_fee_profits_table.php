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
        Schema::create('copy_trader_fee_profit_ranges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('copy_trader_id');
            $table->decimal('min_amount', 15, 2); // e.g., 0
            $table->decimal('max_amount', 15, 2); // e.g., 1000
            $table->decimal('fee_percentage', 5, 2); // e.g., 2.3
            $table->decimal('min_profit_percentage', 5, 2); // e.g., 3.0
            $table->decimal('max_profit_percentage', 5, 2); // e.g., 5.0
            $table->timestamps();
            $table->foreign('copy_trader_id')->references('id')->on('copy_traders')->onDelete('cascade');
            $table->index('copy_trader_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('copy_trader_fee_profits');
    }
};
