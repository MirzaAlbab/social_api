<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        $faker = Faker::create();

        DB::table('posts')->insert([
            [
                'user_id' => 1, // Assuming user with ID 1 exists
                'title' => $faker->sentence,
                'content' => $faker->paragraph,
                'image_url' => $faker->imageUrl(),
                'user_id' => 1, // Assuming user with ID 1 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2, // Assuming user with ID 2 exists
                'title' => $faker->sentence,
                'content' => $faker->paragraph,
                'image_url' => $faker->imageUrl(),
                'user_id' => 2, // Assuming user with ID 2 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Schema::enableForeignKeyConstraints();


    }
}
