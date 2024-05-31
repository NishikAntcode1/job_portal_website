<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobTypes = [
            ['name' => 'Full Time', 'status' => 1],
            ['name' => 'Part Time', 'status' => 1],
            ['name' => 'Freelancer', 'status' => 1],
            ['name' => 'Remote', 'status' => 1],
            ['name' => 'Contract', 'status' => 1],
        ];

        DB::table('job_types')->insert($jobTypes);
    }
}
