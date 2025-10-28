<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    /**
     * Atribut yang dapat diisi secara mass assignment
     */
    protected $fillable = [
        'name',         // Nama kategori
        'slug',         // URL-friendly identifier
        'description',  // Deskripsi kategori
        'parent_id',    // ID kategori induk (opsional)
        'is_active',    // Status aktif kategori
    ];

    /**
     * Casting atribut ke tipe data yang sesuai
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Boot method untuk auto-generate slug
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });

        static::updating(function ($category) {
            if ($category->isDirty('name')) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    /**
     * Relationship: Category memiliki banyak Post
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Relationship opsional: Category memiliki parent category
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Scope: Filter kategori aktif
     * Usage: Category::active()->get()
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope: Ambil kategori utama (tanpa parent)
     */
    public function scopeRoot($query)
    {
        return $query->whereNull('parent_id');
    }
}
