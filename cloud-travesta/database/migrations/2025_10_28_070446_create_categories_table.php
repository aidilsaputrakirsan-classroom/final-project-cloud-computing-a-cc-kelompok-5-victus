<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            // Primary key
            $table->id();

            // Informasi utama kategori
            $table->string('name'); // Nama kategori (misal: Pantai, Gunung, Kota)
            $table->string('slug')->unique(); // Slug unik untuk URL
            $table->text('description')->nullable(); // Deskripsi kategori

            // Status aktif kategori
            $table->boolean('is_active')->default(true);

            // Waktu pembuatan & pembaruan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
