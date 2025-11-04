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
        $cats = [
            ['name' => 'Beaches', 'slug' => 'beaches', 'description' => 'Pantai dan pesisir'],
            ['name' => 'Mountains', 'slug' => 'mountains', 'description' => 'Pegunungan dan hiking'],
            ['name' => 'Urban', 'slug' => 'urban', 'description' => 'Kota dan atraksi urban'],
        ];

        foreach ($cats as $c) {
            Category::firstOrCreate(['slug' => $c['slug']], $c + ['is_active' => true]);
        }
    }
}
