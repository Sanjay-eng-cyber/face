<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CmsUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('cms_users')->insert([
            [
                "role" => 'admin',
                "email" => 'admin@test.com',
                "password" => bcrypt('password'),
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "role" => 'super admin',
                "email" => 'superadmin@test.com',
                "password" => bcrypt('password'),
                "created_at" => now(),
                "updated_at" => now()
            ]
        ]);
    }
}
