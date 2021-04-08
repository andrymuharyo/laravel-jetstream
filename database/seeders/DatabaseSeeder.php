<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Navigation
        //\App\Models\Navigation::factory(10)->create();

        // Content
        //\App\Models\Content::factory(5)->create();

        // Article
        //\App\Models\Article::factory(100)->create();

        // Standalone
        \App\Models\Standalone::factory(1)->create();
    }
}
