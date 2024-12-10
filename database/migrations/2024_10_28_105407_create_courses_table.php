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
        Schema::create('courses', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('label_id')->constrained('course_labels')->cascadeOnDelete();
            $table->foreignId('instructor_id')->constrained('instructors')->cascadeOnDelete();
            $table->string('courseTitle'); // Non-nullable by default
            $table->string('image'); // Non-nullable by default
            $table->decimal('price', 8, 2); // Price with two decimal precision
            $table->time('courseDuration'); // Duration in hh:mm:ss format
            $table->text('overview'); // Non-nullable overview
            $table->text('desc'); // Non-nullable description
            $table->timestamps(); // created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
