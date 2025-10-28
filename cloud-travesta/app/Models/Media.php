<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    use HasFactory;

    /**
     * Kolom yang boleh di-mass assign
     */
    protected $fillable = [
        'filename',        // nama file yang disimpan (generated)
        'original_name',   // nama file asli saat upload
        'mime_type',       // MIME type (image/png, application/pdf, dll)
        'file_size',       // ukuran file dalam byte
        'path',            // direktori relatif di storage (mis. 'uploads/posts/1')
        'metadata',        // info tambahan (dimensi, exif, dll) dalam json
        'post_id',         // relasi ke posts (nullable)
        'uploaded_by',     // user yang mengunggah
        'type',            // image|document|video|audio|other
    ];

    /**
     * Casting kolom
     */
    protected $casts = [
        'file_size' => 'integer',
        'metadata' => 'array',
    ];

    /**
     * Appends (atribut virtual yang ikut diserialisasi)
     */
    protected $appends = [
        'url',          // URL publik file
        'size_human',   // ukuran human-readable
        'icon',         // icon hint untuk UI
    ];

    /* =========================================================================
     | Relationships
     * ========================================================================= */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    /* =========================================================================
     | Scopes
     * ========================================================================= */
    public function scopeType($query, string $type)
    {
        return $query->where('type', $type);
    }

    public function scopeImages($query)
    {
        return $query->where('type', 'image');
    }

    public function scopeForPost($query, int $postId)
    {
        return $query->where('post_id', $postId);
    }

    public function scopeUploadedBy($query, int $userId)
    {
        return $query->where('uploaded_by', $userId);
    }

    public function scopeSearch($query, string $term)
    {
        return $query->where(function ($q) use ($term) {
            $q->where('original_name', 'like', "%{$term}%")
                ->orWhere('filename', 'like', "%{$term}%");
        });
    }

    /* =========================================================================
     | Accessors
     * ========================================================================= */

    /**
     * Full relative path yang disimpan di disk "public"
     * Contoh: uploads/posts/1/abcd1234.png
     */
    public function getRelativePathAttribute(): string
    {
        $dir = $this->path ? rtrim($this->path, '/') . '/' : '';
        return $dir . $this->filename;
    }

    /**
     * URL publik file (aman di semua environment)
     */
    public function getUrlAttribute(): ?string
    {
        if (!$this->filename)
            return null;

        $path = $this->relative_path;

        if (!Storage::disk('public')->exists($path)) {
            return null;
        }

        // Gunakan Storage::url() jika tersedia, jika tidak pakai fallback asset()
        try {
            return Storage::disk('public')->url($path);
        } catch (\BadMethodCallException $e) {
            return asset('storage/' . $path);
        }
    }

    /**
     * Ukuran human readable (KB, MB, dsb)
     */
    public function getSizeHumanAttribute(): ?string
    {
        if ($this->file_size === null)
            return null;

        $size = (int) $this->file_size;
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $i = 0;
        while ($size >= 1024 && $i < count($units) - 1) {
            $size /= 1024;
            $i++;
        }
        return round($size, 2) . ' ' . $units[$i];
    }

    /**
     * Icon hint sederhana untuk UI berdasarkan type/mime
     */
    public function getIconAttribute(): string
    {
        return match (true) {
            $this->type === 'image' => 'image',
            $this->type === 'video' => 'video',
            $this->type === 'audio' => 'audio',
            str_contains($this->mime_type ?? '', 'pdf') => 'file-pdf',
            str_contains($this->mime_type ?? '', 'zip') => 'file-zip',
            default => 'file',
        };
    }

    /* =========================================================================
     | Helpers
     * ========================================================================= */

    /**
     * Hapus file fisik ketika model dihapus.
     * Gunakan $media->deleteWithFile() untuk menghapus file + record.
     */
    public function deleteWithFile(): bool
    {
        if ($this->filename && Storage::disk('public')->exists($this->relative_path)) {
            Storage::disk('public')->delete($this->relative_path);
        }
        return (bool) $this->delete();
    }

    /**
     * Pindahkan file ke folder lain (mis. saat post-id berubah).
     * $newPath contoh: 'uploads/posts/123'
     */
    public function moveTo(string $newPath): bool
    {
        $old = $this->relative_path;
        $new = rtrim($newPath, '/') . '/' . $this->filename;

        if (Storage::disk('public')->exists($old)) {
            Storage::disk('public')->makeDirectory($newPath);
            if (Storage::disk('public')->move($old, $new)) {
                $this->path = $newPath;
                return $this->save();
            }
        }
        return false;
    }
}
