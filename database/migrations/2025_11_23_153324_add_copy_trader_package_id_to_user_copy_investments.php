<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('user_copy_investments', function (Blueprint $table) {
            if (!Schema::hasColumn('user_copy_investments', 'copy_trader_package_id')) {
                $table->unsignedBigInteger('copy_trader_package_id')
                    ->nullable()
                    ->after('copy_trader_id');

                $table->foreign('copy_trader_package_id')
                    ->references('id')
                    ->on('copy_trader_packages')
                    ->onDelete('set null');
            }
        });
    }

    public function down(): void
    {
        Schema::table('user_copy_investments', function (Blueprint $table) {
            if (Schema::hasColumn('user_copy_investments', 'copy_trader_package_id')) {
                $table->dropForeign(['copy_trader_package_id']);
                $table->dropColumn('copy_trader_package_id');
            }
        });
    }
};
