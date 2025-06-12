<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('likes')->insert([
            [
                'post_id' => 1, // Assuming post with ID 1 exists
                'user_id' => 1, // Assuming user with ID 1 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'post_id' => 1, // Assuming post with ID 1 exists
                'user_id' => 2, // Assuming user with ID 2 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'post_id' => 2, // Assuming post with ID 2 exists
                'user_id' => 1, // Assuming user with ID 1 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
