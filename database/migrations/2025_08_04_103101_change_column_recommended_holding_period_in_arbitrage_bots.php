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
        Schema::table('arbitrage_bots', function (Blueprint $table) {
            $table->string('recommended_holding_period')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('arbitrage_bots', function (Blueprint $table) {
            $table->string('recommended_holding_period')->nullable(false)->change();
        });
    }
};
