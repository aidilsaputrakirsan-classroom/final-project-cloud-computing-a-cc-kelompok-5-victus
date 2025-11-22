<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat user admin jika belum ada
        User::firstOrCreate(
            ['email' => 'admin@travesta.id'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Panggil Seeder Berurutan
        $this->call([
            CategorySeeder::class, // Kategori dulu
            TagSeeder::class,      // Tags dulu (WAJIB sebelum Post)
            PostSeeder::class,     // Baru Post (karena Post butuh Tag dan Kategori)
        ]);
    }
}
