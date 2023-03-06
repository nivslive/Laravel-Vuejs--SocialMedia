<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\ChatSeeder;
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
        \App\Models\User::factory(90)->create();
        \App\Models\Chat::factory(10)->create();
        \App\Models\Subject::factory(500)->create();
        \App\Models\Message::factory(1000)->create();
        \App\Models\Reaction::factory(1)->create();
    }
}
