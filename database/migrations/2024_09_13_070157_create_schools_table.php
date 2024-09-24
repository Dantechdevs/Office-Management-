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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('county');
            $table->string('sub_county');
            $table->string('constituency')->nullable();
            $table->string('name');
            $table->string('school_logo')->nullable(); // Path to the school logo
            $table->string('tsc_registration_number')->unique();
            $table->string('kra_pin')->unique();
            $table->string('nemis_number')->unique();
            $table->string('school_type'); // e.g., Boarding, Day/Boarding, Day School
            $table->string('gender_classification'); // e.g., Boys School, Girls School, Mixed School
            $table->string('religion_sponsorship'); // e.g., Catholic, A.I.C, S.D.A, etc.
            $table->integer('number_of_students')->nullable();
            $table->integer('number_of_teachers')->nullable();
            $table->string('school_zone'); // e.g., Mulala, Ithumba, etc.
            $table->string('school_phone')->nullable();
            $table->string('chat_message')->nullable(); // Short message or chat point
            $table->timestamps(); // Created at and updated at timestamps
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
