<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            [
                "cms_user_id" => 1,
                "name" => 'Test Event',
                "slug" => 'test-event',
                "start_date" => now(),
                "end_date" => now()->addDays(2),
                "created_at" => now(),
                "updated_at" => now()
            ]
        ]);
    }
}
