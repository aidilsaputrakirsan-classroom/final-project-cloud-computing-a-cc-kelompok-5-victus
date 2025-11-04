<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

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

        // Jalankan seeder lainnya
        $this->call([
            \Database\Seeders\CategorySeeder::class,
            \Database\Seeders\PostSeeder::class,
        ]);
    }
}