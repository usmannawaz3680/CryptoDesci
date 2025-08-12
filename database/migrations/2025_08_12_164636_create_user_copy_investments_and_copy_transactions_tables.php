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
        Schema::create('user_copy_investments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('copy_trader_id');
            $table->decimal('investment_amount', 15, 2); // Original amount invested
            $table->decimal('fee_percentage', 5, 2); // Fee % applied based on range
            $table->decimal('fee_amount', 15, 2); // Calculated fee deducted
            $table->decimal('net_investment', 15, 2); // Amount after fee deduction
            $table->decimal('min_profit_percentage', 5, 2); // Min daily profit % from range
            $table->decimal('max_profit_percentage', 5, 2); // Max daily profit % from range
            $table->dateTime('start_date')->default(now());
            $table->enum('status', ['active', 'closed', 'pending'])->default('pending');
            $table->integer('period_days')->after('start_date')->nullable()->comment('Duration of investment in days (e.g., 7, 10, 30)');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('copy_trader_id')->references('id')->on('copy_traders')->onDelete('cascade');
            $table->index('user_id');
            $table->index('copy_trader_id');
        });
        Schema::create('copy_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_investment_id');
            $table->enum('type', ['investment', 'fee', 'profit', 'withdrawal']);
            $table->decimal('amount', 15, 2); // Positive for investment/profit, negative for fee/withdrawal
            $table->decimal('profit_percentage', 5, 2)->nullable(); // For profit records
            $table->dateTime('transaction_date')->default(now());
            $table->timestamps();
            $table->foreign('user_investment_id')->references('id')->on('user_investments')->onDelete('cascade');
            $table->index('user_investment_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_copy_investments');
        Schema::dropIfExists('copy_transactions');
    }
};
