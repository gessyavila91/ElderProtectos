<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Gessy Avila',
            'email' => 'gessyavila91@gmail.com',
            'email_verified_at' => '2021-06-26 13:18:57',
            'password' => Hash::make('1234567890')
        ]);
        //'name' => 'Test User',
        //'email' => 'test@example.com',
        //'password' => 'password',
        DB::table('users')->insert([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'email_verified_at' => '2021-06-26 13:18:57',
            'password' => Hash::make('password')
        ]);

    }
}
