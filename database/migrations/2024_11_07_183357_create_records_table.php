<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name column
            $table->string('record_file')->default('')->nullable(); // Record file column
            $table->string('description')->nullable(); // Optional description
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('records');
    }
};


