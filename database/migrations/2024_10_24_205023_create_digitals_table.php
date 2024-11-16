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
        Schema::create('digitals', function (Blueprint $table) {

            $table->id(); // Auto-incrementing ID
            $table->string('sn')->unique(); // Serial Number
            $table->string('county'); // County
            $table->string('sub_county'); // Sub County
            $table->string('zone'); // Zone
            $table->string('school_name'); // School Name
            $table->date('date_of_delivery'); // Date of Delivery
            $table->integer('teacher_devices')->default(0); // Teacher Devices
            $table->integer('learner_devices')->default(0); // Learner Devices
            $table->integer('hard_disk_drives')->default(0); // Hard Disk Drives
            $table->integer('router')->default(0); // Router
            $table->integer('projector')->default(0); // Projector
            $table->string('device_type'); // Add this line for device type
            $table->timestamps(); // Created at and Updated at timestamps

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('digitals');
    }
};
