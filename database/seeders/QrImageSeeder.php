<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;


class QrImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ...


        $khalti = 'Image/KhaltiQR.jpg'; // Replace with the correct path to your image
        $esewa = 'Image/KhaltiQR.jpg';
        $khalti_url = asset(Storage::url($khalti));
        $esewa_url = asset(Storage::url($esewa));

        DB::table('qr_images')->insert([
            [
                'method_id' => 2,
                'qrimage' => $khalti_url,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'method_id' => 3, 
                'qrimage' => $esewa_url,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

    }
}

