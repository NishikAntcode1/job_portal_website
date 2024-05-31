<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['name' => 'Programming'],
            ['name' => 'Web Development'],
            ['name' => 'Software Engineering'],
            ['name' => 'Data Science'],
            ['name' => 'Machine Learning'],
            ['name' => 'Artificial Intelligence'],
            ['name' => 'Design'],
            ['name' => 'Marketing'],
            ['name' => 'Finance'],
            ['name' => 'Business'],
            ['name' => 'Sales'],
            ['name' => 'Customer Service'],
            ['name' => 'Human Resources'],
            ['name' => 'Project Management'],
            ['name' => 'Healthcare'],
            ['name' => 'Education'],
            ['name' => 'Hospitality'],
            ['name' => 'Retail'],
            ['name' => 'Transportation'],
            ['name' => 'Construction'],
        ];

        DB::table('tags')->insert($tags);
    }
}
