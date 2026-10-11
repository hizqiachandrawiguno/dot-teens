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
        // 1. Pastikan kolom is_popup ada di events
        if (Schema::hasTable('events') && !Schema::hasColumn('events', 'is_popup')) {
            Schema::table('events', function (Blueprint $table) {
                $table->boolean('is_popup')->default(false)->after('image');
            });
        }

        // 2. Nonaktifkan popup banner DRN 5.0 / Revival Night sesuai permintaan user
        if (Schema::hasTable('events')) {
            DB::table('events')
                ->where(function($q) {
                    $q->where('title', 'like', '%Revival%')
                      ->orWhere('title', 'like', '%DRN%');
                })
                ->update(['is_popup' => false]);
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
