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
        if (!Schema::hasTable('activity_logs')) {
            Schema::create('activity_logs', function (Blueprint $table) {
                $table->id();
                $table->string('user_name');
                $table->string('role');
                $table->string('action');
                $table->text('description');
                $table->timestamps();
            });
        }

        if (Schema::hasTable('members') && !Schema::hasColumn('members', 'is_invited')) {
            Schema::table('members', function (Blueprint $table) {
                $table->boolean('is_invited')->default(false)->after('is_joined');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('members') && Schema::hasColumn('members', 'is_invited')) {
            Schema::table('members', function (Blueprint $table) {
                $table->dropColumn('is_invited');
            });
        }

        Schema::dropIfExists('activity_logs');
    }
};
