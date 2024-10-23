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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_name');
            $table->string('tsc_no')->unique(); // TSC Number
            $table->string('email')->unique(); // Email
            $table->string('phone')->nullable(); // Phone number
            $table->string('alternate_phone')->nullable(); // Alternate phone number
            $table->text('address')->nullable(); // Address
            $table->enum('gender', ['male', 'female', 'other'])->nullable(); // Gender
            $table->date('dob')->nullable(); // Date of Birth
            $table->string('teacher_photo')->nullable(); // For storing photo file path
            $table->enum('status', ['active', 'inactive'])->default('active'); // Status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
