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
        Schema::create('arbitrage_fees', function (Blueprint $table) {
            $table->id();

            // Each fee range belongs to a specific arbitrage bot
            $table->foreignId('arbitrage_bot_id')->constrained()->onDelete('cascade');

            // Min/max investment range for this fee tier
            $table->decimal('min_amount', 12, 2);
            $table->decimal('max_amount', 12, 2)->nullable(); // null means "no upper limit"

            // Fee percentage for this range (e.g., 2.50%)
            $table->decimal('fee_percentage', 5, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arbitrage_fees');
    }
};
