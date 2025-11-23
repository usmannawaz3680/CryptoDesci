<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user_copy_investments', function (Blueprint $table) {
            if (!Schema::hasColumn('user_copy_investments', 'mode')) {
                // 'fixed_ratio' or 'fixed_amount'
                $table->string('mode')->default('fixed_ratio')->after('copy_trader_id');
            }

            if (!Schema::hasColumn('user_copy_investments', 'copy_amount')) {
                // Total capital user locks for fixed-amount mode
                $table->decimal('copy_amount', 18, 8)->nullable()->after('investment_amount');
            }

            if (!Schema::hasColumn('user_copy_investments', 'cost_per_order')) {
                // Per-day (per "order") base amount for PnL in fixed-amount mode
                $table->decimal('cost_per_order', 18, 8)->nullable()->after('copy_amount');
            }

            if (!Schema::hasColumn('user_copy_investments', 'period_days')) {
                // Duration user picks (used for both modes)
                $table->unsignedInteger('period_days')->nullable()->change();
            }
        });
    }

    public function down(): void
    {
        Schema::table('user_copy_investments', function (Blueprint $table) {
            if (Schema::hasColumn('user_copy_investments', 'mode')) {
                $table->dropColumn('mode');
            }
            if (Schema::hasColumn('user_copy_investments', 'copy_amount')) {
                $table->dropColumn('copy_amount');
            }
            if (Schema::hasColumn('user_copy_investments', 'cost_per_order')) {
                $table->dropColumn('cost_per_order');
            }
        });
    }
};
