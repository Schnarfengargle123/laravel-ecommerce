<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'email' => 'mr_bean1@email.com',
                'password' => bcrypt('password'),
                'username' => 'mr_bean1',
                'account_type' => 'Standard',
                'registration_date' => date_create()->format('Y-m-d H:i:s')
            ],
            [
                'email' => 'admin1@email.com',
                'password' => bcrypt('password'),
                'username' => 'admin1',
                'account_type' => 'Admin',
                'registration_date' => date_create()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
