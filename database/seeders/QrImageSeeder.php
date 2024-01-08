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


        $qrimage = 'Image/KhaltiQR.jpg'; // Replace with the correct path to your image
        $url = asset(Storage::url($qrimage));

        DB::table('qr_images')->insert([
            'qrimage' => $url,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}

