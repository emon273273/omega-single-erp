<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EmonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'title' => Str::random(20),
                'author' => Str::random(15),
                'isbn' => '978-' . rand(1000000000, 9999999999),
                'description' => Str::random(100),
                'published_at' => Carbon::now()->subYears(rand(1, 20))->format('Y-m-d'),
                'genre' => Str::random(10),
                'pages' => rand(50, 1000),
            ],
            [
                'title' => Str::random(20),
                'author' => Str::random(15),
                'isbn' => '978-' . rand(1000000000, 9999999999),
                'description' => Str::random(100),
                'published_at' => Carbon::now()->subYears(rand(1, 20))->format('Y-m-d'),
                'genre' => Str::random(10),
                'pages' => rand(50, 1000),
            ],
            [
                'title' => Str::random(20),
                'author' => Str::random(15),
                'isbn' => '978-' . rand(1000000000, 9999999999),
                'description' => Str::random(100),
                'published_at' => Carbon::now()->subYears(rand(1, 20))->format('Y-m-d'),
                'genre' => Str::random(10),
                'pages' => rand(50, 1000),
            ],
        ]);
    }
}
