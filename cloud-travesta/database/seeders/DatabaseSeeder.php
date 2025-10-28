<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed aplikasi database dengan sample data
     * Urutan seeding penting karena foreign key dependencies
     */
    public function run(): void
    {
        // Jalankan seeder sesuai urutan dependensi
        $seeders = [
            UserSeeder::class,      // Users dulu (tidak ada dependencies)
            CategorySeeder::class,  // Categories (tidak ada dependencies)
                // TagSeeder::class,     // Belum digunakan (fitur tags belum aktif)
            PostSeeder::class,      // Posts (depends on users & categories)
            // CommentSeeder::class, // Belum digunakan (fitur comments belum aktif)
        ];

        foreach ($seeders as $seeder) {
            $this->call($seeder);
        }

        $this->command->info('✅ Database seeding completed successfully!');
    }
}
