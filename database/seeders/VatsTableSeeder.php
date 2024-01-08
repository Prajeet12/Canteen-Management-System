<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed data for the vats table
        $vats = [
            ['percentage' => 13],
           
           
        ];

        // Insert data into the vats table
        DB::table('vats')->insert($vats);
    }
}