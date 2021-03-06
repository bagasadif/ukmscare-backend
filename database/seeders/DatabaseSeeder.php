<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([UkmSeeder::class]);
        $this->call([ArticleSeeder::class]);
        $this->call([UkmRegistDescriptionSeeder::class]);
        $this->call([UserSeeder::class]);
    }
}
