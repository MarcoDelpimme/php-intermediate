<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Testing\Fakes\Fake;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('product')->insert([
                'name' => fake()->name(),
                'price' => fake()->numberBetween(1, 100),
                'description' => fake()->text(50),
                'user_id' => rand(1, 10),
            ]);
        }
    }
}
