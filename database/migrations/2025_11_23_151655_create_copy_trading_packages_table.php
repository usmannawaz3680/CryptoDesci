<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('copy_trading_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');                    // "3 Days", "7 Days", "30 Days"
            $table->string('key')->unique();          // "3d", "7d", "30d"
            $table->unsignedInteger('duration_days');  // e.g. 3, 7, 30
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('copy_trading_packages');
    }
};
