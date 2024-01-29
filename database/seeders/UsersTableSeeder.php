<?php

namespace Database\Seeders;

use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'prajeetsth1@gmail.com',
            'password' => Hash::make('admin123'),
            'usertype' => 'Admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}