<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat User Admin
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@travesta.id',
            'password' => bcrypt('password'),
        ]);

        // 2. Panggil Seeder Berurutan
        $this->call([
            CategorySeeder::class, // Kategori dulu
            TagSeeder::class,      // Tags dulu (WAJIB sebelum Post)
            PostSeeder::class,     // Baru Post (karena Post butuh Tag dan Kategori)
        ]);
    }
}
