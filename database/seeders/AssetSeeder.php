<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
  
        public function run()
    {
        $faker = Faker::create();
        $numberOfAssets = 10; // Adjust the number of dummy assets you want

        // 1. Prepare dummy binary image data
        // NOTE: For seeding, it's easier to store a small, known placeholder.
        // A simple 1x1 GIF is often used as a placeholder.
        
        // This is the raw binary content of a tiny 1x1 GIF
        $placeholderBinary = base64_decode('R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==');
        $placeholderMimeType = 'image/gif';

        for ($i = 0; $i < $numberOfAssets; $i++) {
            DB::table('assets')->insert([
                'name' => $faker->catchPhrase,
                'model' => $faker->bothify('MODEL-###???'),
                'location' => $faker->city,
                'serial' => $faker->unique()->bothify('SN-########'),
                'inventory_number' => $faker->unique()->randomNumber(6),
                
                // Store the binary data (BLOB)
                'img' => $placeholderBinary,
                
                // Store the MIME type for later retrieval/display
                'img_type' => $placeholderMimeType,
                
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
    }

