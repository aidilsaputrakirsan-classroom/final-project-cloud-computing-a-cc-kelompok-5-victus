<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Jalankan migration untuk membuat tabel users (admin only)
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            // Primary key
            $table->id();

            // Informasi dasar user (admin)
            $table->string('name'); // Nama admin
            $table->string('email')->unique(); // Email unik untuk login
            $table->string('password'); // Password yang di-hash

            // Informasi tambahan opsional
            $table->string('avatar')->nullable(); // Gambar profil admin
            $table->timestamp('email_verified_at')->nullable(); // opsional
            $table->boolean('is_active')->default(true); // status aktif admin

            // Token remember-me Laravel
            $table->rememberToken();

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Rollback migration
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
