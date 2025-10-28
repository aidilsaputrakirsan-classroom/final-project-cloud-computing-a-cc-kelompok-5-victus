<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Jalankan migration untuk membuat tabel posts
     * Tabel ini menyimpan konten utama aplikasi Travesta (destinasi wisata).
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            // Primary key
            $table->id();

            // Informasi utama destinasi / post
            $table->string('title'); // Judul destinasi
            $table->string('slug')->unique(); // Slug untuk URL SEO
            $table->text('excerpt')->nullable(); // Ringkasan destinasi
            $table->longText('content'); // Deskripsi lengkap
            $table->string('featured_image')->nullable(); // Gambar utama destinasi

            // Relasi kategori
            $table->foreignId('category_id')
                ->constrained('categories')
                ->onDelete('restrict');

            // Status publikasi (admin saja yang mengatur)
            $table->enum('status', ['draft', 'published'])
                ->default('draft');

            // Metadata tambahan
            $table->timestamp('published_at')->nullable(); // Waktu dipublikasikan
            $table->integer('views_count')->default(0); // Jumlah dilihat
            $table->boolean('is_featured')->default(false); // Ditampilkan di beranda

            // SEO metadata (opsional)
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();

            // Timestamp
            $table->timestamps();
            $table->softDeletes();

            // Indexing
            $table->index(['status', 'published_at']);
            $table->index('category_id');
            $table->index('is_featured');
            $table->fullText(['title', 'content']);
        });
    }

    /**
     * Rollback migration - hapus tabel posts
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
