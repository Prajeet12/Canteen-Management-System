<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact_information')->insert([
            'address' => 'Naxa, Kathmandu',
            'phoneNumber' => '9841378841',
            'contactEmail' => 'prajeetsth3@gmail.com',
            'openingTime' => 'Sunday-Friday 6AM - 6PM',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // You can add more seed data as needed
    }
}
