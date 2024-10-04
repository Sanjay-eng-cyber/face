<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                "cms_user_id" => 1,
                "event_id" => 1,
                "name" => 'Test Category',
                "slug" => 'test-category',
                "created_at" => now(),
                "updated_at" => now()
            ]
        ]);
    }
}
