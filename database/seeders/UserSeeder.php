<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                "name" => 'User',
                "email" => 'user@test.com',
                "password" => bcrypt('password'),
                "created_at" => now(),
                "updated_at" => now()
            ]
        ]);
    }
}
