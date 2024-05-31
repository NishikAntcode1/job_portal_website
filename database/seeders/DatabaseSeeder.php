<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            AdminUserSeeder::class,
            CategorySeeder::class,
            TagSeeder::class,
            CompanySeeder::class,
            BlogCategorySeeder::class,
            JobTypeSeeder::class
        ]);

        // $this->call(CategorySeeder::class);
        // $this->call(JobTypeSeeder::class);
        // $this->call(TagSeeder::class);
        // $this->call(CompanySeeder::class);
        // $this->call(BlogCategorySeeder::class);
        // Job::factory(25)->create();

    }
}
