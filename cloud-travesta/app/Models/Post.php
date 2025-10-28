<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Atribut yang dapat diisi secara mass assignment
     */
    protected $fillable = [
        'title',            // Judul post
        'slug',             // URL-friendly identifier
        'excerpt',          // Ringkasan post
        'content',          // Konten lengkap
        'featured_image',   // Path ke featured image
        'status',           // Status publikasi
        'user_id',          // Penulis post
        'category_id',      // Kategori post
        'published_at',     // Waktu publikasi
        'views_count',      // Counter views
        'is_featured',      // Featured post flag
        'allow_comments',   // Izinkan komentar (disiapkan, tapi belum aktif)
        'meta_title',       // SEO title
        'meta_description', // SEO description
        'meta_keywords',    // SEO keywords
    ];

    /**
     * Casting atribut ke tipe data yang sesuai
     */
    protected $casts = [
        'published_at' => 'datetime',
        'is_featured' => 'boolean',
        'allow_comments' => 'boolean',
        'views_count' => 'integer',
    ];

    /**
     * Boot method untuk auto-generate slug dan set published_at
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }

            if ($post->status === 'published' && !$post->published_at) {
                $post->published_at = now();
            }
        });

        static::updating(function ($post) {
            if ($post->isDirty('title')) {
                $post->slug = Str::slug($post->title);
            }

            if ($post->isDirty('status') && $post->status === 'published' && !$post->published_at) {
                $post->published_at = now();
            }
        });
    }

    /**
     * Relationship: Post belongs to User (Author)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Alias untuk author
     */
    public function author()
    {
        return $this->user();
    }

    /**
     * Relationship: Post belongs to Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relationship: Post has many Media
     */
    public function media()
    {
        return $this->hasMany(Media::class);
    }

    /**
     * Scope: Filter published posts only
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published')
            ->where('published_at', '<=', now());
    }

    /**
     * Scope: Filter featured posts
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope: Order by latest published
     */
    public function scopeLatest($query)
    {
        return $query->orderBy('published_at', 'desc');
    }

    /**
     * Scope: Search posts by title and content
     */
    public function scopeSearch($query, $term)
    {
        return $query->where(function ($q) use ($term) {
            $q->where('title', 'LIKE', "%{$term}%")
                ->orWhere('content', 'LIKE', "%{$term}%")
                ->orWhere('excerpt', 'LIKE', "%{$term}%");
        });
    }

    /**
     * Accessor: Get excerpt with fallback
     */
    public function getExcerptAttribute($value)
    {
        if ($value) {
            return $value;
        }

        return Str::limit(strip_tags($this->content), 150);
    }

    /**
     * Accessor: Get featured image URL
     */
    public function getFeaturedImageUrlAttribute()
    {
        return $this->featured_image
            ? asset('storage/' . $this->featured_image)
            : null;
    }

    /**
     * Accessor: Reading time estimate
     */
    public function getReadingTimeAttribute()
    {
        $wordCount = str_word_count(strip_tags($this->content));
        $readingTime = ceil($wordCount / 200);
        return $readingTime . ' min read';
    }

    /**
     * Check if post is published
     */
    public function isPublished()
    {
        return $this->status === 'published' &&
            $this->published_at &&
            $this->published_at <= now();
    }

    /**
     * Increment views count
     */
    public function incrementViews()
    {
        $this->increment('views_count');
    }
}
