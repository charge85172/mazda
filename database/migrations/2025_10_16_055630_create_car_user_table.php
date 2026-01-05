<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // The table name 'car_user' follows Laravel's convention for pivot tables
        // (singular model names in alphabetical order).
        Schema::create('car_user', function (Blueprint $table) {
            $table->id(); // Primary key for the pivot entry itself.

            // Foreign key for the user.
            // 'constrained' automatically links it to the 'id' on the 'users' table.
            // 'onDelete('cascade')' means if a user is deleted, jejich entries here are also removed.
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Foreign key for the car.
            $table->foreignId('car_id')->constrained()->onDelete('cascade');

            // Your custom columns for the relationship
            $table->boolean('is_project_car')->default(false);
            $table->text('notes')->nullable(); // 'nullable' allows this field to be empty.

            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns.

            // Optional: Ensure that a user can only have a specific car once.
            $table->unique(['user_id', 'car_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_user');
    }
};
