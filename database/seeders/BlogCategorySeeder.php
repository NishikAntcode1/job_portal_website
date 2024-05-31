<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Web Design', 'slug' => 'software-development', 'status' => 1],
            ['name' => 'Job Tips', 'slug' => 'web-development', 'status' => 1],
            ['name' => 'UX Design', 'slug' => 'data-science', 'status' => 1],
            ['name' => 'Tips & Tricks', 'slug' => 'ui-ux-design', 'status' => 1],
            ['name' => 'Writting', 'slug' => 'digital-marketing', 'status' => 1],
            ['name' => 'Business', 'slug' => 'project-management', 'status' => 1]
        ];

        DB::table('blog_categories')->insert($categories);
    }
}
