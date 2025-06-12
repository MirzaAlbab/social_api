<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as Faker;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        $faker = Faker::create();
        DB::table('messages')->insert([
            [
                'sender_id' => 1, // Assuming user with ID 1 exists
                'receiver_id' => 2, // Assuming user with ID 2 exists
                'content' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sender_id' => 2, // Assuming user with ID 2 exists
                'receiver_id' => 1, // Assuming user with ID 1 exists
                'content' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
