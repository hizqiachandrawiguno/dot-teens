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
        // 1. Tambah kolom weeks_count di cash_periods
        if (Schema::hasTable('cash_periods') && !Schema::hasColumn('cash_periods', 'weeks_count')) {
            Schema::table('cash_periods', function (Blueprint $table) {
                $table->unsignedTinyInteger('weeks_count')->default(4)->after('amount');
            });
        }

        // 2. Tambah kolom member_id di cash_volunteers untuk relasi ke tabel members (anak-anak DOT)
        if (Schema::hasTable('cash_volunteers') && !Schema::hasColumn('cash_volunteers', 'member_id')) {
            Schema::table('cash_volunteers', function (Blueprint $table) {
                $table->foreignId('member_id')->nullable()->after('user_id')->constrained('members')->nullOnDelete();
            });
        }

        // 3. Update nominal periode lama (jika masih 10.000) agar sesuai aturan 5.000/minggu
        if (Schema::hasTable('cash_periods')) {
            // Periode default 4 minggu -> 20.000
            DB::table('cash_periods')
                ->where('amount', 10000)
                ->where(function ($query) {
                    $query->where('name', 'like', '%September%')
                          ->orWhere('name', 'like', '%Oktober%');
                })
                ->update(['amount' => 20000, 'weeks_count' => 4]);

            // Periode default 5 minggu -> 25.000
            DB::table('cash_periods')
                ->where('name', 'like', '%November%')
                ->where('amount', 10000)
                ->update(['amount' => 25000, 'weeks_count' => 5]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('cash_volunteers') && Schema::hasColumn('cash_volunteers', 'member_id')) {
            Schema::table('cash_volunteers', function (Blueprint $table) {
                $table->dropForeign(['member_id']);
                $table->dropColumn('member_id');
            });
        }

        if (Schema::hasTable('cash_periods') && Schema::hasColumn('cash_periods', 'weeks_count')) {
            Schema::table('cash_periods', function (Blueprint $table) {
                $table->dropColumn('weeks_count');
            });
        }
    }
};
