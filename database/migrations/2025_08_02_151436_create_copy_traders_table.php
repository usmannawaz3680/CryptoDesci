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
        Schema::create('copy_traders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->text('bio')->nullable();
            $table->enum('risk_level', ['low', 'medium', 'high']);
            $table->string('level');
            $table->string('trading_style')->nullable();
            $table->enum('status', ['active', 'inactive', 'suspended', 'full'])->nullable();
            $table->json('badges')->nullable();
            $table->integer('followers')->default(0);
            $table->integer('copiers')->default(rand(1001, 3024));
            $table->integer('trades');
            $table->integer('win_trades');
            $table->decimal('win_rate', 5, 2)->default(rand(10, 100));
            $table->decimal('total_aum', 5, 2);
            $table->decimal('roi', 5, 2);
            $table->decimal('pnl', 5, 2);
            $table->decimal('sharp_ratio', 5, 2);
            $table->decimal('mdd', 5, 2);
            $table->decimal('profit_sharing', 5, 2);
            $table->decimal('lead_balance', 5, 2);
            $table->decimal('min_copy_amount', 5, 2);
            $table->decimal('max_copy_amount', 5, 2);
            $table->dateTime('member_since')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('copy_traders');
    }
};
