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
        if (!Schema::hasTable('cash_inflows')) {
            Schema::create('cash_inflows', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('category', 50)->default('dana_usaha'); // dana_usaha, janji_iman, donatur, lain_lain
                $table->unsignedBigInteger('amount');
                $table->date('received_date');
                $table->string('payer_name')->nullable();
                $table->string('phone', 30)->nullable();
                $table->string('payment_method', 30)->default('transfer'); // transfer, cash, qris
                $table->text('notes')->nullable();
                $table->string('proof_image')->nullable();
                $table->string('recorded_by')->default('Bendahara');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_inflows');
    }
};
