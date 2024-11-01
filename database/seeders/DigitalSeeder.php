<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DigitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('digitals')->insert([
            ['device_type' => 'Teacher Device'],
            ['device_type' => 'Learner Device'],
            ['device_type' => 'Hard Disk Drive'],
            ['device_type' => 'Router'],
            ['device_type' => 'Projector'],
        ]);
    }
}
