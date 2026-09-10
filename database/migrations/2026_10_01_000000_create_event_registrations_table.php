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
        if (!Schema::hasTable('event_registrations')) {
            Schema::create('event_registrations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('event_id')->constrained('events')->onDelete('cascade');
                $table->string('ticket_code', 30)->unique()->index();
                $table->string('name');
                $table->string('phone');
                $table->string('email')->nullable();
                $table->string('category')->default('SMP');
                $table->string('origin')->nullable();
                $table->string('status', 20)->default('registered'); // registered, attended, cancelled
                $table->timestamp('attended_at')->nullable();
                $table->string('scanned_by')->nullable();
                $table->text('notes')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_registrations');
    }
};
