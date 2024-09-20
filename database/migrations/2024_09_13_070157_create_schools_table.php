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
        $table->string('name');
        $table->enum('type', ['primary', 'secondary']);
        $table->enum('category', ['girls', 'boys', 'mixed'])->nullable();
        $table->string('NEMIS_IUC')->unique();
        $table->string('school_reg_number')->unique();
        $table->string('KNEC_reg_number')->unique();
        $table->string('TSC_reg_number')->unique();
        $table->string('KRA_reg_number')->unique();
        $table->integer('govt_teachers_count');
        $table->integer('bom_teachers_count');
        $table->integer('students_count');
        $table->integer('class_count');
        $table->integer('digischool_tablets_count');
        $table->integer('laptops_count');
        $table->timestamps();

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
