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
            $table->string('county');
            $table->string('sub_county');
            $table->string('constituency');
            $table->string('name');
            $table->string('tsc_registration_number');
            $table->string('kra_pin');
            $table->string('nemis_number');
            $table->integer('number_of_students');
            $table->integer('number_of_teachers');
            $table->string('school_phone', 15);
            $table->string('school_logo')->nullable();
            $table->json('documents')->nullable();
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
