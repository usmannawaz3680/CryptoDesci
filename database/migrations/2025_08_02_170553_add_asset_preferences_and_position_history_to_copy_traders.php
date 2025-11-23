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
        Schema::table('copy_traders', function (Blueprint $table) {
            // Add asset_preferences column to store asset allocations as JSON
            $table->json('asset_preferences')->nullable()->default(null)->after('member_since')->comment('Stores asset allocations as {"asset": "BTC", "percentage": 32.7}, ...');

            // Add position_history column to store historical positions as JSON
            $table->json('position_history')->nullable()->default(null)->after('asset_preferences')->comment('Stores position history as [{"asset": "PENGUSDT", "type": "Cross Long", "open_date": "2025-08-02 11:19:09", "close_date": "2025-08-02 21:47:22", "entry_price": 0.033231, "close_price": 0.033869, "pnl": 14.90}, ...]');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('copy_traders', function (Blueprint $table) {
            $table->dropColumn('position_history');
            $table->dropColumn('asset_preferences');
        });
    }
};
