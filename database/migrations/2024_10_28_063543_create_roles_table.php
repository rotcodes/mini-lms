<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Role name, e.g., 'student', 'teacher', 'admin'
            $table->timestamps();
        });

        // Optionally, you can seed the initial roles in this migration.
        // DB::table('roles')->insert([
        //     ['id' => 1, 'name' => 'admin'],
        //     ['id' => 2, 'name' => 'teacher'],
        //     ['id' => 3, 'name' => 'student'],
        // ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
