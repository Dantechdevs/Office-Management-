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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Add the name column
            $table->string('record_file')->default('')->nullable(); // Set default value
            $table->string('description')->nullable(); // Optional description
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('records', function (Blueprint $table) {
            // Check if the column exists before trying to drop it
            if (Schema::hasColumn('records', 'name')) {
                $table->dropColumn('name');
            }
        });

        // Drop the records table
        Schema::dropIfExists('records');
    }
};
