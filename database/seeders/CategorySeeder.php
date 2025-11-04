<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $categories = [
            ['name' => 'Pantai', 'slug' => 'pantai', 'description' => 'Tempat wisata pantai yang indah di Indonesia'],
            ['name' => 'Pegunungan', 'slug' => 'pegunungan', 'description' => 'Destinasi wisata alam dan hiking di pegunungan'],
            ['name' => 'Kota', 'slug' => 'kota', 'description' => 'Wisata perkotaan, kuliner, dan budaya lokal'],
            ['name' => 'Sejarah', 'slug' => 'sejarah', 'description' => 'Tempat wisata bersejarah dan peninggalan budaya'],
            ['name' => 'Kuliner', 'slug' => 'kuliner', 'description' => 'Wisata makanan khas dari berbagai daerah di Indonesia'],
            ['name' => 'Air Terjun', 'slug' => 'air-terjun', 'description' => 'Wisata alam air terjun yang mempesona'],
            ['name' => 'Pulau', 'slug' => 'pulau', 'description' => 'Eksplorasi pulau-pulau eksotis di Indonesia'],
            ['name' => 'Desa Wisata', 'slug' => 'desa-wisata', 'description' => 'Pengalaman budaya dan tradisi lokal di desa wisata'],
            ['name' => 'Religi', 'slug' => 'religi', 'description' => 'Wisata religi dan tempat ibadah bersejarah'],
            ['name' => 'Petualangan', 'slug' => 'petualangan', 'description' => 'Aktivitas outdoor, rafting, dan camping seru'],
            ['name' => 'Edukasi', 'slug' => 'edukasi', 'description' => 'Tempat wisata edukatif dan pembelajaran budaya'],
            ['name' => 'Hutan', 'slug' => 'hutan', 'description' => 'Wisata alam dan eksplorasi hutan tropis Indonesia'],
            ['name' => 'Taman Nasional', 'slug' => 'taman-nasional', 'description' => 'Konservasi alam dan satwa langka di Indonesia'],
            ['name' => 'Festival', 'slug' => 'festival', 'description' => 'Perayaan budaya, musik, dan tradisi daerah'],
            ['name' => 'Candi', 'slug' => 'candi', 'description' => 'Wisata budaya dan sejarah di situs-situs candi peninggalan kerajaan Indonesia'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['slug' => $category['slug']],
                $category + ['is_active' => true]
            );
        }
    }
}
