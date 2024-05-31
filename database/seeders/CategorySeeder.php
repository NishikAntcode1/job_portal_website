<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Administrative & Office Support', 'slug' => Str::slug('Administrative & Office Support'), 'icon' => 'flaticon-employee', 'status' => 1],
            ['name' => 'Finance & Accounting', 'slug' => Str::slug('Finance & Accounting'), 'icon' => 'flaticon-accounting', 'status' => 1],
            ['name' => 'Engineering', 'slug' => Str::slug('Engineering'), 'icon' => 'flaticon-worker', 'status' => 1],
            ['name' => 'Healthcare & Medical', 'slug' => Str::slug('Healthcare & Medical'), 'icon' => 'flaticon-heart', 'status' => 1],
            ['name' => 'Information Technology', 'slug' => Str::slug('Information Technology'), 'icon' => 'flaticon-computer', 'status' => 1],
            ['name' => 'Sales & Marketing', 'slug' => Str::slug('Sales & Marketing'), 'icon' => 'flaticon-employee', 'status' => 1],
            ['name' => 'Customer Service', 'slug' => Str::slug('Customer Service'), 'icon' => 'flaticon-discussion', 'status' => 1],
            ['name' => 'Human Resources', 'slug' => Str::slug('Human Resources'), 'icon' => 'flaticon-consultation', 'status' => 1],
            ['name' => 'Manufacturing & Production', 'slug' => Str::slug('Manufacturing & Production'), 'icon' => 'flaticon-wrench-and-screwdriver-in-cross', 'status' => 1],
            ['name' => 'Logistics & Supply Chain', 'slug' => Str::slug('Logistics & Supply Chain'), 'icon' => 'flaticon-group', 'status' => 1],
            ['name' => 'Others', 'slug' => Str::slug('Others'), 'icon' => 'flaticon-portfolio', 'status' => 1],
        ];

        DB::table('categories')->insert($categories);
    }
}
