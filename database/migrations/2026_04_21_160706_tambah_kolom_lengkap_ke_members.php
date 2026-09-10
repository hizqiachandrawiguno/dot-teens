<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            if (!Schema::hasColumn('members', 'fire_cell')) {
                $table->string('fire_cell')->nullable();
            }
            if (!Schema::hasColumn('members', 'hobby')) {
                $table->string('hobby')->nullable();
            }
            if (!Schema::hasColumn('members', 'instagram')) {
                $table->string('instagram')->nullable();
            }
            if (!Schema::hasColumn('members', 'email')) {
                $table->string('email')->nullable();
            }
            if (!Schema::hasColumn('members', 'parent_name')) {
                $table->string('parent_name')->nullable();
            }
            if (!Schema::hasColumn('members', 'parent_phone')) {
                $table->string('parent_phone')->nullable();
            }
            if (!Schema::hasColumn('members', 'school')) {
                $table->string('school')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            //
        });
    }
};
