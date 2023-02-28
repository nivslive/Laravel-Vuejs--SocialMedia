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
        $this->call([ChatSeeder::class]);
        \App\Models\User::factory(2)->create();
        \App\Models\Chat::factory(8)->create();
        \App\Models\Subject::factory(20)->create();
        \App\Models\Message::factory(500)->create();
        \App\Models\Reaction::factory(1)->create();
    }
}
