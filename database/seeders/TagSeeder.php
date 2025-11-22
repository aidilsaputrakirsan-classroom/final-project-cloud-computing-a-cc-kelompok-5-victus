<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            // Destinasi Populer
            'Bali',
            'Lombok',
            'Yogyakarta',
            'Labuan Bajo',
            'Raja Ampat',
            'Danau Toba',
            'Bromo',

            // Jenis Wisata
            'Wisata Alam',
            'Pantai & Laut',
            'Pegunungan',
            'Wisata Kuliner',
            'Wisata Sejarah',
            'Desa Wisata',

            // Gaya Traveling
            'Backpacker',
            'Family Trip',
            'Solo Traveler',
            'Luxury Trip',

            // Lainnya
            'Hidden Gem',
            'Tips Traveler',
            'Hotel & Resort'
        ];

        foreach ($tags as $tagName) {
            // firstOrCreate agar tidak error jika seed dijalankan 2x
            Tag::firstOrCreate(
                ['slug' => Str::slug($tagName)],
                ['name' => $tagName]
            );
        }
    }
}
