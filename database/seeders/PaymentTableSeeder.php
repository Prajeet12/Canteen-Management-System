<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payments')->insert([
            [
                'method' => 'Cash'
            ],
            [
                'method' => 'Khalti'
            ],
            [
                'method' => 'Fonepay'
            ]
        ]);
    }
}
