<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as Faker;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        $faker = Faker::create();

        DB::table('comments')->insert([
            [
                'content' => $faker->sentence,
                'post_id' => 1, // Assuming post with ID 1 exists
                'user_id' => 1, // Assuming user with ID 1 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'content' => $faker->sentence,
                'post_id' => 1, // Assuming post with ID 1 exists
                'user_id' => 2, // Assuming user with ID 2 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'content' => $faker->sentence,
                'post_id' => 2, // Assuming post with ID 2 exists
                'user_id' => 1, // Assuming user with ID 1 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
