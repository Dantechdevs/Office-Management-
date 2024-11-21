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
        Schema::create('secondary_schools', function (Blueprint $table) {
            $table->id();
            $table->string('county'); // County
            $table->string('subcounty'); // Subcounty (changed from sub_county)
            $table->string('constituency'); // Constituency
            $table->string('name'); // School Name
            $table->string('knec_code'); // KNEC Code
            $table->string('tsc_registration_number'); // TSC Registration Number
            $table->string('school_phone', 15); // School Contact Numbers
            $table->string('zone'); // Zone
            $table->string('kra_pin')->nullable(); // KRA PIN (if needed)
            $table->string('nemis_number')->nullable(); // NEMIS Number (if needed)
            $table->integer('number_of_students')->nullable(); // Number of Students
            $table->integer('number_of_teachers')->nullable(); // Number of Teachers
            $table->string('school_logo')->nullable(); // School Logo
            $table->json('documents')->nullable(); // Documents
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secondary_schools');
    }
};
