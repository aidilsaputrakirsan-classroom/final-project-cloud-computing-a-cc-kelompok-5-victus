<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Migration untuk tabel media - menyimpan file gambar destinasi
     */
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();

            // Informasi file media
            $table->string('filename'); // Nama file hasil upload (unik)
            $table->string('original_name'); // Nama asli file yang diupload
            $table->string('mime_type'); // Jenis MIME (image/jpeg, etc.)
            $table->unsignedBigInteger('file_size'); // Ukuran file dalam byte
            $table->string('path'); // Lokasi penyimpanan di storage
            $table->json('metadata')->nullable(); // Metadata tambahan (misalnya dimensi gambar)

            // Relasi ke post
            $table->unsignedBigInteger('post_id')->nullable();
            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade'); // Jika post dihapus, media ikut terhapus

            // Timestamp
            $table->timestamps();

            // Indexing
            $table->index('post_id');
        });
    }

    /**
     * Rollback migration - hapus tabel media
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
