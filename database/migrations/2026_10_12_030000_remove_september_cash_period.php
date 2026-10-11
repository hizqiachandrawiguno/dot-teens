<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Hapus tagihan & periode kas September jika ada di database
        if (Schema::hasTable('cash_periods')) {
            $septemberPeriodIds = DB::table('cash_periods')
                ->where('name', 'like', '%September%')
                ->pluck('id');

            if ($septemberPeriodIds->isNotEmpty()) {
                if (Schema::hasTable('cash_payments')) {
                    DB::table('cash_payments')
                        ->whereIn('cash_period_id', $septemberPeriodIds)
                        ->delete();
                }

                DB::table('cash_periods')
                    ->whereIn('id', $septemberPeriodIds)
                    ->delete();
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
