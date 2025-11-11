<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('arbitrage_intervals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('arbitrage_bot_id')->constrained()->onDelete('cascade');

            $table->decimal('apr_3d', 5, 2)->nullable();
            $table->decimal('apr_7d', 5, 2)->nullable();
            $table->decimal('apr_30d', 5, 2)->nullable();
            $table->decimal('next_funding_rate', 5, 2)->nullable();
            $table->dateTime('ends_at')->nullable();

            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arbitrage_intervals');
    }
};
