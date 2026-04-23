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
    Schema::create('cell_schedules', function (Blueprint $table) {
        $table->id();
        $table->string('cell_group_name'); // Contoh: "Cell Jireh" atau "Gen 2009"
        $table->date('meeting_date');
        $table->time('meeting_time');
        $table->string('location');
        $table->string('wa_link')->nullable(); // Link ke grup WA
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cell_schedules');
    }
};
