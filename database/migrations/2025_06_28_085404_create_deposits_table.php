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
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('asset_coin_id')->constrained('asset_coins')->onDelete('cascade');
            $table->decimal('amount', 20, 8)->default(0.00000000);
            $table->string('network', 32)->nullable();
            $table->string('trx_id', 76)->unique();
            $table->string('from_address', 76)->nullable();
            $table->string('receipt_img')->nullable();
            $table->string('status', 32)->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deposits');
    }
};
