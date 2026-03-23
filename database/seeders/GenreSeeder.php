<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create(['name' => 'Non-fiction']);
        Genre::create(['name' => 'Fiction']);
        Genre::create(['name' => 'Software Development']);
        Genre::create(['name' => 'Web Development']);
        Genre::create(['name' => 'Fantasy']);
        Genre::create(['name' => 'Adventure']);
        Genre::create(['name' => 'Mystery']);
    }
}
