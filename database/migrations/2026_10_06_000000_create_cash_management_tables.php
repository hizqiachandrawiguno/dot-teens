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
        // 1. Tabel Master Pengerja / Volunteer Kas
        if (!Schema::hasTable('cash_volunteers')) {
            Schema::create('cash_volunteers', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
                $table->string('name');
                $table->string('phone', 30);
                $table->string('division', 100)->default('Pengerja / Volunteer');
                $table->unsignedInteger('monthly_due')->default(10000);
                $table->boolean('is_active')->default(true);
                $table->text('notes')->nullable();
                $table->timestamps();
            });
        }

        // 2. Tabel Periode Kas (contoh: Oktober 2026, November 2026)
        if (!Schema::hasTable('cash_periods')) {
            Schema::create('cash_periods', function (Blueprint $table) {
                $table->id();
                $table->string('name', 100);
                $table->unsignedInteger('amount')->default(10000);
                $table->date('due_date')->nullable();
                $table->boolean('is_active')->default(true);
                $table->string('description')->nullable();
                $table->timestamps();
            });
        }

        // 3. Tabel Pembayaran Kas oleh Pengerja
        if (!Schema::hasTable('cash_payments')) {
            Schema::create('cash_payments', function (Blueprint $table) {
                $table->id();
                $table->foreignId('cash_volunteer_id')->constrained('cash_volunteers')->cascadeOnDelete();
                $table->foreignId('cash_period_id')->constrained('cash_periods')->cascadeOnDelete();
                $table->unsignedInteger('amount_paid');
                $table->date('paid_at');
                $table->string('payment_method', 30)->default('cash'); // cash / transfer
                $table->string('proof_image')->nullable();
                $table->text('notes')->nullable();
                $table->string('recorded_by')->default('Bendahara');
                $table->timestamps();

                $table->unique(['cash_volunteer_id', 'cash_period_id']);
            });
        }

        // 4. Tabel Pengeluaran Kas (Buku Kas Keluar)
        if (!Schema::hasTable('cash_expenses')) {
            Schema::create('cash_expenses', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->unsignedInteger('amount');
                $table->date('expense_date');
                $table->string('category', 100)->default('Operasional'); // Konsumsi, Perlengkapan, Diakonia, dll
                $table->text('notes')->nullable();
                $table->string('receipt_image')->nullable();
                $table->string('recorded_by')->default('Bendahara');
                $table->timestamps();
            });
        }

        // 5. Tabel Pengaturan Kas (Info Rekening, Template WA)
        if (!Schema::hasTable('cash_settings')) {
            Schema::create('cash_settings', function (Blueprint $table) {
                $table->id();
                $table->string('key')->unique();
                $table->text('value')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_expenses');
        Schema::dropIfExists('cash_payments');
        Schema::dropIfExists('cash_periods');
        Schema::dropIfExists('cash_volunteers');
        Schema::dropIfExists('cash_settings');
    }
};
