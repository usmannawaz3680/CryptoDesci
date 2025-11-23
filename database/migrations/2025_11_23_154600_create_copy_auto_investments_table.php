<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('copy_auto_investments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('copy_trader_id');

            // Amount used for each auto-created subscription
            $table->decimal('amount', 18, 8);

            // 'everyday', '7d', '14d', '30d', etc.
            $table->string('frequency');

            // 'active', 'paused', 'cancelled'
            $table->string('status')->default('active');

            // For cron later
            $table->timestamp('last_run_at')->nullable();
            $table->timestamp('next_run_at')->nullable();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('copy_trader_id')->references('id')->on('copy_traders')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('copy_auto_investments');
    }
};
