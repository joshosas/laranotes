<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Note;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 10 users
        // User::factory(10)->create();

        // Create 100 notes, each linked to a random user
        // Note::factory(100)->create();
    }
}
