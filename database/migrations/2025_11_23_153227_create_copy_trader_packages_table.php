<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('copy_trader_packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('copy_trader_id');
            $table->unsignedBigInteger('copy_trading_package_id');

            // Per-trader configuration
            $table->unsignedInteger('loss_day');                 // 1..duration_days
            $table->decimal('min_loss_percentage', 5, 2);        // e.g. 1.00
            $table->decimal('max_loss_percentage', 5, 2);        // e.g. 5.00
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->foreign('copy_trader_id')
                ->references('id')
                ->on('copy_traders')
                ->onDelete('cascade');

            $table->foreign('copy_trading_package_id')
                ->references('id')
                ->on('copy_trading_packages')
                ->onDelete('cascade');

            $table->unique(['copy_trader_id', 'copy_trading_package_id'], 'copy_trader_package_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('copy_trader_packages');
    }
};
