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
        // Daftar Tags Khusus Tema "Travesta" (Wisata Indonesia)
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
            'Staycation',
            'Honeymoon',
            'Family Trip',
            'Solo Traveler',
            'Luxury Trip',

            // Lainnya
            'Hidden Gem',
            'Tips Traveler',
            'Oleh-oleh',
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
